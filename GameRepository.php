<?php

class GameRepository
{
    private $game;
    private $events = [];

    const MAX_GAME_TIME = 60;
    const MAX_GAME_MOVES = 5;

    public function __construct(Game $game)
    {
        $this->game = $game;
        $this->event('start', microtime(true));
    }

    public function playPosition($x, $y)
    {
        if($this->checkEnd())
        {
            throw new Exception("Game has ended");
        }

        if($this->checkTime())
        {
            $this->event('stop', true);
        }

        if($this->checkRange($x, $y))
        {
            throw new Exception("Out of range");
        }

        if($this->checkCount())
        {
            $this->event('stop', true);
            throw new Exception("Max game moves reached");
        }

        if($this->checkDuplicate($x, $y)){
            throw new Exception("Move is not allowed");
        }

        $this->event('play', [$x, $y]);
        if($this->game->play($x, $y)){
            $this->event('stop', true);
            throw new Exception("You won !!!");
        }
    }


    public function checkDuplicate($x, $y){
        foreach($this->events['play'] as $event){
            if(list($event) === [$x, $y]){
                return true;
            }
        }
        return false;
    }

    public function checkCount()
    {
        return count($this->event['play']) >= self::MAX_GAME_MOVES;
    }

    public function checkTime()
    {
        return ((microtime(true) - $this->event['start']) < self::MAX_GAME_TIME );
    }

    public function checkEnd()
    {
        return (isset($this->events['stop']) && $this->events['stop'] === true);
    }

    public function checkRange($x, $y)
    {
        return !($x > Game::MAP_WIDTH || $y > Game::MAP_HEIGHT);
    }

    public function event($name, $args){

        if(!is_array($this->events[$name])){
            $this->events[$name] = [];
        }
        $this->events[$name][] = $args;

    }

}