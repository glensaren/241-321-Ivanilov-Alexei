<?php require(dirname(__DIR__).'/header.php');?>
<h1>CalmFeather</h1>
<h2 class="text-muted">самый удобный онлайн-дневник только для вас</h2>
<table class="table">
  <thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Заголовок</th>
      <th scope="col">Текст</th>
      <th scope="col">Подпись</th>
      <th scope="col">Дата написания</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($articles)): ?>
  <tr>
    <td colspan="5" class="text-center">Тут пока что ничего нет!</td>
  </tr>
<?php else: ?>
  <?php foreach($articles as $article):?> 
    <tr>
      <!-- <th scope="row"><?=$article->getId();?></th> -->
      <td><a href="<?=dirname($_SERVER['REQUEST_URI'])?>/article/<?=$article->getId();?>"><?=$article->getTitle();?></a></td>
      <td><?=$article->getContent();?></td>
      <td>
        <?php $author = $article->getAuthor(); ?>
        <?= $author ? $author->getUsername() : 'Автор неизвестен'; ?>
      </td>
      <td><?=$article->getCreatedAt();?></td>
    </tr>
  <?php endforeach;?>
<?php endif; ?>

  </tbody>
</table>
