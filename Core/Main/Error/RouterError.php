<?php

namespace Core\Main\Error;

use Core\Main\Error\ReturnError;

class RouterError
{

    public RouterError $error;

    public static function error($expected, $received, $type, $module, $options)
    {
        return $error = [
            "type" => "$type",
            "expected" => "$expected",
            "received" => "$received",
            "module" => "$module",
            "options" => "$options"
        ];
    }

    public static function method($expected, $route, $received = null)
    {
        if ($expected == $received)
        {
            return null;
        }else
        {
            $options = "Method fall short of expectations";
        }

        if ($expected == $_SERVER["REQUEST_METHOD"])
        {
            return null;
        }else{
            $options = "Method does not match the check with \$_SERVER[\"REQUEST_METHOD\"]. Expected: {$expected} on {$route}";
        }

        $result = self::error($expected, $received, "METHOD", "Router", $options);

        ReturnError::error_400($result);
    }

    public static function view($expected, $received = null)
    {
        $file_path = VIEW . $expected;

        if ($expected == $received)
        {
            return null;
        }else
        {
            $options = "Expected does not match with received";
        }

        if(file_exists($file_path))
        {
            return null;
        }else
        {
            $options = "No such file was found";
        }

        $result = self::error($expected, $received, "VIEW", "Router", $options);

        ReturnError::error_400($result);
    }

}