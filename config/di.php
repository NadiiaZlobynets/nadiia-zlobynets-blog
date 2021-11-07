<?php

declare(strict_types=1);

use Nadiiaz\Framework\Database\Adapter\MySQL;

return [
    \Nadiiaz\Framework\Database\Adapter\AdapterInterface::class => DI\get(
        MySQL::class
    ),
    MySQL::class => DI\autowire()->constructorParameter(
        'connectionParams',
        [
            MySQL::DB_NAME     => 'nadiiaz_blog',
            MySQL::DB_USER     => 'nadiiaz_blog_user',
            MySQL::DB_PASSWORD => '45Ya!$""sT&P*C%RNSEhr',
            MySQL::DB_HOST     => 'mysql',
            MySQL::DB_PORT     => '3306'
        ]
    ),
    \Nadiiaz\Framework\Http\RequestDispatcher::class => DI\autowire()->constructorParameter(
        'routers',
        [
            \DI\get(\Nadiiaz\Cms\Router::class),
            \DI\get(\Nadiiaz\Blog\Router::class),
            \DI\get(\Nadiiaz\ContactUs\Router::class),
            \DI\get(\Nadiiaz\Install\Router::class),
        ]
    )
];