<?php

namespace Cms\Core\Database\Driver;

use Cms\Core\Database\Exception\ConnectException;
use Cms\Core\Database\IDatabaseDriver;

class JsonFile implements IDatabaseDriver
{
    private $config;

    private $db_path;

    private $finalPathModifier = 'database/json';

    private $schemaDir = 'schema';

    private $tableDir = 'table';

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function connect()
    {
        if (! isset($this->config['path'])) {
            throw new ConnectException(sprintf("Json file driver can't start. DB path is miss"));
        }

        $this->db_path = sprintf("%s/%s", $this->db_path, $this->finalPathModifier);
    }

}