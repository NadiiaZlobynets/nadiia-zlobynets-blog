<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

$requestDispatcher = new \Nadiiaz\Framework\Http\RequestDispatcher([
    new \Nadiiaz\Cms\Router(),
    new \Nadiiaz\Blog\Router(),
    new \Nadiiaz\ContactUs\Router(),
]);
$requestDispatcher->dispatch();


exit;

switch ($requestUri) {
    default:


        break;
}
