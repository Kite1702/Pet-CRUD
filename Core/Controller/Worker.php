<?php

namespace Core\Controller;

class Worker
{

    public static function show()
    {
        global $conn;

        $products = $conn->query("SELECT * FROM product")->findAll();

        foreach ($products as &$product) {
            $product['img'] = 'data:image/jpeg;base64,' . base64_encode($product['img']);
        }

        require_once VIEW . "worker/worker.php";

    }

    public static function change($id)
    {
        global $conn;

        $id = (int)$id;

        $product = $conn->query("SELECT * FROM product WHERE `id` = {$id}")->findOrFail();
        $product['img'] = 'data:image/jpeg;base64,' . base64_encode($product['img']);

        require_once VIEW . "worker/update.php";

    }

    public static function create()
    {
        global $conn;

        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        if(isset($_FILES['img'])) {
            $imageTmpName = $_FILES['img']['tmp_name'];
            $imageType = $_FILES['img']['type'];

            if($imageType == 'image/jpeg' || $imageType == 'image/png') {
                $imageData = file_get_contents($imageTmpName);
                $conn->query("INSERT INTO `product`(`id`, `name`, `price`, `description`, `img`) VALUES (null, ?, ?, ?, ?)", [
                    $name, $price, $description, $imageData
                ]);
            }
        }

        header("Location: /worker.main");

    }

    public static function delete($id)
    {
        global $conn;

        $id = (int)$id;

        $conn->query("DELETE FROM product WHERE `product`.`id` = {$id}");

        header("Location: /worker.main");

    }

    public static function update()
    {

        global $conn;

        $id = $_POST["id"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        try {
            $conn->query("UPDATE `product` SET `name`='{$name}',`price`='{$price}',`description`='{$description}'  WHERE {$id}");
        }catch (\PDOException $e){
            echo "Error with update";
        }

        header("Location: /worker.main");

    }

}