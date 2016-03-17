<?php
/**
 * IFOCOP nov 2015 - mai 2016
 * User: Valery LE KHANH VAN
 * Date: 17/02/2016
 * Time: 16:34
 */

// Lance une fois l'appel. Si cela échoue, on ne part pas en erreur.
require '../vendor/autoload.php';


// On a en plus besoin depuis que Composer a mis à jour tous les liens
//require_once '../src/Controller/DefaultController.php';
//require '../src/Service/Log/FileLogger.php';

//use \Service\Log\FileLogger;
use \Service\Log\FileLogger as Logger;

// Création d'une classe objet controller et de son chemin d'accès
//$controller = new App\Controller\DefaultController;
// Lance la méthode de la classe objet controller homepageAction()
//$controller->homepageAction();

$app = new \Valery\Application('dev');
var_dump($app);
//$app->run();
// On peut résumer ces deux lignes par une seule
//(new \Valery\Application('dev'))->run();


// Attention il faut préciser namespace/classe
//$logger = new \Service\Log\FileLogger();
$logger = new Logger;
$logger->log('debug', 'Hi');
