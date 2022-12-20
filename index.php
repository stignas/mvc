<?php
declare(strict_types=1);
require_once './vendor/autoload.php';

use mvc\Container\DiContainer;

$url = $_SERVER["REQUEST_URI"];
$container = new DiContainer();

try {
    $router = $container->get('mvc\FrameWork\Router');
    $router->process($url, 'ABC123');
} catch (Exception $e) {
    echo $e->getMessage();
}

