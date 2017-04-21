<?php

//Message class to get proper error
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