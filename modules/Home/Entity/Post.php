<?php

namespace Modules\Home\Entity;

use Cms\Core\Database\Driver\JsonSchema;
use Cms\Core\Database\IEntity;
use CMS\Core\Database\IEntityType;

class Post implements IEntity
{
    private $id;

    private $username;

    private $text;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Post
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return Post
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     * @return Post
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return array
     */
    public function buildEntity(): array

    {
        $fields = [
            'id' => JsonSchema::TYPE_INT,
            'username' => JsonSchema::TYPE_STRING,
            'text' => JsonSchema::TYPE_STRING,
        ];

        $modifiers = [
            'id' => JsonSchema::MODIFIER_AUTO_INCREMENT
        ];

        return compact('fields', 'modifiers');
    }


    public function getEntityType(): int
    {
        return IEntityType::TYPE_JSON;
    }

}