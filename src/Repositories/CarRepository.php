<?php
declare(strict_types=1);

namespace mvc\Repositories;

use Exception;
use mvc\Container\DiContainer;
use mvc\Models\Car;

class CarRepository
{
    private const DATA_FILE = __DIR__ . '/../cars.json';

    public function __construct(private readonly DiContainer $container)
    {
    }

    /**
     * @throws Exception
     */
    public function getByRegistrationId(string $registrationId = ''): Car
    {
        /* @var Car $carObj */
        $cars = $this->getData();

        foreach ($cars as $car) {
            if ($car['registrationId'] === $registrationId) {
                $carObj = $this->container->get('mvc\Models\Car');
                $carObj->setRegistrationId($car['registrationId']);
                $carObj->setManufacturer($car['manufacturer']);
                $carObj->setModel($car['model']);
                $carObj->setYear($car['year']);
            }
        }
        if (!empty($carObj)) {
            return $carObj;
        } else {
            throw new Exception("Registration Id does not exist");
        }
    }

    /**
     * @throws Exception
     */
    public function getAll(): array
    {
        /* @var Car $carObj */
        $dataArray = $this->getData();
        $carsArray = [];
        foreach ($dataArray as $car) {
            $carObj = $this->container->get('mvc\Models\Car');
            $carObj->setRegistrationId($car['registrationId']);
            $carObj->setManufacturer($car['manufacturer']);
            $carObj->setModel($car['model']);
            $carObj->setYear($car['year']);
            $carsArray[] = $carObj;
        }
        return $carsArray;
    }

    public function getData(): array
    {
        return json_decode(file_get_contents(self::DATA_FILE), true);
    }
}