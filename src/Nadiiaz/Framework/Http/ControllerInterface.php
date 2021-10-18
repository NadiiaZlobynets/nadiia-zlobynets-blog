<?php

declare(strict_types=1);

namespace Nadiiaz\Framework\Http;

interface ControllerInterface
{
    public function execute(): string;
}