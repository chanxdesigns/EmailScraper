<?php

namespace App\Config;

use App\Routes;

class Router extends Routes {

    public function __construct () {
        foreach ($this->routes as $uri => $uriProps) {
            $namespace = "\App\Controllers\'";
            $className = $this->getControllerClassMethod($uriProps['controller'])['class'];
            $methodName = $this->getControllerClassMethod($uriProps['controller'])['method'];
            $routeController = new $namespace.$className();

            return call_user_func_array($routeController->$methodName(), $uriProps['params']);
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