<?php
declare(strict_types=1);

namespace mvc\Framework;

use mvc\Container\DiContainer;
use Exception;
use mvc\Controllers\CarController;
use mvc\Controllers\PageController;


class Router
{
    public function __construct(private readonly DiContainer $container)
    {
    }

    /**
     * @throws Exception
     */
    public function process(string $route, string $regId = ''): void
    {
        /* @var CarController $CarController
         * @var PageController $PageController
         */
        $CarController = $this->container->get('mvc\Controllers\CarController');
        $PageController = $this->container->get('mvc\Controllers\PageController');

        switch ($route) {
            case '/':
                $PageController->index();
                break;
            case '/car/list':
                $CarController->list();
                break;
            case '/car/details':
                $CarController->details($regId);
                break;
            default:
                http_response_code(404);
                $PageController->error();
                break;
        }
    }
}