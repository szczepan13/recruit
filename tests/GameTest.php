<?php

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase{

    public function setUp(){

        echo 'test';
    }


    public function testInitialize(){
        
        $game = Game::initialize();
        $this->assertInstanceOf('Game', $game);
        $fieldList = [];
        for($i = 0;$i<Game::MAP_WIDTH;$i++){
            for($j = 0;$j<Game::MAP_HEIGHT;$j++){

                $field = $game->getField($i, $j);
                $fieldLisT[] = $field;
                $this->assertInstanceOf('Field', $field);
                $this->assertEquals($field->isClosed(), true);

            }
        }
        $this->assertThat($fieldList, $this->asserT);
    }

}