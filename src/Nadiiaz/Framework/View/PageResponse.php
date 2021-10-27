<?php

declare(strict_types=1);

namespace Nadiiaz\Framework\View;

use Nadiiaz\Framework\Http\Response\Html;

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
     * @param string $template
     * @return PageResponse
     */
    public function setBody(string $contentBlockClass, string $template = ''): PageResponse
    {
        return parent::setBody((string) $this->renderer->setContent($contentBlockClass, $template));
    }
}
