<?php

namespace Spryker\Sniffs\Factory;

class CreateVsGetMethodsSniff implements \PHP_CodeSniffer_Sniff
{

    /**
     * @return array
     */
    public function register()
    {
        return [
            T_FUNCTION,
        ];
    }

    /**
     * @param \PHP_CodeSniffer_File $phpCsFile
     * @param int $stackPointer
     *
     * @return void
     */
    public function process(\PHP_CodeSniffer_File $phpCsFile, $stackPointer)
    {
        $tokens = $phpCsFile->getTokens();

        if (!$this->isFactory($phpCsFile)) {
            return;
        }

        $markedAsDeprecated = $this->isMarkedAsDeprecated($phpCsFile, $tokens, $stackPointer);
        if ($markedAsDeprecated) {
            return;
        }

        $methodName = $this->getMethodName($phpCsFile, $stackPointer);
        $requiresCreatePrefix = $this->containsNew($tokens, $stackPointer) || $this->containsCreateMethod($tokens, $stackPointer);

        $startsWithCreate = preg_match('/create[A-Z]/', $methodName);
        $startsWithGet = preg_match('/get[A-Z]/', $methodName);

        if (!$startsWithCreate && !$startsWithGet) {
            return;
        }

        $classMethod = $this->getClassMethod($phpCsFile, $stackPointer);

        if ($startsWithCreate && !$requiresCreatePrefix) {
            $phpCsFile->addError($classMethod . ' is called create...(), should be get...()', $stackPointer);
        }
    }

    /**
     * @param \PHP_CodeSniffer_File $phpCsFile
     * @param int $stackPointer
     *
     * @return string
     */
    protected function getMethodName(\PHP_CodeSniffer_File $phpCsFile, $stackPointer)
    {
        $tokens = $phpCsFile->getTokens();
        $methodNamePosition = $phpCsFile->findNext(T_STRING, $stackPointer);
        $methodName = $tokens[$methodNamePosition]['content'];

        return $methodName;
    }

    /**
     * @param \PHP_CodeSniffer_File $phpCsFile
     *
     * @return bool
     */
    protected function isFactory(\PHP_CodeSniffer_File $phpCsFile)
    {
        $className = $this->getClassName($phpCsFile);

        $hasFactorySuffix = (substr($className, -7) === 'Factory');
        if (!$hasFactorySuffix) {
            return false;
        }

        return (substr($className, -15, -7) === 'Business' || substr($className, -20, -7) === 'Communication');
    }

    /**
     * @param \PHP_CodeSniffer_File $phpCsFile
     *
     * @return string
     */
    protected function getClassName(\PHP_CodeSniffer_File $phpCsFile)
    {
        $fileName = $phpCsFile->getFilename();
        $fileNameParts = explode(DIRECTORY_SEPARATOR, $fileName);
        $sourceDirectoryPosition = array_search('src', array_values($fileNameParts));
        $classNameParts = array_slice($fileNameParts, $sourceDirectoryPosition + 1);
        $className = implode('\\', $classNameParts);
        $className = str_replace('.php', '', $className);

        return $className;
    }

    /**
     * @param \PHP_CodeSniffer_File $phpCsFile
     * @param int $stackPointer
     *
     * @return string
     */
    protected function getClassMethod(\PHP_CodeSniffer_File $phpCsFile, $stackPointer)
    {
        $className = $this->getClassName($phpCsFile);
        $methodName = $this->getMethodName($phpCsFile, $stackPointer);

        $classMethod = $className . '::' . $methodName;

        return $classMethod;
    }

    /**
     * @param \PHP_CodeSniffer_File $phpCsFile
     * @param int $stackPointer
     *
     * @return void
     */
    protected function correctMethodName(\PHP_CodeSniffer_File $phpCsFile, $stackPointer, $newMethodName)
    {
        $phpCsFile->fixer->beginChangeset();
        $phpCsFile->fixer->replaceToken($stackPointer, $newMethodName);
        $phpCsFile->fixer->endChangeset();
    }

    /**
     * @param \Symfony\CS\Tokenizer\Tokens|\Symfony\CS\Tokenizer\Token[] $tokens
     * @param int $stackPointer
     *
     * @return bool
     */
    protected function containsNew($tokens, $stackPointer)
    {
        $begin = $tokens[$stackPointer]['scope_opener'] + 1;
        $end = $tokens[$stackPointer]['scope_closer'] - 1;

        for ($i = $begin; $i <= $end; $i++) {
            $token = $tokens[$i];

            if ($token['code'] === T_NEW) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param \Symfony\CS\Tokenizer\Tokens|\Symfony\CS\Tokenizer\Token[] $tokens
     * @param int $stackPointer
     *
     * @return bool
     */
    protected function containsCreateMethod($tokens, $stackPointer)
    {
        $begin = $tokens[$stackPointer]['scope_opener'] + 1;
        $end = $tokens[$stackPointer]['scope_closer'] - 1;

        for ($i = $begin; $i <= $end; $i++) {
            $token = $tokens[$i];

            if ($token['code'] === T_OBJECT_OPERATOR && $tokens[$i + 1]['code'] === T_STRING) {
                if (strpos($tokens[$i + 1]['content'], 'create') === 0) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param \PHP_CodeSniffer_File $phpCsFile
     * @param \Symfony\CS\Tokenizer\Tokens|\Symfony\CS\Tokenizer\Token[] $tokens
     * @param int $stackPointer
     * @return bool
     */
    protected function isMarkedAsDeprecated(\PHP_CodeSniffer_File $phpCsFile, $tokens, $stackPointer)
    {
        $begin = $tokens[$stackPointer]['scope_opener'] + 1;
        $end = $tokens[$stackPointer]['scope_closer'] - 1;

        for ($i = $begin; $i <= $end; $i++) {
            $token = $tokens[$i];

            if ($token['code'] === T_CONSTANT_ENCAPSED_STRING) {
                if (strpos(strtolower($token['content']), 'deprecated') !== false) {
                    return true;
                }
            }
        }

        if ($this->isMarkedDeprecatedInDocBlock($phpCsFile, $tokens, $stackPointer)) {
            return true;
        }

        return false;
    }

    /**
     * @param \PHP_CodeSniffer_File $phpCsFile
     * @param int $stackPointer
     *
     * @return int|null Stackpointer value of docblock end tag, or null if cannot be found
     */
    protected function findRelatedDocBlock(\PHP_CodeSniffer_File $phpCsFile, $stackPointer)
    {
        $tokens = $phpCsFile->getTokens();

        $line = $tokens[$stackPointer]['line'];
        $beginningOfLine = $stackPointer;
        while (!empty($tokens[$beginningOfLine - 1]) && $tokens[$beginningOfLine - 1]['line'] === $line) {
            $beginningOfLine--;
        }

        if (!empty($tokens[$beginningOfLine - 2]) && $tokens[$beginningOfLine - 2]['type'] === 'T_DOC_COMMENT_CLOSE_TAG') {
            return $beginningOfLine - 2;
        }

        return null;
    }

    /**
     * @param \PHP_CodeSniffer_File $phpCsFile
     * @param $tokens
     * @param $stackPointer
     *
     * @return bool
     */
    protected function isMarkedDeprecatedInDocBlock(\PHP_CodeSniffer_File $phpCsFile, $tokens, $stackPointer)
    {
        $docBlockEndIndex = $this->findRelatedDocBlock($phpCsFile, $stackPointer);

        if (!$docBlockEndIndex) {
            return false;
        }

        $docBlockStartIndex = $tokens[$docBlockEndIndex]['comment_opener'];

        for ($i = $docBlockStartIndex + 1;
             $i < $docBlockEndIndex;
             $i++
        ) {
            if ($tokens[$i]['type'] !== 'T_DOC_COMMENT_TAG') {
                continue;
            }
            if (!in_array($tokens[$i]['content'], ['@deprecated'])) {
                continue;
            }

            return true;
        }

        return false;
    }
}
