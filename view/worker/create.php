<?php
require_once VIEW . "incs/navbar.php";
?>

<div class="container d-flex justify-content-center mt-5">
    <form action="/worker.store" method="post" enctype="multipart/form-data" class="col-3">
        <div class="mb-3">
            <label for="name" class="form-label text-white">Назва</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label text-white">Опис</label>
            <textarea class="form-control" placeholder="Опис товару" id="description" name="description" style="height: 100px"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label text-white">Ціна</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label text-white">Фото товару</label>
            <input type="file" class="form-control"  id="img" name="img">
        </div>
        <button type="submit" class="btn btn-success">Створити</button>
    </form>
</div>

<?php
require_once VIEW . "incs/footer.php";
?>