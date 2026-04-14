<?php

namespace Database;

use PDO;

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        $dbPath = BASE_PATH . '/database/database.sqlite';

        try {
            $this->pdo = new PDO('sqlite:' . $dbPath);
            
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $this->pdo->exec('PRAGMA foreign_keys = ON;');
        } catch (\PDOException $e) {
            die('Error de conexión a SQLite: ' . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($sql, $params = [])
    {
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die('Error en consulta: ' . $e->getMessage());
        }
    }

    public function queryOne($sql, $params = [])
    {
        $results = $this->query($sql, $params);
        return $results[0] ?? null;
    }

    public function insert($sql, $params = [])
    {
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
            return $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            die('Error en inserción: ' . $e->getMessage());
        }
    }

    public function update($sql, $params = [])
    {
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
            return $statement->rowCount();
        } catch (\PDOException $e) {
            die('Error en actualización: ' . $e->getMessage());
        }
    }

    public function delete($sql, $params = [])
    {
        return $this->update($sql, $params);
    }

    public function exec($sql)
    {
        try {
            $this->pdo->exec($sql);
        } catch (\PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    private function __clone() {}

    public function __wakeup() {}
}
