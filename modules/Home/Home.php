<?php

namespace Modules\Home;

use Modules\Home\Controllers\HomeController;

class Home
{
    public function getConfig()
    {
        return [
            'events' => [],
            'connections' => [],
            'container' => [
                'App' => true,
            ],
            'templatePath' => __DIR__ . '/Views',
            'controller' => HomeController::class,
        ];
    }
}