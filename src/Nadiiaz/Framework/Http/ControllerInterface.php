<?php

declare(strict_types=1);

namespace Nadiiaz\Framework\Http;

use Nadiiaz\Framework\Http\Response\Raw;

interface ControllerInterface
{
    public function execute(): Raw;
}