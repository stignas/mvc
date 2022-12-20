<?php
declare(strict_types=1);

namespace mvc\Repositories;

use Exception;
use mvc\Container\DiContainer;

class CarRepository
{
    private const DATA_FILE = __DIR__ . '/../cars.json';

    public function __construct(private readonly DiContainer $container)
    {
    }

    /**
     * @throws Exception
     */
    public function getByRegistrationId(string $registrationId): object
    {
        $cars = json_decode(file_get_contents(self::DATA_FILE), true);
        $carObj = $this->container->get('mvc\Models\Car');

        foreach ($cars as $car) {
            if ($car['registrationId'] === $registrationId) {
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
        $dataArray = json_decode(file_get_contents(self::DATA_FILE), true);
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
}