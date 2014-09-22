<?php
namespace Chess;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
class Rook extends Piece{
    
    /**
     * @param \Chess\PieceColor $color
     * @param \Chess\ChessCell $cell
     */
    public function __construct(PieceColor $color, ChessCell $cell) {
        parent::__construct(PieceType::ROOK(), $color, $cell);
    }

    public function canMove(ChessCell $cell) {
        $my_x = $this->position->x;
        $my_y = $this->position->y;
        $move_x = $cell->x;
        $move_y = $cell->y;
        return ($my_x == $move_x || $my_y == $move_y);
    }

    public function move() {
        
    }

    public function possibleMovements() {
        
    }

}
