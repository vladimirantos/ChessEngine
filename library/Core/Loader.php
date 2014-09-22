<?php

namespace Core;

/**
 * @author Vladimír Antoš
 * @version 1.0
 */
class Loader {
    private $includePath;
    
    public function setIncludePath($path){
        if(!file_exists($path))
            throw new Exceptions\FileNotFoundException("Path ".$path." not found");
        $this->includePath = $path;
    }
    
    public function load(){
        
    }
    
    public function register(){
        
    }
}
