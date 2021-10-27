<?php

/** @var \Nadiiaz\Blog\Block\Post $block */
$product = $block->getPost();
?>
<div class="block-page">
    <img src="post-placeholder.png" alt="<?= $product->getName() ?>" width="300"/>
    <h1><?= $product->getName() ?></h1>
    <p><?= $product->getDescription() ?></p>
    <div class="block">
        <p><?= date('d-m-Y', $product->getDate()) ?></p>
        <p><?=  $product->getAuthor() ?></p>
    </div>
</div>
