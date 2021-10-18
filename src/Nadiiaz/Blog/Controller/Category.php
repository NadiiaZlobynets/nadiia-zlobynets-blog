<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Controller;

use Nadiiaz\Framework\Http\ControllerInterface;

class Category implements ControllerInterface
{
    private \Nadiiaz\Framework\Http\Request $request;

    /**
     * @param \Nadiiaz\Framework\Http\Request $request
     */
    public function __construct(
        \Nadiiaz\Framework\Http\Request  $request
    ) {
        $this->request = $request;
    }

    public function execute(): string
    {
        $data = $this->request->getParameter('category');
        $page = 'category.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}