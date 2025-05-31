<?php require(dirname(__DIR__).'/header.php');?>
<form action="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>/update" method="post">
    
    <div class="mb-3">
        <label for="createdAt" class="form-label">Public date</label>
        <input type="text" class="form-control" id="createdAt" name="createdAt" value="<?=$article->getCreatedAt();?>">
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?=$article->getTitle();?>">
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Text</label>
        <textarea class="form-control" id="content" rows="3" name="content"><?=$article->getContent();?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php require(dirname(__DIR__).'/footer.html');?>
