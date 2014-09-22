<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <?php

            include "loader.php";
            Core\Stopwatch::start(1);
            
//            $board = Chess\Board::create()->insertPieces();
//            $boardRender = new Chess\BoardRenderer($board);
//            echo $boardRender->render();
//            
//            var_dump($boardRender->board[8]);
            
              $game = \Chess\Game::start();
            
            if(!empty($_GET)){
                $game->onClick(explode("|", $_GET["position"]), 
                        (isset($_GET["newPosition"]) ? explode("|", $_GET["newPosition"]) : null));
                //var_dump($game->selectedPiece);
            }
            $game->show();
            
            Core\Stopwatch::stop(1);
            echo Core\Stopwatch::getTab();
            echo Core\MemoryInformation::panel();
        ?>
    </body>
</html>
