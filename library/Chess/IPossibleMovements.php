<?php

namespace Chess;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
interface IPossibleMovements {
    function __construct(Piece $piece, Board $board);
    function movements();
}
