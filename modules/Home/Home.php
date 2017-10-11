<?php

namespace Modules\Home;

use Modules\Home\Controllers\HomeController;

class Home
{
    public $x = 1;


    public function getConfig()
    {
        return [
            'events' => [],
            'connections' => [],
            'container' => [
                'App' => true,
            ],
            'controller' => HomeController::class,
        ];
    }
}