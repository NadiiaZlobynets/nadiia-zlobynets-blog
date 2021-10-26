<?php
/** @var \Nadiiaz\Blog\Model\Category\Entity $category */
?>
<section title="Posts">
    <h1><?= $category->getName() ?></h1>
    <div class="post-list">
        <?php foreach (blogGetCategoryPost($category->getCategoryId()) as $post) :  ?>
            <div class="post">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $post['name'] ?>" width="200"/>
                </a>
                <br>
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>"><?= $post['name'] ?></a>
                <p><?= $post['date'] ?></p>
                <p><?= $post['author'] ?></p>
            </div>
        <?php endforeach;?>
    </div>
</section>
