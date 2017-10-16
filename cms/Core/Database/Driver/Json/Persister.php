<?php

namespace Cms\Core\Database\Driver\Json;

use Cms\Core\Database\IEntity;
use Cms\Core\Database\IEntityManager;

class Persister implements IEntityManager
{
    /**
     * @inheritDoc
     */
    public function persist(IEntity $entity)
    {
        $dir = SYSTEM_PATH . '/storage/database/json/%s/';
        $dir = sprintf($dir, get_class($entity));

        if (!is_dir($dir) && !is_writable($dir)) {
            if (! @mkdir($dir, 0777)) {
                throw new \Exception("Cant create entity storage dir");
            }
        }

        $reflector = new \ReflectionClass($entity);
        $props = $reflector->getProperties();
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