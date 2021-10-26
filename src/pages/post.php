<?php
/** @var \Nadiiaz\Blog\Model\Post\Entity $post */
?>
<div class="post-page">
    <img src="post-placeholder.png" alt="<?= $post->getName() ?>" width="300"/>
    <h1><?= $post->getName() ?></h1>
    <p><?= $post->getDescription() ?></p>
    <div class="post">
        <p><?= date('d-m-Y', $post->getDate()) ?></p>
        <p><?=  $post->getAuthor() ?></p>
    </div>
</div>
