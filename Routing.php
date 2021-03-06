<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/AnnouncementsController.php';
require_once 'src/controllers/AccountController.php';
require_once 'src/controllers/MessagesController.php';

class Routing{
    public static $routes;

    public static function get($url, $controller){
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller){
        self::$routes[$url] = $controller;
    }

    public static function run($url){
        $urlParts = explode("/", $url);
        $action = $urlParts[0];

        if(!array_key_exists($action, self::$routes))
            die("Wrong url!");

        $controller = self::$routes[$action];
        $object = new $controller;

        $id = $urlParts[1] ?? '';
        if(is_int($id))
            $object->$action($id); 
        else
            $object->$action($id);
    }
}