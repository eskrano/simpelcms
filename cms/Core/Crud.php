<?php

namespace Cms\Core;

abstract class Crud
{
    private $crudName = "AbstractCrud";

    public function getCrudName()
    {
        return $this->crudName;
    }
}