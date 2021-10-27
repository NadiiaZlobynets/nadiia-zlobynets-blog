<?php

declare(strict_types=1);

namespace Nadiiaz\Blog\Controller;

use Nadiiaz\Framework\Http\ControllerInterface;

class Post implements ControllerInterface
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

    public function execute(): string
    {
        return (string) $this->renderer->setContent(\Nadiiaz\Blog\Block\Post::class);
    }
}
