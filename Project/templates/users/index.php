<?php require(dirname(__DIR__).'/header.php');?>
<h1>Пользователи</h1>
<h3 class="text-muted">Надеюсь Вы не забыли свои права администратора? Обычным пользователям сюда нельзя :D</h3>
<table class="table">
  <thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Имя пользователя</th>
      <th scope="col">"Мыло"</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($users)): ?>
  <tr>
    <td colspan="2" class="text-center">Однако пусто!</td>
  </tr>
<?php else: ?>
  <?php foreach($users as $user):?> 
    <tr>
      <td><?= htmlspecialchars($user->getUsername()) ?></td>
      <td><?= htmlspecialchars($user->getEmail()) ?></td>
    </tr>
  <?php endforeach;?>
<?php endif; ?>

  </tbody>
</table>

<a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/index.php?route=users/create" class="btn btn-primary mb-3">Создать пользователя</a>

