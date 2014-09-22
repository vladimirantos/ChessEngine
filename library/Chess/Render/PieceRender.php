<?php

namespace Chess\Render;
use Chess;
/**
 * Vykreslení obrázku figurky
 * @author Vladimír Antoš
 * @version 1.0
 */
class PieceRender {
    
    /*
     * @param \Chess\PieceType $type
     * @param \Chess\PieceColor $color
     * @return string
     */

    public static function render(Chess\PieceType $type, Chess\PieceColor $color) {
        return '<img src="' . IMAGES_PATH . $color . "_" . $type . '.ico" width="70" height="70">';
    }

    /**
     * Renderuje klikací figurku.
     * @param Chess\ChessCell $cell
     * @param Chess\PieceType $type
     * @param \Chess\PieceColor $color
     * @return string
     */
    public static function renderClickablePiece(Chess\ChessCell $cell, Chess\PieceType $type, \Chess\PieceColor $color){
        return '<a href="?position=' .
                $cell->piece->position . '">'.self::render($type, $color).'</a>';
    }
    
    public static function renderClickableEmptyCell(\Chess\ChessCell $old, \Chess\ChessCell $cell){
        return '<a href="?position='.$old->toString().'&newPosition='.$cell->toString().'" class="click"></a>';
    }
}
