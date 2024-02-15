<?php

namespace App\Services\RaceGameService\src\Player;

use App\Services\RaceGameService\src\Vehicle\Vehicle;

class PlayerFactory
{
    public static function createPlayer(string $name, Vehicle $selectedVehicle): Player
    {
        return new Player($name, $selectedVehicle);
    }
}
