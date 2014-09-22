<?php

namespace Chess;

use Core,
    Core\Object;

/**
 * Hlavní třída, stará se o spouštění a chod hry.
 * @author Vladimír Antoš
 * @version 1.0
 * @property-read Piece $selectedPiece
 */
class Game extends Object {

    /**
     * @var Board
     */
    private $board;

    /**
     * @var Piece 
     */
    private $selectedPiece;

    /**
     * @var ChessCell
     */
    private $selectedCell;
    
    /**
     * @var PieceColor
     */
    private $playerOnTheMove;
    
    /**
     * @var PossibleMovements
     */
    private $possibleMovements;
    
    /**
     * @var Render\IRender
     */
    private $render;
    
    /**
     * @param \Chess\Board $board
     * @param \Chess\Chess\Render\IRender $render
     */
    public function __construct(Board $board, Chess\Render\IRender $render) {
        $this->board = $board;
        $this->playerOnTheMove = PieceColor::WHITE();
        $this->render = $render;
    }

    /**
     * @return Piece
     */
    public function getSelectedPiece() {
        return $this->selectedPiece;
    }

    /**
     * @param array $position
     * @throws \BoardOutOfRangeException
     * @throws \PieceNotFoundException
     * @return Game
     */
    public function onClick(array $position, array $newPosition = null) {
        $index = Core\Math::transformation($position[0], $position[1]);
        if ($index >= BOARD_SIZE * BOARD_SIZE)
            throw new \BoardOutOfRangeException("Out of range board - " . $position[0] . "|" . $position[1] . " (index " . $index . ")");
        $cell = $this->board[$index];
        if (!$cell->hasPiece())
            throw new \PieceNotFoundException("Piece not found in " . $position[0] . "|" . $position[1] . " (index " . $index . ")");
        $this->selectedPiece = $cell->piece;
        $this->selectedCell = $cell;
        
        $to = $this->board[\Core\Math::transformation($newPosition[0], $newPosition[1])];
        
        $move = new Move($this->selectedPiece, $to, $this->board);
        $this->board = $move->move();
        
//        $possibleMovements = new PossibleMovements($this->selectedPiece, $this->board);
//        $this->possibleMovements = $possibleMovements->movements();
    }

//    public function refresh(ChessCell $active) {
//        $render = new Render\BoardRender($this->board);
//        $render->render($active);
//    }

    /**
     * @return \Chess\Game
     */
    public static function newGame() {
        $board = null;
        if (ENABLE_GAME_CREATED_CACHE)
            $board = Board::loadCache();
        if ($board == null)
            $board = Board::create()->insertPieces();
        if (ENABLE_GAME_CREATED_CACHE)
            $board->saveCache();
        return new Game($board);
    }

    /**
     * @return \Chess\Game
     */
    public function show() {
        if ($this->selectedCell == null) { //první tah
            if (ENABLE_OUTPUT_GAME_CREATED_CACHE)
                $html = $this->render->loadCache();
            if (!ENABLE_OUTPUT_GAME_CREATED_CACHE || $html == null) {
                $this->render->setBoard($this->board)->render($this->playerOnTheMove);
//                $render = new Render\BoardRender($this->board);
//                echo $render->render($this->playerOnTheMove);
            }else
                echo $html;
            return $this;
        }else{
            echo $this->render
                    ->setBoard($this->board)
                    ->render($this->playerOnTheMove, $this->selectedCell, $this->possibleMovements);
        }
    }

    /**
     * @return Game
     */
    public static function start() {
        return self::newGame();
    }
}
