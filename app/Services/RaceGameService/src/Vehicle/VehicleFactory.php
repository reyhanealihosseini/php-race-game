<?php

namespace App\Services\RaceGameService\src\Vehicle;

class VehicleFactory
{
    public static function createVehicle(array $data): Vehicle
    {
        return new Vehicle($data['name'], $data['maxSpeed'], $data['unit']);
    }

    public static function createManyVehicle(array $vehicles): array
    {
        $created = [];

        foreach ($vehicles as $vehicle) {
            $created[] = self::createVehicle((array) $vehicle);
        }

        return $created;
    }
}
