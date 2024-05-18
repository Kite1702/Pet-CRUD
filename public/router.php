<?php

use Core\Main\Router\Router;

Router::get("", function ()
{
    new \Core\Controller\Product();
    \Core\Controller\Product::showAll();
});

Router::get("product", function()
{
    new \Core\Controller\Product();
    \Core\Controller\Product::showID($_GET);
});

Router::get("worker.main", function ()
{
    new \Core\Controller\Worker();
    \Core\Controller\Worker::show();
});

Router::view("worker.create", "worker/create.php");

Router::post("worker.store", function ()
{
    new \Core\Controller\Worker();
    \Core\Controller\Worker::create();
});

Router::get("worker.change", function ()
{
    new \Core\Controller\Worker();
    \Core\Controller\Worker::change($_GET["id"]);
});

Router::post("worker.update", function ()
{
    new \Core\Controller\Worker();
    \Core\Controller\Worker::update();
});

Router::get("worker.delete", function ()
{
    new \Core\Controller\Worker();
    \Core\Controller\Worker::delete($_GET["id"]);
});