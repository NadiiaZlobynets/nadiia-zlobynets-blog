<?php
/** @var \Nadiiaz\Blog\Model\Author\Entity $author */
?>
<section title="Posts">
    <h1><?= $author->getName() ?></h1>
    <div class="post-list">
        <?php foreach ($foo->getCategoryPosts($author->getAuthor()) as $author) :  ?>
            <div class="post">
                <a href="/<?= $author->getUrl() ?>" title="<?= $author->getName() ?>">
                    <img src="/post-placeholder.png" alt="<?= $author->getName() ?>" width="200"/>
                </a>
                <br>
                <a href="/<?= $author->getUrl() ?>" title="<?= $author->getName() ?>"><?= $author->getName() ?></a>
                <p><?= date('d-m-Y', $author->getDate()) ?></p>
                <p><?= $author->getAuthor() ?></p>
            </div>
        <?php endforeach;?>
    </div>
</section>
