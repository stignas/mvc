<?php
declare(strict_types=1);

namespace mvc\Framework;

use mvc\Container\DiContainer;
use Exception;

class Router
{
    public function __construct(private readonly DiContainer $container)
    {
    }

    /**
     * @throws Exception
     */
    public function process(string $url, string $regId = ''): void
    {
        $controller = $this->container->get('mvc\Controllers\CarController');

        switch ($url) {
            case '/paskaitos/OOP/30p/MVCProject/':
                require __DIR__ . '/../../views/index.html';
                break;
            case '/paskaitos/OOP/30p/MVCProject/list':
                $controller->list();
                break;
            case '/paskaitos/OOP/30p/MVCProject/details':
                $controller->details($regId);
                break;
            default:
                http_response_code(404);
                require __DIR__ . '/../../views/404.html';
                break;
        }
    }
}