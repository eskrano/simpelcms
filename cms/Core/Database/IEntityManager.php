<?php

namespace Cms\Core\Database;

interface IEntityManager
{
    /**
     * Save entity
     *
     * @param IEntity $entity
     * @return mixed
     */
    public function persist(IEntity $entity);

    /**
     * Write entity data to DB
     * @return mixed
     */
    public function flush();


    /**
     * Get repository of given entity
     * @param IEntity $entity
     * @return mixed
     */
    public function getRepository(IEntity $entity);
}