<?php


namespace core;


use app\dto\User;
use Exception;
use PDO;
use PDOException;
use PDOStatement;
use stdClass;

class Db
{

    use TSingleton;

    private PDO $dbn;

    private function __construct()
    {
        try {
            $db = require_once DB_CONFIG;
            $this->dbn = new PDO($db['dsn'], $db['user'], $db['password']);
        } catch (PDOException $e) {
            throw new Exception('No coonection to BD', 500);
        }
    }

    public function getPDO(): PDO
    {
        return $this->dbn;
    }

    public function query(string $sql, array $data, string $class = stdClass::class): object|bool
    {
        $sth = $this->dbn->prepare($sql);
        $this->bindParamDB($sth, $data);
        $sth->setFetchMode(PDO::FETCH_CLASS, $class);
        $sth->execute();

        return $sth->fetch();
    }

    public function queryAll(string $sql, array $data, string $class = stdClass::class): array
    {
        $sth = $this->dbn->prepare($sql);
        $this->bindParamDB($sth, $data);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    private function bindParamDB(PDOStatement $sth, array $data): void
    {
        if (!empty($data)) {
            for ($i = 0; $i < count($data); $i++) {
                $sth->bindParam($i + 1, $data[$i]);
            }
        }
    }

}

