<?php

namespace Cms\Core\Template;

abstract class Engine
{
    public abstract function setTemplate($name, array $args);
}