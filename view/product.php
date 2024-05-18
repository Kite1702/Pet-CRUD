<?php
require_once VIEW . "incs/navbar.php";
?>
    <?php
        /** @var TYPE_NAME $product */
    ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="row m-5">
                    <div class="col">
                        <img src="<?= $product['img'] ?>" style="height: 428px; width: 428px;">
                    </div>
                    <div class="col">
                        <div class="row mb-2">
                            <h3><?= $product['name'] ?></h3>
                        </div>
<!--                        <div class="row">
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>-->
                        <div class="row">
                            <div class="fs-4">
                                <?= $product['price'] ?> грн
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h5>
                                <?= $product['description'] ?>
                            </h5>
                        </div>
                        <hr>
                        <div class="row">
                            <a href="#" class="btn btn-success btn-lg col-4">Купити</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once VIEW . "incs/footer.php";
?>