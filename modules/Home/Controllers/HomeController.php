<?php

namespace Modules\Home\Controllers;

use Cms\Core\Container;

class HomeController
{
    public function mapping()
    {
        return [
            'action' => [
                'index' => 'indexAction',
            ],
        ];
    }

    public function indexAction()
    {
        return [
            'test' => 1,
        ];
    }
}
