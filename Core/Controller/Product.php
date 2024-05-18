<?php

namespace Core\Controller;

class Product
{

    public static function showAll()
    {
        global $conn;

        $products = $conn->query("SELECT * FROM product")->findAll();

        foreach ($products as &$product) {
            $product['img'] = 'data:image/jpeg;base64,' . base64_encode($product['img']);
        }


        require_once VIEW . "main.php";

    }

    public static function showID($product)
    {
        global $conn;

        $id = (int)$product["id"];

        $product = $conn->query("SELECT * FROM product WHERE `id` = {$id}")->findOrFail();
        $product['img'] = 'data:image/jpeg;base64,' . base64_encode($product['img']);

        require_once VIEW . "product.php";
    }

}