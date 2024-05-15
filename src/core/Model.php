<?php


namespace core;


class Model
{

    public static Db $db;

    public function __construct()
    {
        self::$db = Db::getInstence();
    }

    public static function lastInsertId() : int
    {
        return self::$db->getPDO()->lastInsertId();
    }

    public static function findOne(string $table, string $field, array $data) : array
    {
        return self::$db->query(
            "SELECT * FROM {$table} WHERE {$field} = ? LIMIT 1",
            $data
        );
    }

    public static function count(string $table, string $field, string $value) : int
    {
        return  3;
//        return self::$db->query(
//            "SELECT COUNT({$field}) FROM {$table} WHERE {$field} = ?",
//            $value,
//        );
    }
}