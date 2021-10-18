<?php

declare(strict_types=1);

return [
    \Nadiiaz\Framework\Http\RequestDispatcher::class => DI\autowire()->constructorParameter(
        'routers',
        [
            \DI\get(\Nadiiaz\Cms\Router::class),
            \DI\get(\Nadiiaz\Blog\Router::class),
            \DI\get(\Nadiiaz\ContactUs\Router::class)
        ]
    )
];