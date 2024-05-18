<?php
    require_once VIEW . "incs/navbar.php";
?>

    <div class="container">
        <div class="row">
            <?php /** @var TYPE_NAME $products */
            foreach ($products as &$product) : ?>
                <div class="card m-3 bg-light-subtle" style="width: 18rem;">
                    <img src="<?= $product['img'] ?>" class="card-img-top __img-card" style="height: 256px;width: 256px;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="card-text overflow-hidden" style="height: 48px;"><?= $product['description'] ?></p>
                        <p class="card-text fs-5"><?= $product['price'] ?> грн</p>
                        <a href="product?id=<?= $product['id'] ?>" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
    require_once VIEW . "incs/footer.php";
?>