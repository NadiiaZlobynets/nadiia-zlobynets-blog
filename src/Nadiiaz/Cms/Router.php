<?php

declare(strict_types=1);

namespace Nadiiaz\Cms;

use Nadiiaz\Cms\Controller\Page;

class Router implements \Nadiiaz\Framework\Http\RouterInterface
{
    private \Nadiiaz\Framework\Http\Request $request;

    /**
     * @param \Nadiiaz\Framework\Http\Request $request
     */
    public function __construct(
        \Nadiiaz\Framework\Http\Request $request
    ){
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        $cmcPage = [
            '',
            'test-page',
            'test-page-2'
        ];
        if (in_array($requestUrl, $cmcPage)) {
            $this->request->getParameter('page', $requestUrl ?: 'home');
            return Page::class;
        }
        return '';
    }
}