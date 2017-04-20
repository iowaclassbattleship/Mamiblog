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
    const ADMIN = "admin.mamiblog@gmail.com";

    public static function isAuthenticated() {
        return isset($_SESSION[Security::SESSION_USER]) && $_SESSION[Security::SESSION_USER]->id > 0;
    }

    public static function getUser() {
        return (!empty($_SESSION[Security::SESSION_USER])) ? $_SESSION[Security::SESSION_USER] : null;
    }

    public static function getUserId() {
        return (!empty($_SESSION[Security::SESSION_USER])) ? $_SESSION[Security::SESSION_USER]->id : 0;
    }

    public static function isAdmin(){
        if (isset($_SESSION[Security::SESSION_USER])){
            if ($_SESSION[Security::SESSION_USER]->email==Security::ADMIN){
                return true;
            }
            else{
                return false;

            }
        }

    }
}