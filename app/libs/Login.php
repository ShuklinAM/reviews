<?php

final class Login
{
    const ADMIN_FIELD = 'is_admin';

    public static function checkLogin()
    {
        if(!isset($_SESSION[self::ADMIN_FIELD]) || !$_SESSION[self::ADMIN_FIELD]) {
            return App::redirect('admin/login');
        }
    }

    public static function isLogin()
    {
        return !isset($_SESSION[self::ADMIN_FIELD]) || !$_SESSION[self::ADMIN_FIELD] ? false : true;
    }

    public static function loginAdmin()
    {
        $_SESSION[self::ADMIN_FIELD] = true;
    }

    public static function logout()
    {
        unset($_SESSION[self::ADMIN_FIELD]);
    }
}