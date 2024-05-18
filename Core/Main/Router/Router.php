<?php

namespace Core\Main\Router;

use Core\Main\Error\RouterError;

class Router
{


    public function __construct()
    {
        require_once ROOT . "/public/router.php";
    }

    public static function get($route, $resources)
    {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

        if ($route == $uri)
        {
            RouterError::method("GET", $route);

            call_user_func($resources);
        }
    }

    public static function post($route, $resources)
    {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

        if ($route == $uri)
        {
            RouterError::method("POST", $route);

            call_user_func($resources);
        }
    }

    public static function delete($route, $resources)
    {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

        if ($route == $uri)
        {
            RouterError::method("DELETE", $route);

            call_user_func($resources);
        }
    }

    public static  function view($route, $resources)
    {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

        RouterError::view("{$resources}");

        if ($route == $uri)
        {
            $file_path = VIEW . $resources;

            require_once $file_path;
        }
    }

}