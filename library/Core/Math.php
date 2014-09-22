<?php

namespace Core;

/**
 * Obsahuje pomocné matematické funkce.
 * @author Vladimír Antoš
 * @version 1.0
 */
final class Math extends Object {

    /**
     * Rozhodne jestli je zadané číslo liché.
     * @param int $number
     * @return bool
     */
    public static function isOddNumber($number) {
        return $number % 2;
    }

   
    /**
     * Transformuje souřadnice matice.
     * @param int $x
     * @param int $y
     * @return int
     */
    public static function transformation($x, $y) {
        return ($x * BOARD_SIZE) + $y;
    }

}
