<?php
/** @var \Nadiiaz\Blog\Block\Post $block */
$post = $block->getPost();
?>
<div class="block-page">
    <img src="post-placeholder.png" alt="<?= $post->getName() ?>" width="300"/>
    <h1><?= $post->getName() ?></h1>
    <p><?= $post->getDescription() ?></p>
    <div class="block">
        <p><?= date('d-m-Y', $post->getDate()) ?></p>
        <p><?=  $post->getAuthor()?></p>
    </div>
</div>
