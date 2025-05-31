<?php require(dirname(__DIR__).'/header.php');?>
<h1>Создать нового пользователя</h1>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>?route=users/store">
    <div class="mb-3">
        <label for="username" class="form-label">Имя</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Электронная почта</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>
