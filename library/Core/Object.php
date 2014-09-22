<?php

namespace Core;

/**
 * Základní třída. Dovoluje objektům používat vlastnosti. 
 * Každá třída musí být potomkem Object.
 * @author Vladimír Antoš
 * @version 1.0
 */
abstract class Object {

    /**
     * Vrátí řetězec, který představuje aktuální objekt
     * @return string
     */
    public function toString() {
        return get_class($this);
    }

    /**
     * Metoda zjišťuje, jestli jsou objekty stejného typu (třídy).
     * Pokud není zadán druhý parametr, objekt je porovnáván s aktuálním.
     * @param object $obj1
     * @param object $obj2
     * @return bool
     */
    public function equals(object $obj1, object $obj2 = null) {
        return ($obj2 == null ? ($this == $obj1 ? true : false) : ($obj1 == $obj2 ? true : false));
    }

    /**
     * Metoda zjištuje, jestli jsou objekty stejné instance.
     * Pokud není zadán druhý parametr, objekt je porovnáván s aktuálním.
     * @param object $obj1
     * @param object $obj2
     */
    final public function instanceEquals(object $obj1, object $obj2 = null) {
        return ($obj2 == null ? ($this === $obj1 ? true : false) : ($obj1 === $obj2 ? true : false));
    }

    /**
     * Vrací typ zadané proměnné. Pokud je proměnná neznámého typu, metoda vrací false.
     * @param mixed $var
     * @return string
     */
    final public function getObjectType($var) {
        if (is_array($var))
            return "array";
        if (is_bool($var))
            return "boolean";
        if (is_callable($var))
            return "function reference";
        if (is_float($var))
            return "float";
        if (is_int($var))
            return "integer";
        if (is_null($var))
            return "null";
        if (is_numeric($var))
            return "numeric";
        if (is_object($var))
            return "object";
        if (is_resource($var))
            return "resource";
        if (is_string($var))
            return "string";
        return null;
    }

    /**
     * Vrací hash hodnotu objektu.
     * @return string
     */
    public function getHashCode() {
        return base64_encode($this);
    }

    /** @return string */
    public function __toString() {
        return $this->toString();
    }

    /** @return object */
    public function __clone() {
        return $this->cloneObject();
    }

    public function cloneObject() {
        throw new NotImplementationException();
    }

    /**
     * @return string
     */
    public function serialize() {
        return serialize($this);
    }

    /**
     * @param string $string
     * @return Object
     */
    public function unserialize($string) {
        return unserialize($string);
    }

    public function __set($name, $value) {
        if (method_exists($this, $MethodName = 'set' . $name)) {
            return $this->$MethodName($value);
        } else
            throw new \Exception("Call to undefined or private setter of property - " . $name);
    }

    public function __get($name) {
        if (method_exists($this, $MethodName = 'get' . $name))
            return $this->$MethodName();
        else
            throw new \Exception("Call to undefined or private getter of property - " . $name);
    }

    /**
     * @param Object $obj
     */
    public function compare(Object $obj){
        return $this > $obj;
    }
}

