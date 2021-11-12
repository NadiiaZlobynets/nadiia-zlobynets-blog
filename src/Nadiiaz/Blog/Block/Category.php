<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Block;

use Nadiiaz\Blog\Model\Category\Entity as CategoryEntity;
use Nadiiaz\Blog\Model\Post\Entity as PostEntity;

class Category extends \Nadiiaz\Framework\View\Block
{
    private \Nadiiaz\Framework\Http\Request $request;

    private \Nadiiaz\Blog\Model\Post\Repository $postRepository;

    protected string $template = '../src/Nadiiaz/Blog/view/category.php';

    /**
     * @param \Nadiiaz\Framework\Http\Request $request
     * @param \Nadiiaz\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \Nadiiaz\Framework\Http\Request $request,
        \Nadiiaz\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
    }

    /**
     * @return CategoryEntity
     */
    public function getCategory(): CategoryEntity
    {
        return $this->request->getParameter('category');
    }

    /**
    <div class="post-list">
        <?php foreach ($block->getAuthorP
     * @return PostEntity[]
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getCategoryPosts(): array
    {
        return $this->postRepository->getByIds(
            $this->getCategory()->getPostsIds()
        );
    }

    /**
     * @return PostEntity[]
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getAuthorPosts(): array
    {
        return $this->postRepository->getByIds(
            $this->getCategory()->getByAuthorId()
        );
    }
}
