<?php

declare(strict_types=1);

namespace Nadiiaz\Framework\Http;

interface RouterInterface
{
    /**
     * @param string $requestUrl
     * @return string
     */

    public  function match(string $requestUrl): string;
}