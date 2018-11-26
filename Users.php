<?php
/**
 * Created by PhpStorm.
 * User: Tafa
 * Date: 11/25/2018
 * Time: 11:29 AM
 */

class Users
{
    private static $dbname ='select_test';
    private static $host = 'localhost';
    private static $username = 'root';
    private static $pwd = '';

    private static $const = null;

    public static function connect()
    {

        if ( null == self::$const )
        {
            try
            {
                self::$const =  new PDO( "mysql:host=".self::$host.";"."dbname=".self::$dbname, self::$username, self::$pwd);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$const;
    }

    public static function disconnect()
    {
        self::$const = null;
    }

}