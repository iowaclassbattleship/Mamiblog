<?php

/**
 * Created by PhpStorm.
 * User: bschlm
 * Date: 20.04.2017
 * Time: 14:20
 */
class Error
{
    private static $errors = [];

    public static function set($key, $value) {
        Error::$errors[$key] = $value;
    }

    public static function get($key) {
        return (!empty(Error::$errors[$key])) ? Error::$errors[$key] : "";
    }
}