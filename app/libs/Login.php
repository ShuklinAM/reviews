<?php

class Login
{
    const ADMIN_FIELD = 'admin';

    public static function checkLogin()
    {
        if(!isset($_SESSION[self::ADMIN_FIELD]) || !$_SESSION[self::ADMIN_FIELD]) {
            return App::redirect('admin/login');
        }
    }

    public static function getLogin()
    {
        return !isset($_SESSION[self::ADMIN_FIELD]) || !$_SESSION[self::ADMIN_FIELD] ? false : $_SESSION[self::ADMIN_FIELD];
    }

    public static function loginAdmin($admin)
    {
        $_SESSION[self::ADMIN_FIELD] = $admin;
    }

    public static function logout()
    {
        unset($_SESSION[self::ADMIN_FIELD]);
    }
}