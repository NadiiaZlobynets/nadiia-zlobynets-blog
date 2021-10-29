<?php

declare(strict_types=1);

namespace Nadiiaz\ContactUs\Controller;

use Nadiiaz\Framework\Http\ControllerInterface;
use Nadiiaz\Framework\Http\Response\Raw;
use Nadiiaz\Framework\View\Block;

class Form implements ControllerInterface
{
    private \Nadiiaz\Framework\View\PageResponse $pageResponse;

    /**
     * @param \Nadiiaz\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \Nadiiaz\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        return $this->pageResponse->setBody(
            Block::class,
            '../src/Nadiiaz/ContactUs/view/contact-us.php'
        );
    }
}
