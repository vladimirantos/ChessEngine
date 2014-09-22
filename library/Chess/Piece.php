<?php
namespace Chess;
use Core\Object,  
    Core\Enum,        
    Core\Math;

/**
 * @property PieceColor $color
 * @property PieceType $type
 * @property ChessCell $position
 * @author Vladimír Antoš
 * @version 1.0
 */
abstract class Piece extends Object implements IMoveable{

    /**
     * @var PieceType
     */
    private $type;

    /**
     * @var PieceColor
     */
    private $color;

    /**
     * @var ChessCell 
     */
    private $position;
    
    /**
     * @param PieceType $type
     * @param PieceColor $color
     * @param ChessCell $cell
     */
    public function __construct(PieceType $type, PieceColor $color, ChessCell $cell) {
        $this->type = $type;
        $this->color = $color;
        $this->position = $cell;
    }

    /**
     * @return PieceType
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return PieceColor
     */
    public function getColor() {
        return $this->color;
    }
    
    /**
     * @return ChessCell
     */
    public function getPosition(){
        return $this->position;
    }

    /**
     * @param \Chess\PieceType $type
     * @return \Chess\Piece
     */
    public function setType(PieceType $type) {
        $this->type = $type;
        return $this;
    }

    /**
     * @param \Chess\PieceColor $color
     * @return \Chess\Piece
     */
    public function setColor(PieceColor $color) {
        $this->color = $color;
        return $this;
    }
    
    /**
     * @param \Chess\ChessCell $position
     * @return \Chess\Piece
     */
    public function setPosition(ChessCell $position){
        $this->position = $position;
        return $this;
    }

    /*
     * @return string
     */
    public function toString() {
        return $this->color . ' ' . $this->type.' in '.$this->position;
    }
}