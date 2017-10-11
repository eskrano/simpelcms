<?php

namespace Cms\Core;

use Cms\Core\Annotation\DependencyResolver;
use Cms\Core\Container;

class ApplicationHandler
{

    private $requestStack;

    private $isApplicationRunned = false;

    public function handleIncomingRequest()
    {
        if (null !== $this->requestStack) {
            throw new \OverflowException("Request already dispatched");
        }

        $this->requestStack = [
            'post' => $_POST,
            'get' => $_GET,
            'files' => $_FILES,
            'session' => $_SESSION,
            'server' => $_SERVER,
            'cookie' => $_COOKIE,
        ];

        return $this;
    }

    public function registerContainer()
    {
        $app = $this;

        Container::getInstance()
            ->singleton('request', function ($container) use ($app) {
                return new Request($app->requestStack);
            })
            ->singleton('annotation_resolver', function ($container) use ($app) {
                return new DependencyResolver;
            });

        return $this;
    }

    public function runApplication()
    {
        if ($this->isApplicationRunned) {
            throw new \Exception("Application already runned");
        }

        $routing = new Routing(isset($this->requestStack['get']['r']) ? $this->requestStack['get']['r'] : 'home/index');
        [$module, $action] = $routing->getAction();

        $moduleHandler = new ModuleHandler(MODULE_PATH);
        $config = $moduleHandler->handle($module);

        if (! class_exists($config['controller'])) {
            throw new \InvalidArgumentException("Module controller not found");
        }

        $controller = new $config['controller'];
        $mapping = $controller->mapping()['action'];

        if (! isset($mapping[$action])) {
            throw new \Exception("Mapping wrong");
        }

        $map = $mapping[$action];

        if (is_string($map)) {

            $rf = new \ReflectionMethod($controller, $map);
            $doc = $rf->getDocComment();

            $annotations = [];
            preg_match_all('/@(\w+)\(\s*([^\(]*?)\s*\)/', $doc, $annotations);

            exit(var_dump($annotations));


            $controller->$map();
        } elseif(is_array($map)) {
            $cntrl = $map['controller'] ?: false;
            $action = $map['action'] ?: false;

            if (! $cntrl || $action) {
                throw new \InvalidArgumentException("Invalid array mapping");
            }

            (new $cntrl)->$action();
        }
        return;
    }

    public function getModule($moduleName)
    {

    }
}