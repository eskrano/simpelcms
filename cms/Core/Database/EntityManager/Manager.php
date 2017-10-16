<?php

namespace Cms\Core\Database\EntityManager;

use Cms\Core\Database\IEntity;
use Cms\Core\Database\IEntityManager;

class Manager implements IEntityManager
{
    /**
     * @inheritDoc
     */
    public function persist(IEntity $entity)
    {
        switch ($entity->getEntityType()) {
            case IEntityType::TYPE_JSON:
                return;
                break;

        }
    }

    /**
     * @inheritDoc
     */
    public function flush()
    {
        // TODO: Implement flush() method.
    }

    /**
     * @inheritDoc
     */
    public function getRepository(IEntity $entity)
    {
        // TODO: Implement getRepository() method.
    }

}