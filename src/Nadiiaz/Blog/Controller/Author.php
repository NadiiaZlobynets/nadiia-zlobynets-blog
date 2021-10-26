<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Controller;

use Nadiiaz\Framework\Http\ControllerInterface;

class Author implements ControllerInterface
{
    private \Nadiiaz\Framework\Http\Request $request;

    /**
     * @param \Nadiiaz\Framework\Http\Request $request
     */
    public function __construct(
        \Nadiiaz\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    public function execute(): string
    {
        $author = $this->request->getParameter('author');
        $page = 'author.php';

        ob_start();
        require_once "../src/author.php";
        return ob_get_clean();
    }
}