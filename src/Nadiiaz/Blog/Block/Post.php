<?php
declare(strict_types=1);

namespace Nadiiaz\Blog\Block;

use Nadiiaz\Blog\Model\Author\Entity as AuthorEntity;

class Post extends \Nadiiaz\Framework\View\Block
{
    private \Nadiiaz\Framework\Http\Request $request;

    private \Nadiiaz\Blog\Model\Author\Repository $authorRepository;

    protected string $template = '../src/Nadiiaz/Blog/view/post.php';


    /**
     * @param \Nadiiaz\Framework\Http\Request $request
     * @param \Nadiiaz\Blog\Model\Author\Repository $authorRepository
     */
    public function __construct(
        \Nadiiaz\Framework\Http\Request $request,
        \Nadiiaz\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->authorRepository = $authorRepository;
    }
    /**
     * @return AuthorEntity
     */
    public function getAuthor(): AuthorEntity
    {
        return $this->request->getParameter('author');
    }

    /**
     * @return AuthorEntity[]
     */
    public function getAuthorByPostId(): array
    {
        return $this->authorRepository ->getByIds(
            $this->getAuthor()->getPostsIds()
        );
    }
}
