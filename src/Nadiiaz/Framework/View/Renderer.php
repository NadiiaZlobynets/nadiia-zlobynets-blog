<?php

declare(strict_types=1);

namespace Nadiiaz\Framework\View;

class Renderer
{
    private string $contentBlockClass;
    private \DI\FactoryInterface $factory;

    /**
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(
        \DI\FactoryInterface $factory
    ) {
        $this->factory = $factory;
    }

    public function getContent(): string
    {
        return $this->contentBlockClass;
    }

    /**
     * @param string $contentBlockClass
     * @return void
     */
    public function setContent(string $contentBlockClass): Renderer
    {
        $this->contentBlockClass = $contentBlockClass;

        return $this;
    }

    /**
     * @param string $blockClass
     * @param string $template
     * @return string
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function render(string $blockClass, string $template = ''): string
    {
        /** @var Block $block */
        $block = $this->factory->make($blockClass);

        if ($template) {
            $block->setTemplate($template);
        }

        ob_start();
        require_once $block->getTemplate();
        return (string) ob_get_clean();
    }

    public function __toString()
    {
        return $this->render(Block::class, '../src/page.php');
    }
}
