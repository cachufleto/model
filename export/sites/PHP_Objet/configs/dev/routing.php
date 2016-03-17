<?php
/**
 * IFOCOP nov 2015 - mai 2016
 * User: Valery LE KHANH VAN
 * Date: 23/02/2016
 * Time: 11:30
 */

return array(
    'routes'    =>  array(
        'accueil'   =>  array(
            'controller'    =>  '\App\Controller\DefaultController',
            'action'        =>  'homepageAction',
        ),
        '404'       => array(
            'controller'    => '\App\Controller\404Controller',
            'action'        => 'Error404',
        ),
    ),
);