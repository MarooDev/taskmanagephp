<?php

namespace App;

use PDO;
use PDOException;

class DbConnect
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO {
        if (self::$pdo == null) {
            $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'] . ';charset=utf8';
            $user = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASS'];

            try {
                self::$pdo = new PDO($dsn, $user, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new PDOException("Failed to connect to the database in DbConnect: " . $e->getMessage(), (int)$e->getCode());
            }
        }
        return self::$pdo;
    }
}