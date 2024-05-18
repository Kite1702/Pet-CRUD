<?php

namespace Core\Main\Error;

class ReturnError
{

    public static function error_400($resources)
    {
        require_once CORE . "Main/Error/pages/400.php";

        exit();
    }

    public static function error_404($resources)
    {
        require_once CORE . "Main/Error/pages/404.php";

        exit();
    }

    public static function error_500($resources)
    {
        require_once CORE . "Main/Error/pages/500.php";

        exit();
    }

}