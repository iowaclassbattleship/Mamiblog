<?php

/**
 * Created by PhpStorm.
 * User: bschlm
 * Date: 20.04.2017
 * Time: 14:20
 */
class Message
{
    private static $errors = [];

    public static function set($key, $value) {
        Message::$errors[$key] = $value;
    }

    public static function get($key) {
        return (!empty(Message::$errors[$key])) ? Message::$errors[$key] : "";
    }
}