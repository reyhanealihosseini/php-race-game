<?php

namespace App\Services\RaceGameService\Enumerations;

enum Unit: string
{
    case KMH = 'Km/h';
    case KNOTS = 'knots';
    case KTS = 'Kts';

    public static function calculateTime($distance, $speed, Unit $unit): ?float
    {
        if ($unit == self::KMH) {
            return $distance / $speed;
        }
        elseif (in_array($unit, [self::KNOTS, self::KTS])) {
            return ($distance / $speed) * 0.5399;
        }

        return null;
    }
}
