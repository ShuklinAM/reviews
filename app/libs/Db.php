<?php

final class Db
{
    const DB_NAME = 'reviews';

    private static $_connected = false;
    private static $_connection = false;

    public static function connect($server, $user, $password)
    {
        self::$_connection = mysqli_connect($server, $user, $password, self::DB_NAME);

        if (mysqli_connect_errno()) {
            return self::$_connected = false;
        }

        return self::$_connected = true;
    }
    
    public static function checkConnection()
    {
        return self::$_connected;
    }
}