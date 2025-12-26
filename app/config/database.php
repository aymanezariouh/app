<?php
declare(strict_types=1);

class DB
{
    private static ?DB $instance = null;
    private PDO $conn;

    private function __construct()
    {
        $dsn = "mysql:host=127.0.0.1;dbname=appbank1;charset=utf8mb4";
        $username = "root";
        $password = "root";

        $this->conn = new PDO(
            $dsn,
            $username,
            $password
        );
    }

    public static function getInstance(): DB
    {
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function connection(): PDO
    {
        return $this->conn;
    }
}
