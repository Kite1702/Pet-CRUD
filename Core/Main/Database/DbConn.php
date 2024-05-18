<?php

namespace Core\Main\Database;

use Core\Main\Error\ReturnError;
use PDO;
use PDOException;
use PDOStatement;
use Core\Main\Error\DbError;

final class DbConn
{

    private $connection;
    private PDOStatement $stmt;
    private static $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(array $db_config)
    {
        if ($this->connection instanceof PDO) {
            return $this;
        }
        $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";
        try {
            $this->connection = new PDO($dsn, $db_config['username'], $db_config['password'], $db_config['options']);
            return $this;
        } catch (PDOException $e) {
            ReturnError::error_500("Not found in data");
        }
    }

    public function query($query, $params = [])
    {
        try {
            $this->stmt = $this->connection->prepare($query);
            $this->stmt->execute($params);
        } catch (PDOException $e) {
            ReturnError::error_500("Not found in data");
        }
        return $this;
    }

    public function findAll()
    {
        return $this->stmt->fetchAll();
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

    public function findOrFail()
    {
        $res = $this->find();
        if (!$res) {
            ReturnError::error_500("Not found in data");
        }
        return $res;
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function getColumn()
    {
        return $this->stmt->fetchColumn();
    }
}