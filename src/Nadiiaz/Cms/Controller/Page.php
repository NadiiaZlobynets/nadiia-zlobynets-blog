<?php

declare(strict_types=1);

namespace Nadiiaz\Cms\Controller;

use Nadiiaz\Framework\Http\Response\Raw;
use Nadiiaz\Framework\View\Block;

class Page implements \Nadiiaz\Framework\Http\ControllerInterface
{
    private \Nadiiaz\Framework\Http\Request $request;

    private \Nadiiaz\Framework\View\PageResponse $pageResponse;

    /**
     * @param \Nadiiaz\Framework\Http\Request $request
     * @param \Nadiiaz\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \Nadiiaz\Framework\Http\Request $request,
        \Nadiiaz\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
        $this->request = $request;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        return $this->pageResponse->setBody(
            Block::class,
            '../src/Nadiiaz/Cms/view/' . $this->request->getParameter('page') . '.php'
        );
    }
}
