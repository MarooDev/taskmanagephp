<?php

require 'vendor/autoload.php';


use App\Services\DbConnect;
use Symfony\Component\Dotenv\Dotenv;


$dotenv = new Dotenv();
$dotenv->overload(__DIR__ . '/.env');

try {
    $pdo = DbConnect::getConnection();
    echo "The database connection was successful";

    $stmt = $pdo->query("SHOW tables");
    $tables = $stmt->fetchAll();

    echo "<br>List of tables in the database: ";

    if (!empty($tables)) {
        foreach ($tables as $table) {
            echo $table['Tables_in_' . $_ENV['DB_NAME']] . "<br>";
        }
    } else {
        echo "No tables in the database";
    }

} catch (PDOException $e) {
    die("Database connection error: " . $e->getMessage());
}


