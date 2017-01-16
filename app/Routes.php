<?php

namespace App;

/**
 * Specify App Routes
 */
class Routes {

    // The Base Directory
    protected $baseDir = "/EmailScraper";

    // The Key is the Route URI
    protected $routes = array(
        "/esomar" => array(
            "method" => "GET",
            "controller" => "EmailExtract@extractEmail"
        )
    );

}