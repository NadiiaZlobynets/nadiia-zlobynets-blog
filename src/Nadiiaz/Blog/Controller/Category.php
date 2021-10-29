<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Controller;

use Nadiiaz\Framework\Http\ControllerInterface;
use Nadiiaz\Framework\Http\Response\Raw;

class Category implements ControllerInterface
{
    private \Nadiiaz\Framework\View\PageResponse $pageResponse;

    /**
     * @param \Nadiiaz\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \Nadiiaz\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        return $this->pageResponse->setBody(\Nadiiaz\Blog\Block\Category::class);
    }
}
