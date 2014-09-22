<?php
namespace Chess;

use Core\Object;

/**
 * Reprezentuje souřadnice na hrací ploše.
 * 
 * @property int $x
 * @property int $y
 * @property PieceColor $color
 * @property Piece $piece
 */
class ChessCell extends Object {

    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * @var PieceColor
     */
    private $color;
    
    /**
     * @var Piece
     */
    private $piece = null;
    
    /**
     * @param int $x
     * @param int $y
     */
    public function __construct($x, $y, PieceColor $color) {
        $this->setX($x)->setY($y);
        $this->color = $color;
    }

    /**
     * @return int
     */
    public function getX() {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY() {
        return $this->y;
    }
    
    /**
     * @return PieceColor
     */
    public function getColor(){
        return $this->color;
    }
    
    /**
     * @return Piece
     */
    public function getPiece(){
        return $this->piece;
    }

    /**
     * @param int $x
     * @return \Chess\ChessCell
     * @throws \InvalidArgumentException
     */
    public function setX($x) {
        if (!is_int($x))
            throw new \InvalidArgumentException("Invalid X position (not a number)");
        $this->x = $x;
        return $this;
    }

    /**
     * @param int $y
     * @return \Chess\ChessCell
     * @throws \InvalidArgumentException
     */
    public function setY($y) {
        if (!is_int($y))
            throw new \InvalidArgumentException("Invalid Y position (not a number)");
        $this->y = $y;
        return $this;
    }

    /**
     * @param \Chess\PieceColor $color
     * @return \Chess\ChessCell
     */
    public function setColor(PieceColor $color){
        $this->color = $color;
        return $this;
    }
    
    /**
     * @param \Chess\Piece $piece
     * @return \Chess\ChessCell
     */
    public function setPiece(Piece $piece){
        $this->piece = $piece;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function hasPiece(){
        return $this->piece != null;
    }
    
    /**
     * @return string
     */
    public function toString() {
        return $this->x.'|'.$this->y;
    }
    
    /**
     * @param \Chess\ChessCell $cell
     * @return bool
     */
    public function equals(ChessCell $cell) {  
        return ($this->x == $cell->y && $this->y == $cell->x);
    }

    public function removePiece(){
        $this->piece = null;
        return $this;
    }
    
    public function compare(ChessCell $cell) {
        throw new \Core\Exceptions\NotImplementationException;
    }
}