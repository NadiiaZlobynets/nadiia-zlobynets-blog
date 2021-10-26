<?php

declare(strict_types=1);

namespace Nadiiaz\Blog;

use Nadiiaz\Blog\Controller\Author;
use Nadiiaz\Blog\Controller\Category;
use Nadiiaz\Blog\Controller\Post;


class Router implements \Nadiiaz\Framework\Http\RouterInterface
{
    private \Nadiiaz\Framework\Http\Request $request;

    private Model\Category\Repository $categoryRepository;

    private Model\Post\Repository $postRepository;

    private Model\Author\Repository $authorRepository;


    /**
     * @param \Nadiiaz\Framework\Http\Request $request
     * @param Model\Category\Repository $categoryRepository
     * @param Model\Post\Repository $postRepository
     * @param Model\Author\Repository $authorRepository
     */
    public function __construct(
        \Nadiiaz\Framework\Http\Request $request,
        \Nadiiaz\Blog\Model\Category\Repository $categoryRepository,
        \Nadiiaz\Blog\Model\Post\Repository $postRepository,
        \Nadiiaz\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category', $category);
            return Category::class;
        }

        if ($post = $this->postRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('post', $post);
            return Post::class;
        }

        if ($author = $this->authorRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('author', $author);
            return Author::class;
        }

        return '';
    }
}
