<?php

class DataBase
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'root', '', 'inventario');
        $db->query("SET NAMES = 'utf8'");

        return $db;
    }

}