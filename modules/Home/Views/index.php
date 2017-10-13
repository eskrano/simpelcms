<?php
/**
 * @var $this \Cms\Core\Template\PhpEngine
 */

$this->renderPartial('partials/head.php', [
    'time' => new DateTime()
]);


echo 'Hello '. $name;