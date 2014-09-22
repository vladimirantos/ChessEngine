<?php

namespace Chess;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
class Queen extends Piece{
    public function __construct(PieceColor $color, ChessCell $cell) {
        parent::__construct(PieceType::QUEEN(), $color, $cell);
    }

    public function canMove(ChessCell $cell) {
        
    }

    public function move() {
        
    }

    public function possibleMovements() {
        
    }

}