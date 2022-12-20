<?php
declare(strict_types=1);

namespace mvc\Models;

class Car
{
    private string $registrationId;
    private string $manufacturer;
    private string $model;
    private int $year;

    // Setters

    public function setRegistrationId(string $registrationId): void
    {
        $this->registrationId = $registrationId;
    }

    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

     public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    // Getters
    public function getRegistrationId(): string
    {
        return $this->registrationId;
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getYear(): int
    {
        return $this->year;
    }
}