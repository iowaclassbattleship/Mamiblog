<?php
class Security
{
    const SESSION_USER = "user";
    const ADMIN = "admin.mamiblog@gmail.com";
    //static function to check if user is logged in
    public static function isAuthenticated() {
        return isset($_SESSION[Security::SESSION_USER]) && $_SESSION[Security::SESSION_USER]->id > 0;
    }
    //static function to get current user
    public static function getUser() {
        return (!empty($_SESSION[Security::SESSION_USER])) ? $_SESSION[Security::SESSION_USER] : null;
    }
    //static function to get current user's id
    public static function getUserId() {
        return (!empty($_SESSION[Security::SESSION_USER])) ? $_SESSION[Security::SESSION_USER]->id : 0;
    }
    //static function to check if user is admin
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