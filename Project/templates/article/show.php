<?php require(dirname(__DIR__).'/header.php');?>
<div class="card mt-3 mx-auto" style="width: 35rem;">
  <div class="card-body">
    <h5 class="card-title text-center"><?=$article->getTitle();?></h5>
    <h6 class="card-subtitle mb-2 text-muted text-center">
    <?= $article->getAuthor()->getUsername() ?? 'Автор неизвестен'; ?>
</h6>

    <p class="card-text"><?=$article->getContent();?></p>
    <?php if ($article->getImagePath()): ?>
<img src="/241-321-Ivanilov-Alexei/Project/www<?= $article->getImagePath() ?>" alt="Изображение статьи" style="display: block; width: 100%;">
    <?php endif; ?>
    <div class="text-center">
      <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>/edit" class="card-link text-decoration-none">Редактировать</a>
      <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>/delete" class="card-link text-decoration-none">Удалить</a>
    </div>
  </div>
</div>
<?php require(dirname(__DIR__).'/footer.html');?>
