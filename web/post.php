<?php
require_once 'data.php';
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
    <header>
        <a href="/" title="nadiiaz blog">
            <img src="logo.png" alt="nadiiaz logo" width="200"/>
        </a>
        <nav>
            <ul>
                <?php foreach (blogGetCategory() as $category) : ?>
                    <li>
                        <a href="/<?= $category['url']?>"><?= $category['name'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>

    <main>
        <img src="post-placeholder.png" alt="Post 1" width="300"/>
        <h1>Post 1</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolore eos exercitationem, impedit laudantium minima minus molestias quaerat quam, quidem repellendus sit temporibus veniam veritatis.</p>
        <div class="post">
            <span>9.04.2022</span>
            <p>Nadiia Zlobynets</p>

    </main>

    <footer>
        <nav>
            <ul>
                <li>
                    <a href="/about-us">About Us</a>
                </li>
                <li>
                    <a href="/terms-and-conditions">Terms & Conditions</a>
                </li>
                <li>
                    <a href="/contact-us">Contact Us</a>
                </li>
            </ul>
        </nav>
        <p>© Nadiia Zlobynets 2021. All Rights Reserved.</p>
    </footer>
</body>
</html>
