<?php

namespace Cms\Core\Annotation;

class ParamResolver
{
    public function resolve(string $annotation)
    {
        exit(var_dump($annotation));
    }
}