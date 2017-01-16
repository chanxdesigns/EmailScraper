<?php

namespace App;

require_once dirname(__DIR__).'/vendor/autoload.php';

class Kernel {

    protected $services = [
        'Dotenv' => \Dotenv\Dotenv::class
    ];

    protected $dir;

    public function __constructor ($dir) {
        $this->dir = $dir;
    }

    public static function bootstrap () {
        $objInstances = [];
//        foreach (self::$services as $serviceName => $serviceClassPath) {
//            array_push($objInstances, array(
//                $serviceName => new $serviceClassPath(dirname(__DIR__))
//            ));
//        }

        return $objInstances;
    }

    public static function initRoutes () {
        new Routes();
    }

}