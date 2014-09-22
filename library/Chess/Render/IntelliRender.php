<?php

namespace Chess\Render;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
class IntelliRender extends \Core\Object implements IRender{
    
    /**
     * @var \Chess\Board
     */
    private $board;
    
    public function render(\Chess\PieceColor $player, 
            \Chess\ChessCell $actual = null, 
            \Chess\PossibleMovements $possibleMovemets = null) {
        
    }

    public function setBoard(\Chess\Board $board) {
        $this->board = $board;
        return $this;
    }

    public static function loadCache() {
        
    }

}
