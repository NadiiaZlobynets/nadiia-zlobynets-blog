<?php

declare(strict_types=1);

namespace  Nadiiaz\Install;

use  Nadiiaz\Install\Controller\Index;

class Router implements \ Nadiiaz\Framework\Http\RouterInterface
{
    private \ Nadiiaz\Framework\Http\Request $request;

    /**
     * @param \ Nadiiaz\Framework\Http\Request $request
     */
    public function __construct(
        \ Nadiiaz\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($this->request->getRequestUrl() === 'install') {
            return Index::class;
        }

        return '';
    }
}
