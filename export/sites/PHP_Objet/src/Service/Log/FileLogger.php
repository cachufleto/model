<?php
/**
 * IFOCOP nov 2015 - mai 2016
 * User: Valery LE KHANH VAN
 * Date: 18/02/2016
 * Time: 14:24
 */

namespace Service\Log;


class FileLogger
{
    protected $temps;
    protected $chemin = '/../../logs/';
    protected $fichier = 'logs';
    protected $extension = '.txt';

    public function log($level, $message) // log() possède deux arguments
    {
        $temps = date('(Y-m-d H:i:s)');
        $level .= $temps . $message . PHP_EOL;
        file_put_contents(
            __DIR__ . '/../../../logs/logs.txt',
            //__DIR__ . $chemin . $fichier . $extension,
            $level,
        FILE_APPEND
        );
    }
}