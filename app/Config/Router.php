<?php

namespace App\Config;

use App\Routes;

class Router extends Routes {

    public function __construct () {
//        foreach ($this->routes as $uri => $uriProps) {
//            $namespace = "\App\Controllers\'";
//            $className = $this->getControllerClassMethod($uriProps['controller'])['class'];
//            $methodName = $this->getControllerClassMethod($uriProps['controller'])['method'];
//
//            $routeController = new $namespace.$className();
//
//            return call_user_func_array($routeController->$methodName, $uriProps['params']);
//        }

//        if (array_key_exists($this->getUri(), $this->routes)) {
//            $this->performRouting();
//        }
//        else {
//            http_response_code(404);
//            echo "Route Doesn't exist";
//        }

        try {
            if (array_key_exists($this->getUri(), $this->routes)) {
                $this->performRouting();
            }
            else {
                throw new \Error("Route Doesn't Exist",404);
            }
        }
        catch (\Error $err) {
            if ($err->getCode() == 404) {
                die('Route Not Found');
            }
        }
    }

    private function getControllerClassMethod ($controllerMethod) {
        $controllerArray = explode('@', $controllerMethod);
        return array(
            "class" => $controllerArray[0],
            "method" => $controllerArray[1]
        );
    }

    private function getUri () {
        $baseDir = !empty($this->baseDir) ? $_SERVER['SERVER_NAME'].$this->baseDir : $_SERVER['SERVER_NAME'];
        return $currUri = str_replace($baseDir, '', $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
    }

    private function performRouting () {
        var_dump($this->routes[$this->getUri()]['method']);
        if ($_SERVER['REQUEST_METHOD'] == $this->routes[$this->getUri()]);
    }

}