<?php

namespace App\Services\RaceGameService\src\Vehicle;

use Vehicle;

class VehicleFactory
{
    public static function createFromJsonData(array $data): Vehicle
    {
        return new Vehicle($data['name'], $data['maxSpeed'], $data['unit']); }
    }
