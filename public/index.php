<?php

define("ROOT", dirname(__DIR__));
define("CORE", ROOT . "/Core/");
define("MAIN", CORE . "Main/");
define("VIEW", ROOT . "/view/");
define("RES", ROOT . "/resources/");

require_once ROOT . "/vendor/autoload.php";
$db_config = require ROOT . '/public/db_config.php';
$conn = \Core\Main\Database\DbConn::getInstance()->getConnection($db_config);

new \Core\Main\Router\Router();