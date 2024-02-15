<?php

namespace App\Services\RaceGameService\src\Race;


use App\Services\RaceGameService\Enumerations\Unit;
use App\Services\RaceGameService\src\Player\PlayerFactory;

class Race
{
    private array $players;

    public function __construct(private readonly int $distance)
    {
    }

    public function run(): void
    {
        echo "The race is about to begin!\n";
        echo "The race is {$this->distance} km long.\n";
        echo "Ready, set, go!\n";

        $items = [];
        $winner_time = 10000000;
        $winner = null;

        foreach ($this->players as $player) {
            $name = $player->getName();
            $vehicle = $player->getVehicle();

            $time = Unit::calculateTime($this->distance, $vehicle->getSpeed(), Unit::from($vehicle->getUnit()));
            $items[$player->getName()] = $time;

            if ($winner_time > $time) {
                $winner_time = $time;
                $winner = $name;
            }

            echo "$name finished the race in $time hours.\n";
        }

        echo "winner name is $winner and winner speed is $winner_time";

        echo "Thank you for playing the racing game!\n";
    }

    public function setPlayers($player): void
    {
        $this->players[] = $player;
    }

    public function getPlayersFromInput(int $count, array $vehicles): void
    {
        for ($i = 1; $i <= $count; $i++) {
            $choice = \cli\menu($vehicles, false, "Please select a vehicle for player $i");
            echo "You have selected {$vehicles[$choice]->getName()} for player $i.\n";

            $this->setPlayers(PlayerFactory::createPlayer("Player $i", $vehicles[$choice]));
        }
    }
}
