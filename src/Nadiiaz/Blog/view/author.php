<?php
/** @var \Nadiiaz\Blog\Block\Category $block
 */
?>
<div title="author-wrapper">
    <div class="post-list">
        <?php foreach ($block->getAuthorPosts() as $author) :  ?>
            <div class="post">
                <a href="/<?= $author->getUrl() ?>" title="<?=
                $author->getName() ?>">
                    <p><?= $author->getName() ?></p>
                    <img src="/post-placeholder.png" alt="<?= $author->getAuthor() ?>" width="200"/>
                </a>
                <br>
                <a href="/<?= $author->getAuthorPostsUrl() ?>" title="<?=
                $author->getAuthorId() ?>"><?= $author->getAuthorId() ?></a>
                <p><?= date('d-m-Y', $author->getDate()) ?></p>
            </div>
        <?php endforeach;?>
    </div>
</div>
