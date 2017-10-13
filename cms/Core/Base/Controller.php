<?php

namespace Cms\Core\Base;

use Cms\Core\Template\PhpEngine;

abstract class Controller
{
    /** @var  PhpEngine */
    protected $template;

    public function boot(array $config)
    {
        if (isset($config['templatePath'])) {
            $this->template = new PhpEngine($config['templatePath']);
        }
    }

    public abstract function mapping();
}