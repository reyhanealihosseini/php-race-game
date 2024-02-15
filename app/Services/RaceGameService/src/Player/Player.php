<?php

namespace App\Services\RaceGameService\src\Player;

use App\Services\RaceGameService\src\Vehicle\Vehicle;

class Player
{

    public function __construct(private readonly string $name, private readonly Vehicle $selectedVehicle)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVehicle(): Vehicle
    {
        return $this->selectedVehicle;
    }
}
