<?php

namespace Cms\Core;

use Cms\Exception\ModuleNotFoundException;

class ModuleHandler
{
    private $modulesPath;

    public function __construct($modulesPath)
    {
        $this->modulesPath = $modulesPath;
    }

    public function handle($moduleName)
    {
        if (null === $this->modulesPath) throw new \InvalidArgumentException("Module path not defined");


        $config = $this->load($moduleName);

        $moduleClass = sprintf("Modules\\%s\\%s",
            ucfirst($moduleName),
            ucfirst($moduleName));

        if (! class_exists($moduleClass)) {
            throw new ModuleNotFoundException("Module class boot not found");
        }

        $handle = new $moduleClass;

        return $handle->getConfig();

    }

    private function load($moduleName)
    {
        $path = sprintf("%s/%s", $this->modulesPath, $moduleName);

        if (! is_dir($path)) {
            return false;
        }

        $moduleConfig = file_exists($configPath = sprintf("%s/config.json", $path)) ?
            json_decode(file_get_contents($configPath), true)
            :
            false;

        if (! $moduleConfig) {
            throw new ModuleNotFoundException(sprintf("Module %s don't have config", $moduleName));
        }

        return $moduleConfig;
    }
}
