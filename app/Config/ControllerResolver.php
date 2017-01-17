<?php

namespace App\Config;


class ControllerResolver extends Resolver {

    protected $namespace = "App\Controllers\\";

    public function resolveController ($class, $method) {
        $fu = $this->resolve($this->namespace.$class);
        $fu->$method();
    }

    public function view ($filepath) {
        readfile($filepath);
    }

}