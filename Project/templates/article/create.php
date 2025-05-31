<?php require(dirname(__DIR__).'/header.php');?>
<form action="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/store" method="post">
    <div class="mb-3">
        <label for="createdAt" class="form-label">Дата написания</label>
        <input type="date" class="form-control" id="createdAt" name="createdAt">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Заголовок</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Текст</label>
        <textarea class="form-control" id="content" rows="3" name="content" required></textarea>
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Подпись</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="Оставьте пустым, чтобы запостить от лица гостя">
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>

<?php require(dirname(__DIR__).'/footer.html');?>
