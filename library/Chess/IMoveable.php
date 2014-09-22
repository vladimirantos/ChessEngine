<?php

namespace Chess;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
interface IMoveable{
    
    /**
     * @param \Chess\ChessCell $cell
     * @return bool
     */
    function canMove(ChessCell $cell);
    
    function move();
}
