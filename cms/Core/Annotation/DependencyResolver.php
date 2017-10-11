<?php

namespace Cms\Core\Annotation;

use Cms\Core\Container;

class DependencyResolver
{
    public function resolve($annotationName, $annotationParams)
    {
        /** @var Container $container */
        $container = Container::getInstance();

        /** @var Annotation $dependency */
        $dependency = $container->get(sprintf("CMS_ANNOTATION_%s", $annotationName));

        if (! $dependency) return false;

        return $dependency->init();
    }
}