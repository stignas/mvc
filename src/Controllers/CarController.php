<?php
declare(strict_types=1);

namespace mvc\Controllers;

use Exception;
use mvc\Container\DiContainer;

class CarController
{
    public function __construct(private readonly DiContainer $container)
    {
    }

    /**
     * @throws Exception
     */
    public function list(): void
    {
        $cars = $this->container->get("mvc\Repositories\CarRepository")->getAll();
        require(__DIR__ . '/../../views/list.phtml');
    }

    /**
     * @throws Exception
     */
    public function details(string $registrationId): void
    {
        $car = $this->container->get("mvc\Repositories\CarRepository")->getByRegistrationId($registrationId);
        require(__DIR__ . '/../../views/details.phtml');
    }
}