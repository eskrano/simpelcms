<?php

namespace CMS\Core\Database;

interface IEntityType
{
    const TYPE_JSON = 0;
    const TYPE_DB = 1;
    const TYPE_CACHE = 2;
    const TYPE_SESSION = 3;
    const TYPE_COOKIE = 4;
    const TYPE_BROWSER_STORAGE = 5;
}