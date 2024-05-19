<?php
    require_once VIEW . "incs/navbar.php";
?>

    <div class="container">
        <div class="row">
            <?php /** @var TYPE_NAME $products */
            foreach ($products as &$product) : ?>
                <div class="card m-3 bg-light-subtle" style="width: 18rem;">
                    <a href="product?id=<?= $product['id'] ?>">
                        <img src="<?= $product['img'] ?>" class="card-img-top __img-card" style="height: 256px;width: 256px;" alt="...">
                    </a>
                    <div class="card-body">
                        <a href="product?id=<?= $product['id'] ?>" class="h5 card-title link-offset-2 link-underline link-underline-opacity-0"><?= $product['name'] ?></a>
                        <p class="card-text overflow-hidden" style="height: 48px;"><?= $product['description'] ?></p>
                        <p class="card-text fs-5"><?= $product['price'] ?> грн</p>
                        <a href="#" class="btn btn-primary" id="btn-add">До кошику</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
    require_once VIEW . "incs/footer.php";
?>