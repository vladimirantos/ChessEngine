<?php

/**
 * Velikost herní desky (BOARD_SIZE x BOARD_SIZE)
 */
define("BOARD_SIZE", 8);

/**
 * Cesta k obrázkům figurek
 */
define("IMAGES_PATH", "images/");

/**
 * Zapne nebo vypne cachování objektu board při spouštění hry
 */
define("ENABLE_GAME_CREATED_CACHE", false);

/**
 * Zapne nebo vypne cachování html výstupu vyrenderované hry
 */
define("ENABLE_OUTPUT_GAME_CREATED_CACHE", false);

/**
 * Cesta k serializované herní desce
 */
define("BOARD_OBJECT_CACHE_PATH", "cache/board_object.txt");

/**
 * Cesta k renderované herní desce v html
 */
define("RENDERED_BOARD_CACHE_PATH", "cache/html_board.txt");

define("ENABLE_CLICKING_ON_THE_FREE_CELL", 0xe15);