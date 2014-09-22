<?php

namespace Core;

/**
 * Třída získává informace o velikosti paměti, kterou potřebuje běžící php skript.
 * @author Vladimír Antoš
 * @version 1.0
 */
class MemoryInformation extends Object{
    
    /**
     * Return bytes
     * @return int
     */
    public static function getMemory(){
        return memory_get_usage ();
    }
    
    /**
     * Return bytes
     * @return int
     */
    public static function getRealMemory(){
        return memory_get_usage(true);
    }
    
    /**
     * @return string
     */
    public static function panel(){
        return ' <img alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAM/SURBVDhPdZP5TxtXEMf3r2quEmOMvax3vZf39HrX65PFGIy5DLZjUhQlPzUJShBJMKYGh2DsmByoVFV+qdo/IpHyQ8+kai5EFUUkSNPZnOoPjDSa91b7mTfzfW+IT6aI5KzE+yuSSK0oYsCL+64kkqYiUm1J8GsyTy3KQqAo86Sj8NRFiSPNj+gHE0PeWYY8VeEZby0Y+MqLscsEPaYY8rVZ+mtNDPUvCqG+YpjpcyQucFFiA8Z7UBUHymHOfy4eU/8cTFtPM6noi3Qy+jhh63sJW/vNNpW9mCn/akXCz01dfBLV+D80mX6mSfRDiQ9U3dKnafLkhTPlafjl55/gh90d2P3+Puzc24b797pwp7uF3oLb7Q3otJrQbq3j+ibEo9IbkfVVMMHAPOU/eencfPmdC89VKzD/TRVjCSqYtDQzAcWpPEwWhqEw6sBQJgbtzTWM0X2O6TtPKAKZIn3Hp+bnSm+3u22YnBiD4vQ4TI6PQiGfhdFcBoadBDjpGKQTBkR1ARr1JXBSxisu2JslZJG8FaJ67p6tzhze7rRgvDACU5N5GB/LQX7EgVw2BUODNmSSUUjaGkRUDlZrizCY0F9jC1uEJJCs33PMPluZPuhs3UJo6AhYB9uUQZVoqC9fwWq05wzVG3Y1uMsGe36slqcOW5tNhNJHwmZEAIknYfnaAqTi6psw59tBDQJxqv/ExJnSxNvNjQaKE/8Cp8z/wRElBELIB8vXF9wKXvL4Jtxr/I6lPFvlmcLhRnMV0knzSFgNU4DQxwT6a4H1rRNymFTI/uNOqTh20FyrQSKmfxbMNiUwUXUXxlZBFkjgsYL68lVwMtYLlu41sIWBbxmy53qpmH93c70OsaiM/UUgbilgGSIYKguaFAQFT1cxSsIANPG/kVz6X57uW3Cv8RIX9KyMDifx9XWgsXoN1tDdU1ZuXIEbS5dRtA9eQ/UbjRrsPngAubH8ARc8fRUroCzMmtUl5qmp8c8sQ9gzdf53Qw3t6wrzRJfp/YjM/BVRmFeGzv9jx/S/09nMy3jCehSmvYn3A+UaDkYZBZoTOX8dp86Po72NaxuvrYNiGTiBS/htVmB6szzlWRCo0xZBEMR/2F7yXxzCBEEAAAAASUVORK5CYII=" />'
        . '<b> Memory usage</b> '.self::convert(self::getMemory()).' (real '.self::convert(self::getRealMemory()).')';
    }
    
    /**
     * @param int $size
     * @return string
     */
    private static function convert($size){
        $unit=array('b','kb','mb','gb','tb','pb');
        return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
    }
}