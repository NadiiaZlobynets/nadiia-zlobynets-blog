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
        <!-- @TODO: Implement recently viewed posts -->
        <section title="Recently Viewed Posts">
            <h2>Recently Viewed Posts</h2>
            <div class="post-list">
                <div class="post">
                    <a href="/post-1-url" title="Post 1">
                        <img src="/post-placeholder.png" alt="Post 1" width="200"/>
                    </a>
                    <br>
                    <a href="/post-1-url" title="Post 1">Post 1</a>
                    <p>9.04.2022</p>
                    <p>Nadiia Zlobynets</p>
                </div>
                <div class="post">
                    <a href="/post-2-url" title="Post 2">
                        <img src="/post-placeholder.png" alt="Post 2" width="200"/>
                    </a>
                    <br>
                    <a href="/post-2-url" title="Post 2">Post 2</a>
                    <p>22.09.2022</p>
                    <p>Nadiia Zlobynets</p>

                </div>
                <div class="post">
                    <a href="/post-3-url" title="Post 3">
                        <img src="/post-placeholder.png" alt="Post 3" width="200"/>
                    </a>
                    <br>
                    <a href="/post-3-url" title="Post 3">Post 3</a>
                    <p>11.04.2022</p>
                    <p>Nadiia Zlobynets</p>
                </div>
            </div>
        </section>
    </main>


</body>
</html>
