<?php

namespace Chess;
use Core;
/**
 * Třída vypočítává povolené tahy pro každou figurku.
 * @author Vladimír Antoš
 * @version 1.0
 */
class PossibleMovements extends Core\Object implements IPossibleMovements, \ArrayAccess, Core\ICountable{
    
    /**
     * @var Piece
     */
    private $piece;
    
    /**
     * @var Board
     */
    private $board;
    
    /**
     * @var ChessCell[]
     */
    private $movements;
    
    /**
     * @param \Chess\Piece $piece
     * @param \Chess\Board $board
     */
    public function __construct(Piece $piece, Board $board) {
        $this->piece = $piece;
        $this->board = $board;
        $this->movements = array();
    }
    
    /**
     * Generuje přípustné tahy
     * @return \Chess\PossibleMovements
     */
    public function movements(){
        for($i = 0; $i < BOARD_SIZE; $i++){
            for($j = 0; $j < BOARD_SIZE; $j++){
                if($this->piece->position->x == $i && $this->piece->position->y == $j) //stejný čtvereček                
                    continue;
                $cell = $this->board[Core\Math::transformation($i, $j)]; // TODO: vzít chessCell z boardu
                if($this->piece->canMove($cell))
                    $this->movements[] = $cell;
            }
        }
        return $this;
    }

    /**
     * @param int $offset
     * @return bool
     */
    public function offsetExists($offset) {
        return array_key_exists($offset, $this->movements);
    }

    /**
     * @param int $offset
     * @return ChessCell
     */
    public function offsetGet($offset) {
        return $this->offsetExists($offset) ? $this->movements[$offset] : NULL;
    }

    /**
     * @param int $offset
     * @param \Chess\ChessCell $value
     * @throws \InvalidArgumentException
     */
    public function offsetSet($offset, $value) {
         if ($value instanceof ChessCell)
            $this->movements[] = $value;
        else
            throw new \InvalidArgumentException("This value is not instance of ChessCell");
    }

    /**
     * @param int $offset
     */
    public function offsetUnset($offset) {
        if ($this->offsetExists($offset))
            unset($this->movements[$offset]);
    }

    /**
     * @return int
     */
    public function count() {
        return count($this->movements);
    }

    private function removeCellsForBarrier(){
        for($i = 0; $i < $this->count(); $i++){
            if($this[$i]->hasPiece()){
                $barrier = $this[$i];
                if($barrier->x > $this->piece->x) null;
            }
        }
    }
}
