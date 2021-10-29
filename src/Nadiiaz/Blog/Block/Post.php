<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Block;

use Nadiiaz\Blog\Model\Post\Entity as PostEntity;

class Post extends \Nadiiaz\Framework\View\Block
{
    private \Nadiiaz\Framework\Http\Request $request;

    protected string $template = '../src/Nadiiaz/Blog/view/post.php';

    /**
     * @param \Nadiiaz\Framework\Http\Request $request
     */
    public function __construct(
        \Nadiiaz\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    /**
     * @return PostEntity
     */
    public function getPost(): PostEntity
    {
        return $this->request->getParameter('post');
    }
}