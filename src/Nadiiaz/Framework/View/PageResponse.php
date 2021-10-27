<?php

declare(strict_types=1);

namespace Nadiiaz\Framework\View;

use Nadiiaz\Framework\Http\Response\Html;
use Nadiiaz\Framework\Http\Response\Raw;

class PageResponse extends Html
{
    private \Nadiiaz\Framework\View\Renderer $renderer;

    /**
     * @param \Nadiiaz\Framework\View\Renderer $renderer
     */
    public function __construct(
        \Nadiiaz\Framework\View\Renderer $renderer
    ) {
        $this->renderer = $renderer;
    }

    /**
     * @param string $contentBlockClass
     * @return PageResponse
     */
    public function setBody(string $contentBlockClass): PageResponse
    {
        return parent::setBody((string) $this->renderer->setContent($contentBlockClass));
    }
}
