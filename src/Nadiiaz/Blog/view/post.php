<?php
/** @var \Nadiiaz\Blog\Block\Post $block */
?>
<div class="block-page">
    <img src="block-placeholder.png" alt="<?= $block->getPost()->getName() ?>" width="300"/>
    <h1><?= $block->getPost()->getName() ?></h1>
    <p><?= $block->getPost()->getDescription() ?></p>
    <div class="block">
        <p><?= date('d-m-Y', $block->getPost()->getDate()) ?></p>
        <p><?=  $block->getPost()->getAuthor() ?></p>
    </div>
</div>
