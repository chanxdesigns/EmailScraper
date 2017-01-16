<?php

namespace App;

/**
 * Specify App Routes
 */
class Routes {

    // The Key is the Route URI
    protected $routes = array(
        "/" => array(
            "method" => "GET",
            "controller" => "Makeshift@showName"
        )
    );

}