<?php

class Router {

    private $routes;

    public function __construct() {
        $this->routes = require_once($_SERVER['DOCUMENT_ROOT'] . "/config/routes.php");
    }

    private function getUri() {
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run() {
        
        //Extragem uri din link
        $uri = $this->getUri();

        foreach($this->routes as $uriPattern => $path) {

            if(preg_match("~$uriPattern~", $uri)) {
                
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName); //denumirea clasei controllerului

                $actionName = 'action' . ucfirst(array_shift($segments)); //denumirea actiunii apelate in link
                $params = $segments;


                $controllerFile = $_SERVER['DOCUMENT_ROOT'] . '\/controllers\/' . $controllerName . '.php';

                if(file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                else {
                    exit("file not found");
                }

                $controllerObject = new $controllerName;

                $res = call_user_func_array(array($controllerObject, $actionName), $params);
                if($res != null) {
                    $controllerName = "";
                    $actionName = "";
                    break;
                }
                
            }
        }
    }
}