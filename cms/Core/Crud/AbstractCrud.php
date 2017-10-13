<?php

namespace Cms\Core\Crud;

abstract class AbstractCrud
{
    public $entity;

    public $actions;

    public $idParam = 'id';

    public $perPage = 20;
}