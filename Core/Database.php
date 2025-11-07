<?php
namespace Core;

use PDO;

class  Database {

    private string $host = 'localhost';
    private string $user = 'root';
    private string $password = '';
    private string $dbname = 'test';
    private int $port = 3306;
    private string $charset = 'utf8';
    private PDO $connection;

    public function __construct()
    {
        $dsn = 'mysql:' . http_build_query(['host' => $this->host, 'port' => $this->port, 'dbname' => $this->dbname, 'charset' => $this->charset], '', ';');
        $this->connection = new PDO($dsn, $this->user, $this->password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}