<?php
require_once '../src/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nadiiaz Blog</title>
    <style>
        header,
        main,
        footer {
            border: 1px dashed black;
        }

        .post-list {
            display: flex;
        }

        .post-list .post {
            max-width: 30%;
        }
    </style>
</head>
<body>
       <main>
        <section title="Posts">
            <h1><?=  $data['name'] ?></h1>
            <div class="post-list">
                <?php foreach (blogGetCategoryPost($data['category_id']) as $post) :  ?>
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
    </main>

</body>
</html>
