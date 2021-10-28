<?php declare(strict_types=1);

namespace Backend\Controller;

use Http\HttpResponse;

class LoginController
{
    public function index(HttpResponse $response):HttpResponse
    {

        return $response->setBody(include __DIR__.'/../../public/homepage.php');
    }
}