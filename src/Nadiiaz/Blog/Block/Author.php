<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Block;

use Nadiiaz\Blog\Model\Author\Entity as AuthorEntity;

use Nadiiaz\Blog\Model\Post\Entity as PostEntity;

class Author extends \Nadiiaz\Framework\View\Block
{
    private \Nadiiaz\Framework\Http\Request $request;

    private \Nadiiaz\Blog\Model\Author\Repository $authorRepository;

    private \Nadiiaz\Blog\Model\Post\Repository $postRepository;


    protected string $template = '../src/Nadiiaz/Blog/view/author.php';
    /**
     * @param \Nadiiaz\Framework\Http\Request $request
     * @param \Nadiiaz\Blog\Model\Author\Repository $authorRepository
     * @param \Nadiiaz\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \Nadiiaz\Framework\Http\Request $request,
        \Nadiiaz\Blog\Model\Author\Repository $authorRepository,
        \Nadiiaz\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->authorRepository = $authorRepository;
        $this->postRepository = $postRepository;
    }
    /**
     * @return AuthorEntity
     */
    public function getAuthor(): AuthorEntity
    {
        return $this->request->getParameter('author');
    }

    /**
     * @return PostEntity[]
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getAuthorPosts(): array
    {
        return $this->postRepository->getByIds(
            $this->getAuthor()->getPostsIds()
        );
    }

    /**
     * @return AuthorEntity[]
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getPostsByAuthorId(): array
    {
        return $this->authorRepository->getList();
    }
}
