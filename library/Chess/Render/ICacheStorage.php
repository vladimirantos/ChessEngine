<?php

namespace Chess\Render;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
interface ICacheStorage {

    function saveCache();

    static function loadCache();
}