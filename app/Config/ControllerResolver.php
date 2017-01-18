<?php

namespace App\Config;


class ControllerResolver extends Resolver {

    protected $namespace = "App\Controllers\\";

    public function resolveController ($class, $method) {
        $controller = $this->resolve($this->namespace.$class);
        $controller->$method();
    }

    public function view ($viewcontent) {
        if (!array_key_exists('extension', pathinfo($viewcontent))) {
            echo $viewcontent;
        }
        else {
            include $viewcontent;
        }
    }

    public function json ($array) {
        if (is_array($array)) {
            header('Content-Type: text/json; charset=UTF-8');
            echo \GuzzleHttp\json_encode($array);
        }
        else {
            echo "Supplied parameter is not an array";
        }
    }

}