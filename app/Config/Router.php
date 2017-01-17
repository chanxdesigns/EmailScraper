<?php

namespace App\Config;

class Router {

    protected $baseDir = "";

    protected $routes = array();

    public function __construct ($baseDir = "") {
        $this->baseDir = $baseDir;
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

    public function route ($uri, $method, $controller) {
        array_push($this->routes, array(
            "uri" => $uri,
            "method" => $method,
            "controller" => $controller
        ));
//
    }

//    public function makeSingleDimensionalArray ($multiArray) {
//        foreach ($multiArray as $array) {
//            $newArr = array(
//              "uri" =>
//            );
//        }
//    }

    public function dispatch() {
        $routes = array();

        foreach ($this->routes as $routeProps) {

            array_push($routes,$routeProps['uri']);

            if ($this->getUri() == $routeProps['uri']) {

                $controller = new ControllerResolver();
                $controller->resolveController(
                    $this->getControllerClassMethod($routeProps['controller'])['class'],
                    $this->getControllerClassMethod($routeProps['controller'])['method']
                    );

            }
        }

        try {
            if (!in_array($this->getUri(), $routes)) {
                throw new \ErrorException("Route Doesn't Exists", 404);
            }
        }
        catch (\ErrorException $err) {
            http_response_code($err->getCode());
            echo $err->getMessage();
            exit();
        }
    }

}