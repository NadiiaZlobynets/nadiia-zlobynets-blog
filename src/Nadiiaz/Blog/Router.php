<?php

declare(strict_types=1);

namespace Nadiiaz\Blog;

use Nadiiaz\Blog\Controller\Category;
use Nadiiaz\Blog\Controller\Post;

class Router implements \Nadiiaz\Framework\Http\RouterInterface
{
    private \Nadiiaz\Framework\Http\Request $request;

    /**
     * @param \Nadiiaz\Framework\Http\Request $request
     */
    public function __construct(
        \Nadiiaz\Framework\Http\Request $request
    ){
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($data = blogGetCategoryByUrl($requestUrl)) {
            $this->request->setParameter('category', $data);
            return Category::class;
        }

        if ($data = blogGetPostByUrl($requestUrl)) {
            $this->request->setParameter('post', $data);
            return Post::class;
        }

        return '';
    }
}