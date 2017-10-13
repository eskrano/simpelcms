<?php

namespace Cms\Core\Template;

class PhpEngine extends Engine
{

    /**
     * @var string
     */
    private $template;

    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $path;

    /**
     * PhpEngine constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @param $name
     * @param array $args
     * @return $this
     */
    public function setTemplate($name, array $args)
    {
        $this->template = $name;
        $this->data = $args;

        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        if (file_exists($path = $this->getTemplatePath($this->template))) {
            ob_start();

            extract($this->data);

            require_once $path;

            return ob_end_flush();
        }

        throw new \InvalidArgumentException(sprintf("Template %s not found in %s", $this->template, $path));
    }

    public function renderPartial($name, array $args = [])
    {
        if (file_exists($path = $this->getTemplatePath($name))) {
            extract($args);

            require_once $path;

            return;
        }
        throw new \InvalidArgumentException("Partial template not found");
    }

    /**
     * @param $path
     * @return string
     */
    private function getTemplatePath($path)
    {
        return sprintf("%s/%s", $this->path, $path);
    }
}