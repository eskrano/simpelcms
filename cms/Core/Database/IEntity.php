<?php


namespace Cms\Core\Database;

interface IEntity
{
    /**
     * Build entity fields
     * @return array
     */
    public function buildEntity(): array;

    /**
     * Get entity type
     * @return int
     */
    public function getEntityType(): int;
}