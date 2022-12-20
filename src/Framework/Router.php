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
        $CarController = $this->container->get('mvc\Controllers\CarController');
        $PageController = $this->container->get('mvc\Controllers\PageController');
        switch ($url) {
            case '/paskaitos/OOP/30p/MVCProject/':
                $PageController->index();
                break;
            case '/paskaitos/OOP/30p/MVCProject/list':
                $CarController->list();
                break;
            case '/paskaitos/OOP/30p/MVCProject/details':
                $CarController->details($regId);
                break;
            default:
                http_response_code(404);
                $PageController->error();
                break;
        }
    }
}