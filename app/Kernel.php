<?php

namespace App;

class Kernel {

    public static function bootstrap () {
        $objInstances = [];
        foreach (self::$services as $serviceName => $serviceClassPath) {
            array_push($objInstances, array(
                $serviceName => new $serviceClassPath(dirname(__DIR__))
            ));
        }
        return $objInstances;
    }

    protected static $services = [
        'Dotenv' => 'Dotenv\Dotenv'
    ];

}