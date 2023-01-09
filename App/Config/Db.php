<?php 
namespace Gamc\Config;

use PDO;
use PDOException;

class Db 
{
    private static PDO $db;
    protected const DB_HOST = 'localhost';
    protected const DB_NAME = 'gdaCotonou';
    protected const DB_USER = 'root';
    protected const DB_PWD = '';
    public function __construct()
    {
        try {
        static::$db = new PDO(
            "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=utf8", self::DB_USER,
            self::DB_PWD,
            [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
        } catch (PDOException $e) {
        die($e->getMessage());
        }
    }

    /** `Getter` db. */
    protected static function getDb(): PDO
    {
        try {
           $db = new PDO(
                "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=utf8", self::DB_USER,
                self::DB_PWD,
                [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
             return $db;
            } catch (PDOException $e) {
            die($e->getMessage());
            }
       
    }
}
