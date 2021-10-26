<?php
/** @var \Nadiiaz\Blog\Block\Author $block */
?>
<div title="author-wrapper">
    <h1><?= $block->getAuthor()->getAuthor() ?></h1>
    <div class="post-list">
        <?php foreach ($block->getAuthorsPosts() as $author) :  ?>
            <div class="post">
                <a href="/<?= $block->getAuthor()->getUrl() ?>" title="<?= $block->getAuthor()->getAuthor() ?>">
                    <img src="/post-placeholder.png" alt="<?= $block->getAuthor()->getAuthor() ?>" width="200"/>
                </a>
                <br>
                <a href="/<?= $author->getUrl() ?>" title="<?=
                $block->getAuthor()->getAuthor() ?>">
                <p><?= date('d-m-Y', $block->getAuthor()->getDate()) ?></p>
                <p><?= $block->getAuthor()->getAuthor()?></p>
            </div>
        <?php endforeach;?>
    </div>
</div>
