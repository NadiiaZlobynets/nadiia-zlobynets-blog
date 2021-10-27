<?php
/** @var \Nadiiaz\Blog\Block\Category $block */
?>
<div title="category-wrapper">
    <h1><?= $block->getCategory()->getName() ?></h1>
    <div class="post-list">
        <?php foreach ($block->getCategoryPosts() as $post) : ?>
            <div class="post">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/post-placeholder.png" alt="<?= $post->getName()  ?>" width="200"/>
                </a>
                <br>
                <a href="/<?=  $post->getUrl() ?>" title="<?= $post->getName()  ?>"><?= $post->getName()  ?></a>
                <p><?=  date('d-m-Y', $post->getDate()) ?></p>
                <p><?= $post->getAuthor() ?></p>
            </div>
        <?php endforeach;?>
    </div>
</div>
