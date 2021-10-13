<?php

declare(strict_types=1);

namespace Nadiiaz\Blog;

use Nadiiaz\Blog\Controller\Category;
use Nadiiaz\Blog\Controller\Post;

class Router implements \Nadiiaz\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
//        require_once '..src/data.php'
//        if ($data = blogGetCategoryByUrl($requestUrl)) {
//            return Category::class;
//        }
//
//        if ($data = blogGetPostByUrl($requestUrl)) {
//            return Post::class;
//        }

        return '';
    }
}