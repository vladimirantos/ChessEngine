<?php

namespace Chess;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
class Knight extends Piece{
    public function __construct(PieceColor $color, ChessCell $cell) {
        parent::__construct(PieceType::KNIGHT(), $color, $cell);
    }

    public function canMove(ChessCell $cell) {
        
    }

    public function move() {
        
    }

    /**
     * Vrací pole možných tahů.
     */
    public function possibleMovements() {
        var_dump($this->position);
    }

}