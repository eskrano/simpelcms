<?php

namespace Modules\Home\Controllers;

use Cms\Core\Base\Controller;
use Cms\Core\Container;
use Cms\Core\Database\EntityManager\Manager;
use Cms\Core\Support\Config;
use Modules\Home\Entity\Post;

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
        $post = new Post();
        $post->setText('Hello world');
        $post->setUsername('Alex');
        $post->setId(1);

        $manager = new Manager();
        $manager->persist($post);
    }
}
