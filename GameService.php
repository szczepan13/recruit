<?php

class GameService
{
    public function create()
    {
        $game = Game::initialize();
        $gameRepo = (new GameRepository($game))->start();
        return $gameRepo;
    }

}