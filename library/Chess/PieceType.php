<?php

namespace Chess;
use Core\Enum;

/**
 * Výčtový typ. Určuje typy figurek.
 * @author Vladimír Antoš
 * @version 1.0
 */
class PieceType extends Enum {
    const PAWN = "pawn";
    const ROOK = "rook";
    const BISHOP = "bishop";
    const KNIGHT = "knight";
    const KING = "king";
    const QUEEN = "queen";
}
