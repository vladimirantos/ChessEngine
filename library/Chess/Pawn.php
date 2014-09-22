<?php

namespace Chess;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
class Pawn extends Piece{
    
    private $step = 1;
    
    public function __construct(PieceColor $color, ChessCell $cell) {
        parent::__construct(PieceType::PAWN(), $color, $cell);
    }

    public function canMove(ChessCell $cell) {
        
    }

    public function move() {
        
    }

    public function possibleMovements() {
        
    }

}