<?php
/**
 * IFOCOP nov 2015 - mai 2016
 * User: Valery LE KHANH VAN
 * Date: 22/02/2016
 * Time: 16:09
 */

namespace Valery;

use Service\Log\FileLogger;
use Symfony\Component\Yaml\Yaml;

//$array = Yaml::parse(file_get_contents(../configs/dev/config.yml));

//print Yaml::dump($array);

class Application
{
    /** @var  string */
    protected $environment;
    // on ne veut pas que cet attribut puisse être modifié

    /**
     * Application constructor.
     * @param string $environment
     * Création d'un constructeur qui accepte un paramètre
     *
     */
    public function __construct($environment)
    {
        $this->environment = $environment;
    }

    /**
     *  Lancement de l'application globale
     *  @package Valery
     */

    public function run()
    {
        $environment = $this->environment;
        // on ouvre le fichier de routage associé à notre environment (dév, prod, etc.)

        $routing = __DIR__.'/../../configs/dev/routing.php';

        $config = require __DIR__.'/../../configs/dev/routing.php';
        var_dump($config);

        // Utilisation : http://localhost/project/public/index.php?action=connexion
        //$routeName = 'accueil';
        // On utilise soit la page demandée, soit la page d'accueil
        $routeName = empty($_GET['action']) ? 'Accueil' : $_GET['action'];

        /* try { throw new \Exception("Generation dune exception" );
        } catch (\Exception $exception){
            var_dump($exception->getMessage());
        }*/

        try {
            if (!isset($routing['routes'][$routeName])) {
                throw new \Exception('Not Found', 404);
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            $routeName = 'accueil';
        }


        //$controller = new \App\Controller\DefaultController;

        $controllerClass = $routing['routes'][$routeName]['controller'];
        $controllerMethod = $routing['routes'][$routeName]['action'];

        //$controller->homepageAction();
        $controller = new $controllerClass;

        $logger = new FileLogger();
        $controller->setLogger($logger);

        $controller->$controllerMethod();

    }
}