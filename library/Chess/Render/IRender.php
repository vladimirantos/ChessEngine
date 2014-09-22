<?php

namespace Chess\Render;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
interface IRender {

    function setBoard(\Chess\Board $board);
    
    function render(\Chess\PieceColor $player, \Chess\ChessCell $actual = null, 
            \Chess\PossibleMovements $possibleMovemets = null);
    
    static function loadCache();
}
