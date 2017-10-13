<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

require __DIR__  . '/../system/boot.php';

define('CMS_NAME', 'StCMS');
define('CMS_VERSION', 1);
define('WEB_PATH', __DIR__ );
define('SYSTEM_PATH', __DIR__ . '/../system');
define('CMS_PATH', __DIR__ . '../cms');
define('MODULE_PATH', __DIR__ . '../modules');
define('ROOT_PATH', __DIR__ . '../');
define('ALLOW_THIRD_PARTY_MODULES', false);

$app = new \Cms\Core\ApplicationHandler();
$app->handleIncomingRequest()
    ->registerContainer()
    ->runApplication();