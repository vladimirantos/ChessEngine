<?php

namespace Chess;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
class King extends Piece{
    public function __construct(PieceColor $color, ChessCell $cell) {
        parent::__construct(PieceType::KING(), $color, $cell);
    }

    public function canMove(ChessCell $cell) {
        
    }

    public function move() {
        
    }

    public function possibleMovements() {
        
    }

}