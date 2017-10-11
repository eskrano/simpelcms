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

    /**
     * @Inject(request)
     */
    public function indexAction($request)
    {

    }
}
