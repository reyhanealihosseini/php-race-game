<?php

namespace App\Services\RaceGameService\src\Vehicle;

class Vehicle {

    public function __construct(private readonly string $name, private readonly int $maxSpeed, private readonly string $unit)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }
}
