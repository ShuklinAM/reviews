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

    public static function getRowWhere($table, $conditions)
    {
        $query = 'SELECT * FROM '.$table.' WHERE ';

        $where = array();
        foreach($conditions as $key => $value) {
            $where[] = $key.' = "'.$value.'"';
        }

        $query .= implode(' AND ', $where).' LIMIT 1';

        $result = mysqli_query(self::$_connection, $query);
        return mysqli_fetch_assoc($result);
    }

    public static function getRowsWhere($table, $conditions, $limit, $sort)
    {
        $query = 'SELECT * FROM '.$table;

        if($conditions) {
            $where = array();
            foreach($conditions as $key => $value) {
                $where[] = $key.' = "'.$value.'"';
            }

            $query .= ' WHERE '.implode(' AND ', $where);
        }

        $query .= ' ORDER BY '.$sort.' LIMIT '.$limit['start'].', '.$limit['limit'];

        $result = mysqli_query(self::$_connection, $query);

        $reviews = array();
        while ($row = mysql_fetch_assoc($result)) {
            $reviews[] = $row;
        }

        return $reviews;
    }
}