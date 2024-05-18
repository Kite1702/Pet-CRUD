<?php
    require_once VIEW . "incs/navbar.php";
?>

    <div class="container">
        <div class="row">

            <div class="card m-3 bg-light-subtle" style="width: 18rem;">
                <div class="card-body  d-flex justify-content-center align-items-center">
                        <a href="/worker.create" class="btn btn-secondary d-flex justify-content-center align-items-center" style="width: 178px; height: 178px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                            </svg>
                        </a>
                </div>
            </div>

            <?php /** @var TYPE_NAME $products */

            foreach ($products as &$product) : ?>
                <div class="card m-3 bg-light-subtle" style="width: 18rem;">
                    <img src="<?= $product['img'] ?>" class="card-img-top __img-card" width="262" height="262" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="card-text overflow-hidden" style="height: 48px;"><?= $product['description'] ?></p>
                        <p class="card-text fs-5"><?= $product['price'] ?> грн</p>
                        <div class="row">
                            <a href="/worker.change?id=<?= $product['id'] ?>" class="btn btn-success mb-2">Редагувати</a>
                            <a href="/worker.delete?id=<?= $product['id'] ?>" class="btn btn-danger ">Видалити</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


<?php
    require_once VIEW . "incs/footer.php";
?>