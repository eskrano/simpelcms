<?php

namespace Modules\Home\Controllers;

use Cms\Core\Base\Controller;
use Cms\Core\Container;
use Cms\Core\Support\Config;

class HomeController extends Controller
{
    public function mapping()
    {
        return [
            'action' => [
                'index' => 'indexAction',
                'form' => 'formAction',
            ],
        ];
    }

    public function indexAction()
    {
        return $this->template->setTemplate('index.php', [
            'name' => 'name'
        ])->render();
    }

    public function formAction()
    {

    }
}
