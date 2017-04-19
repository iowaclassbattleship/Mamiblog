<?php

/**
 * Created by PhpStorm.
 * User: bschlm
 * Date: 19.04.2017
 * Time: 11:19
 */
class Security
{
    const SESSION_USER = "user";

    public static function isAuthenticated() {
        return isset($_SESSION[Security::SESSION_USER]) && $_SESSION[Security::SESSION_USER]->id > 0;
    }

    public static function getUser() {
        return $_SESSION[Security::SESSION_USER];
    }
}