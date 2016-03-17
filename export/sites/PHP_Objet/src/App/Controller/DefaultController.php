<?php

namespace App\Controller;

use Service\Log\FileLogger as Logger;
use Valery\Controller;

class DefaultController extends Controller
{
    /**
     *
     */
    public function homepageAction()
    {
        // Pour faire un horodatage, il me faut disposer d'une notion de date et de temps

        //$date = date("j M Y");
        //$time = time();

        // Je concatène ici un message qui comprends une date et un marqueur de temps
        //$message = "HELLO WORLD " .$date . " et il est " .$time;
        $message = date("Y-M-j") . " debug " .date("H:i:s") . "\r\n";

        // Il existe deux façon de faire un retour à la ligne
        //$message = date("Y-M-j") . " debug " .date("H:i:s") . PHP_EOL;

        // J'affiche le message
        echo $message;
        echo __DIR__;
        // L'exécution de ce message se fait dans ce chemin
        // 2016-Feb-18 debug 14:09:05 C:\wamp\www\PHP_Objet\src\Controller

        // Maintenant, je vais concevoir l'écriture d'un fichier de LOG
        // Format:
        // [2016-02-18] INFO/DEBUG/WARNING/ERROR/CRITICAL : message

        // Ouverture d'un fichier.
        //$fp = fopen("log.md","a");
        // Ecriture de l'horodatage
        //fwrite($fp, $message . "\r\n");
        // Fermeture d'un fichier
        //fclose($fp);

        // file_put_contents revient à appeler les fonctions fopen(), fwrite() et fclose() successivement.
        //file_put_contents (__DIR__ . 'log.txt', $message, FILE_APPEND);
        /* file_put_contents (
            __DIR__ . '/../../logs/logs.txt',
            $message,
            FILE_APPEND
        ); */
        // __DIR__ permet de pointer vers le bon répertoire.

    }

}