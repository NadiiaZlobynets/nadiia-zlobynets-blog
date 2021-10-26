<?php

declare(strict_types=1);

namespace Nadiiaz\Blog;

use Nadiiaz\Blog\Controller\Category;
use Nadiiaz\Blog\Controller\Post;


class Router implements \Nadiiaz\Framework\Http\RouterInterface
{
    private \Nadiiaz\Framework\Http\Request $request;

    private Model\Category\Repository $categoryRepository;

    /**
     * @param \Nadiiaz\Framework\Http\Request $request
     * @param Model\Category\Repository $categoryRepository
     */
    public function __construct(
        \Nadiiaz\Framework\Http\Request $request,
        \Nadiiaz\Blog\Model\Category\Repository $categoryRepository
    ){
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category', $category);
            return Category::class;
        }

        if ($data = blogGetPostByUrl($requestUrl)) {
            $this->request->setParameter('post', $data);
            return Post::class;
        }

        return '';
    }
}
