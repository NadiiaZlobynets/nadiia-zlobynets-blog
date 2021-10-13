<?php

declare(strict_types=1);

namespace Nadiiaz\Cms;

use Nadiiaz\Cms\Controller\Page;

class Router implements \Nadiiaz\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
         if($requestUrl === '') {
             return Page::class;
         }

          return '';
    }
}