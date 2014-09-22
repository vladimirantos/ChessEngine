<?php

namespace Chess\Render;

use Core;
use Core\Object;
use Chess;

/**
 * Třída se stará o vykreslení hrací plochy a všech figurek.
 * @author Vladimír Antoš
 * @version 1.0
 */
class BoardRender extends Object implements IRender {

    /**
     * @var Board
     */
    private $board;
    private $string;

    /**
     * @param \Chess\Board $board
     */
    public function __construct(Chess\Board $board) {
        $this->board = $board;
    }

    /**
     * @return Board
     */
    public function getBoard() {
        return $this->board;
    }

    /**
     * @param Chess\PieceColor $player
     * @param Chess\ChessCell $actual
     * @param Chess\PossibleMovements $possibleMovemets
     * @return string
     */
    public function render(Chess\PieceColor $player, Chess\ChessCell $actual = null, 
                Chess\PossibleMovements $possibleMovemets = null) {
        $string = new Core\StringBuilder;
        $string->append('<table class="board" cellpadding="0" cellspacing="0">');
        for ($i = 0; $i < BOARD_SIZE; $i++) {
            $string->append("<tr>");
            for ($j = 0; $j < BOARD_SIZE; $j++) {
                $cell = $this->board[$j + $i * BOARD_SIZE];
                $cellWithPiece = $this->board[$j + $i * BOARD_SIZE];

                $string->append('<td class="' . $cell->color . ' ' .
                        ($actual instanceof Chess\ChessCell && $cell->equals($actual) ? "active" : 
                        /**$cell->equals($possibleMovemets[$j]) ? "possible" :*/ null) . '">' .
                        ($cellWithPiece->hasPiece() ?
                                ($cellWithPiece->piece->color->equals($player) ?
                                        PieceRender::renderClickablePiece($cellWithPiece, 
                                                $cellWithPiece->piece->type, 
                                                $cellWithPiece->piece->color) :
                            
                                        PieceRender::render($cellWithPiece->piece->type, 
                                                $cellWithPiece->piece->color)
                                ) 
                        : ($actual != null  ? 
                                PieceRender::renderClickableEmptyCell($actual, $cell) : null)) . /* $cell->toString().*/
                        '</td>');
            }
            $string->append("</tr>");
        }
        $string->append('</table>');
        $this->string = $string->toString();
        if (ENABLE_OUTPUT_GAME_CREATED_CACHE)
            $this->saveCache();
        return $this->string;
    }

//    public function render(){
//        $string = new \StringBuilder();
//        $string->append('<table class="board">');
//        for($i = 0; $i < BOARD_SIZE; $i++){
//            $string->append("<tr>");
//          for($j = 0; $j < BOARD_SIZE; $j++){
//             
//                $string->append('<td class="'.$this->board[$i + $j*BOARD_SIZE]->color.'">'.
//                        ($this->board[$j+ $i*BOARD_SIZE]->hasPiece()?
//                        
//                        $this->renderLinkOpenTag($this->board[$j+ $i*BOARD_SIZE]).
//                        PieceRenderer::render($this->board[$j+ $i*BOARD_SIZE]->piece->type, 
//                                $this->board[$j+ $i*BOARD_SIZE]->piece->color)
//                        ./*$this->board[$j+ $i*BOARD_SIZE]->piece->position.*/
//                        '</a>'
//                        : null).
//                        '</td>');
//          }
//          $string->append("</tr>");
//        }
//        $string->append('</table>');
//        $this->string = $string->toString();
//        if(ENABLE_OUTPUT_GAME_CREATED_CACHE)
//            $this->saveCache();
//        return $this->string;
//    }

    public static function loadCache() {
        if (file_exists(RENDERED_BOARD_CACHE_PATH))
            return file_get_contents(RENDERED_BOARD_CACHE_PATH);
        else
            return null;
    }

    private function renderLinkOpenTag(Chess\ChessCell $c) {
        return '<a href="?position=' .
                $c->piece->position . '">';
    }

    private function saveCache() {
        file_put_contents(RENDERED_BOARD_CACHE_PATH, $this->string);
    }

}
