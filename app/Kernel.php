<?php

namespace App;

use Dotenv\Dotenv;

class Kernel {

    protected $services = [
        'Dotenv' => \Dotenv\Dotenv::class
    ];

//    public static function bootstrap () {
//        $objInstances = [];
//        foreach (self::$services as $serviceName => $serviceClassPath) {
//            array_push($objInstances, array(
//                $serviceName => new $serviceClassPath(dirname(__DIR__))
//            ));
//        }
//
//        return $objInstances;
//    }

}