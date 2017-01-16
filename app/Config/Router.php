<?php

namespace App\Config;

use App\Routes;

class Router extends Routes {

    public function __construct () {
        foreach ($this->routes as $uri => $uriProps) {
            $namespace = "App\Controllers";
            call_user_func_array($uriProps);
        }
    }

    private function getControllerClassMethod ($controllerMethod) {
        $controllerArray = explode('@', $controllerMethod);
        $className = $controllerArray[0];
        $methodName = $controllerArray[1];
        return array(
            "class" => $className,
            "method" => $methodName
        );
    }

}