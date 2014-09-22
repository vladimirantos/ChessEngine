<?php

namespace Chess;
use Core\Object;

/**
 * Třída zpracovává tah figurkou. Stará se o validaci tahu i o samotné provedení.
 * @author Vladimír Antoš
 * @version 1.0
 */
class Move extends Object{
    
    /**
     * @var ChessCell
     */
    private $from;
    
    /**
     * @var ChessCell
     */
    private $to;
    
    /**
     * @var Piece
     */
    private $movedPiece;
    
    /**
     * @var Piece
     */
    private $capturedPiece = null;
    
    /**
     * @var Board
     */
    private $board;
    
    /**
     * @param \Chess\Piece $from
     * @param \Chess\ChessCell $to
     */
    function __construct(Piece $from, ChessCell $to, Board $board) {
        $this->from = $from->position;
        $this->to = $to;
        $this->movedPiece = $from;
        $this->board = $board;
    }

    /**
     * @return ChessCell
     */
    public function getFrom() {
        return $this->from;
    }
    
    /**
     * @return ChessCell
     */
    public function getTo() {
        return $this->to;
    }

    /**
     * @return Piece
     */
    public function getMovedPiece() {
        return $this->movedPiece;
    }
    
    /**
     * @return Piece
     */
    public function getCapturedPieces(){
        return $this->capturedPiece;
    }

    /**
     * @param \Chess\ChessCell $from
     * @return \Chess\Move
     */
    public function setFrom(ChessCell $from) {
        $this->from = $from;
        return $this;
    }

    /**
     * @param \Chess\ChessCell $to
     * @return \Chess\Move
     */
    public function setTo(ChessCell $to) {
        $this->to = $to;
        return $this;
    }

    /**
     * @param \Chess\Piece $piece
     * @return \Chess\Move
     */
    public function setMovedPiece(Piece $piece) {
        $this->movedPiece = $piece;
        return $this;
    }
    
    public function move(){
        if($this->isPossibleMove()){
            $oldPosition = \Core\Math::transformation($this->from->x, $this->from->y);
            $newPosition = \Core\Math::transformation($this->to->x, $this->to->y);
            $this->board[$oldPosition]->removePiece();
            $this->to->piece = $this->movedPiece;
            $this->board[$newPosition] = $this->to;
            
        }else echo "Tah nelze provést";
        return $this->board;
    }
    
    private  function isPossibleMove(){
        if($this->movedPiece->canMove($this->to)){
            return true;
        }else return false;
    }
}
