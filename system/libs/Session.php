<?php

class Session
{

    public static function init()
    {
        session_start();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    public static function destroy()
    {
        session_destroy();
    }

    public static function unset($key)
    {
        unset($_SESSION[$key]);
    }

    public static function checkSession()
    {
        self::init();
        if (self::get("login") == false) {
            self::destroy();
            header("Location:" . BASE_URL . "/login");
        } else {
        }
    }

    public static function isLogin()
    {
        // self::init();
        return self::get("login") == true ? true : false;
    }

    public static function getFullName()
    {
        // self::init();
        return self::get("fullName");
    }
}
