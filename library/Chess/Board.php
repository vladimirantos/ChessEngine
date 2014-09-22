<?php

namespace Chess;

use Core, 
    Core\Object, \Chess;

/**
 * Herní deska. Obsahuje kolekci hracích polí.
 * @author Vladimír Antoš
 * @version 1.0
 */
class Board extends Object implements \ArrayAccess, Render\ICacheStorage, Core\ICountable{

    /**
     * @var ChessCell[,]
     */
    private $cells;

    public function __construct() {
        $this->cells = array();
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset) {
        return array_key_exists($offset, $this->cells);
    }

    /**
     * @param mixed $offset
     * @return ChessCell
     */
    public function offsetGet($offset) {
        return $this->offsetExists($offset) ? $this->cells[$offset] : NULL;
    }

    /**
     * @param mixed $offset
     * @param ChessCell $value
     * @throws \InvalidArgumentException
     */
    public function offsetSet($offset, $value) {
        if ($value instanceof ChessCell)
            $this->cells[] = $value;
        else
            throw new \InvalidArgumentException("This value is not instance of ChessCell");
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset) {
        if ($this->offsetExists($offset))
            unset($this->cells[$offset]);
    }
    
    /**
     * @return \Chess\Board
     */
    public function cloneObject() {
        return new $this;
    }
    
    public function insertPieces(){
        $pieces = array(PieceType::ROOK(), PieceType::KNIGHT(), PieceType::BISHOP(),
        PieceType::KING(), PieceType::QUEEN(), PieceType::BISHOP(), PieceType::KNIGHT(), PieceType::ROOK());
        
        $max = BOARD_SIZE * BOARD_SIZE;
        $lastLine = $max - BOARD_SIZE;
        $lastLine2 = $max - BOARD_SIZE * 2; //předposlední
        for($i = 0; $i < BOARD_SIZE; $i++){
            $piece = '\Chess\\'.ucfirst($pieces[$i]->toString());
            //BLACK
            $reflect  = new \ReflectionClass($piece);           
            $instance = $reflect->newInstanceArgs(array(PieceColor::WHITE(), $this[$i]));
            $this[$i]->piece = $instance;
            //BLACK PAWN
            $pawn = new Pawn(PieceColor::WHITE(), $this[$i + BOARD_SIZE]);
            $this[$i + BOARD_SIZE]->piece = $pawn;
            
            //WHITE
            $reflect  = new \ReflectionClass($piece);           
            $instance = $reflect->newInstanceArgs(array(PieceColor::BLACK(), $this[$lastLine + $i]));
            $this[$lastLine + $i]->piece = $instance;
            //WHITE PAWN
            $pawn = new Pawn(PieceColor::BLACK(), $this[$lastLine2 + $i]);
            $this[$lastLine2 + $i]->piece = $pawn;
        }
        return $this;
    }
    
    /**
     * @return Board
     */
    public static function create(){
        $board = new Board();
        for($i = 0; $i < BOARD_SIZE; $i++){
            for($j = 0; $j < BOARD_SIZE; $j++){
                if((\Core\Math::isOddNumber($i) && \Core\Math::isOddNumber($j))||
                        (!\Core\Math::isOddNumber ($i) && !\Core\Math::isOddNumber ($j))){
                            $color = PieceColor::BLACK();
                        }
                else 
                    $color = PieceColor::WHITE();
                $board[] = new ChessCell($i, $j, $color);
            }
        }
        return $board;
    }

    /**
     * @return Board | null
     */
    public static function loadCache() {
        if(file_exists(BOARD_OBJECT_CACHE_PATH))
            return unserialize(file_get_contents (BOARD_OBJECT_CACHE_PATH));
        else return null;
    }
    
    public function saveCache() {
        file_put_contents(BOARD_OBJECT_CACHE_PATH, $this->serialize());
    }

    /**
     * @return int
     */
    public function count() {
        return count($this->cells);
    }

}
