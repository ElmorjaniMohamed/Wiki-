<?php

namespace Database;

use PDO;

class Connection {

    private $dbname;
    private $host;
    private $username;
    private $password;
    private $pdo;
    private static $instance;

    private function __construct(string $dbname = null, string $host = null, string $username = null, string $password = null) {
        $this->dbname = $dbname ?? $_ENV['DB_DATABASE'];
        $this->host = $host ?? $_ENV['DB_HOST'];
        $this->username = $username ?? $_ENV['DB_USERNAME'];
        $this->password = $password ?? $_ENV['DB_PASSWORD'];
    }

    public static function getInstance(): Connection {
        if (self::$instance === null) {
            // Crée une nouvelle instance si elle n'existe pas
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPDO(): PDO {
        return $this->pdo ?? $this->pdo = new PDO("mysql:dbname={$this->dbname};host={$this->host}", $this->username, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }
}
