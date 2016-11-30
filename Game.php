<?php

class Game
{
    private $map;

    const MAP_WIDTH = 5;
    const MAP_HEIGHT = 4;

    public static function initialize()
    {
        return new static();
    }

    private function __construct()
    {
        for($i = 0; $i < self::MAP_WIDTH; $i++){
            for($j = 0; $j < self::MAP_HEIGHT; $j++){
                $this->map[$i][$j] = new Field(Field::CLOSED);
            }
        }
        $this->chooseRandomWinningTile();
    }

    public function getField($x, $y)
    {
        return $this->map[$x][$y];
    }

    public function play($x, $y)
    {
        $field = $this->getField($x, $y);
        if($field->isWin()){
            return true;
        }
        $this->map[$x][$y] = new Field(Field::OPEN);
        return false;
    }

    private function chooseRandomWinningTile()
    {
        $randX = random_int(0, self::MAP_WIDTH-1);
        $randY = random_int(0, self::MAP_HEIGHT-1);
        $this->map[$randX][$randY] = new Field(Field::CLOSED, true);
    }
}