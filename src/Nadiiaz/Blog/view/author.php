<?php
/** @var \Nadiiaz\Blog\Block\Author $block */
?>
<div title="author-wrapper">
    <h1><?= $block->getAuthor()->getAuthor() ?></h1>
    <div class="post-list">
        <?php foreach ($block->getCategoryPosts() as $author) :  ?>
            <div class="post">
                <a href="/<?= $block->getAuthor()->getUrl() ?>" title="<?= $block->getAuthor()->getAuthor() ?>">
                    <p><?= $author->getName() ?></p>
                    <img src="/post-placeholder.png" alt="<?= $block->getAuthor()->getAuthor() ?>" width="200"/>
                </a>
                <br>
                <a href="/<?= strtolower($author->getAuthor()) ?>" title="<?=
                $author->getAuthor() ?>"><?= $author->getAuthor()?></a>
                <p><?= date('d-m-Y', $author->getDate()) ?></p>
            </div>
        <?php endforeach;?>
    </div>
</div>
