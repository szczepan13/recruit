<?php

require 'vendor/autoload.php';


$game = (new GameService())->create();
$game->playPosition(3,4);
$game->playPosition(4,4);
$game->playPosition(5,4);
$game->playPosition(2,4);
$game->playPosition(1,4);