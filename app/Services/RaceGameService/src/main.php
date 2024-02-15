<?php

use App\Services\RaceGameService\src\Player\PlayerFactory;
use App\Services\RaceGameService\src\Vehicle\VehicleFactory;
use cli\Arguments;

require_once 'vendor/autoload.php';

$vehiclesJson = json_decode(file_get_contents('vehicles.json'), true);

$vehicles = VehicleFactory::createManyVehicle($vehiclesJson);

$arguments = new Arguments();
$arguments->addFlag(array('help', 'h'), 'Show this help screen');
$arguments->addOption(array('distance', 'd'), array(
    'default' => 100,
    'description' => 'The distance of the race in km',
    'cast' => 'int'
));
$arguments->parse();

if ($arguments['help']) {
    echo $arguments->getHelpScreen();
    echo "\n\n";
    exit;
}

$distance = $arguments['distance'];
$count = \cli\menu([2, 3, 4, 5, 6, 7, 8, 9, 10], false, "Please select players count");

$game = new \App\Services\RaceGameService\src\Race\Race($distance);
$game->getPlayersFromInput($count, $vehicles);

$game->run();
