<?php
/**
 * IFOCOP nov 2015 - mai 2016
 * User: Valery LE KHANH VAN
 * Date: 23/02/2016
 * Time: 09:34
 */

/**
 * Quand on déclare un tableau ARRAY, on peut se simplifier la syntaxe
 */

$a = [1, 2];

[
    'website' => [

    ]
];

array(
    'website' => array(
        'name' => 'Formation PHP OO',
    ),
    'db' => array(
        'driver' => 'Pdo_Mysql',
        'config' => array(
            'username' => 'root',
            'password' => '',
            'port'     =>'8080',
        ),
    ),
);