<?php

require 'vendor/autoload.php';


use App\DbConnect;
use Symfony\Component\Dotenv\Dotenv;


$dotenv = new Dotenv();
$dotenv->overload(__DIR__ . '/.env');

try {
    $pdo = DbConnect::getConnection();
    echo "The database connection was successful";

    $stmt = $pdo->query("SHOW tables");
    $tables = $stmt->fetchAll();

    echo "<br>List of tables in the database: ";
    foreach ($tables as $table) {
        echo $table['Tables_in_' . $_ENV['DB_NAME']] . "<br>";
    }
} catch (PDOException $e) {
    die("Database connection error: " . $e->getMessage());
}