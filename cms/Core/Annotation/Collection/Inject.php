<?php

namespace Cms\Core\Annotation\Collection;

use Cms\Core\Container;

class Inject implements IAnnotation
{
    /** @var string  */
    private $dependency;

    public function __construct(string $dependency)
    {
        $this->dependency = $dependency;
    }

    /**
     * @return bool|mixed
     */
    public function handle()
    {
        return Container::getInstance()->get($this->dependency);
    }
}