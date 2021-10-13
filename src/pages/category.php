        <section title="Posts">
            <h1><?= $data['name'] ?></h1>
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
