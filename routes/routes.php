<?php

use Backend\Controller\LoginController;

return [
    'index' => [
        'type' => 'GET',
        'path' => '/',
        'class' => LoginController::class . ':index'
    ]
];
