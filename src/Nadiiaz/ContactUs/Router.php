<?php

declare(strict_types=1);

namespace Nadiiaz\ContactUs;

use Nadiiaz\ContactUs\Controller\Form;

class Router implements \Nadiiaz\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($requestUrl === 'contact-us') {
            return Form::class;
        }

        return '';
    }
}