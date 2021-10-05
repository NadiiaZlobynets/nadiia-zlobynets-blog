<?php

declare(strict_types=1);

require_once 'data.php';

$requestUri = trim($_SERVER['REQUEST_URI'],'/');

switch ($requestUri) {
    case '':
        $page = 'home.php';
        break;
    case 'contact-us':
        $page = 'contact-us.php';
        break;
    default:
        if ($data = blogGetCategoryByUrl($requestUri)) {
            $page = 'category.php';
            break;
        }

        if ($data = blogGetPostByUrl($requestUri)) {
            $page = 'post.php';
            break;
        }

        break;
}



require_once  $page;