<?php
declare(strict_types=1);

namespace mvc\Models;

class Car
{
    private string $registrationId;
    private string $manufacturer;
    private string $model;
    private int $year;

    /**
     * @param string $registrationId
     */
    public function setRegistrationId(string $registrationId): void
    {
        $this->registrationId = $registrationId;
    }

    /**
     * @param string $manufacturer
     */
    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getRegistrationId(): string
    {
        return $this->registrationId;
    }

    /**
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }
}