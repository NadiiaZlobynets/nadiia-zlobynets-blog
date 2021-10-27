<?php
/** @var \Nadiiaz\Framework\View\Renderer $this */
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
<header>
    <a href="/" title="nadiiaz blog">
        <img src="logo.png" alt="nadiiaz logo" width="200"/>
    </a>
    <nav>
        <ul>
            <?php foreach (blogGetCategory() as $categoryData) : ?>
                <li>
                    <a href="/<?= $categoryData['url']?>"><?= $categoryData['name'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>

<main>
    <?= $this->render($this->getContent()) ?>
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
