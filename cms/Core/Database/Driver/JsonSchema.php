<?php

namespace Cms\Core\Database\Driver;

class JsonSchema
{
    /**
     * List of types
     */
    const TYPE_INT = 'int';
    const TYPE_STRING = 'string';
    const TYPE_ARRAY = 'array';
    const TYPE_OBJECT = 'object';
    const TYPE_RELATION = 'relation';
    const TYPE_BOOL = 'bool';

    /**
     * List of modifiers
     */
    const MODIFIER_AUTO_INCREMENT = 'AI';
    const MODIFIER_TRIGGER = 'trigger';
}