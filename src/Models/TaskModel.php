<?php

namespace App\Models;
use App\Services\DbConnect;

class TaskModel {
    private \PDO $pdo;
    private string $tableName;

    public function __construct() {
        $this->pdo = DbConnect::getConnection();
        $this->tableName = 'tasks';

    }
    public function createTableIfNotExists(): void {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->tableName}` (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                description TEXT NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $this->pdo->exec($sql);
    }
    public function addTask(string $title, string $description ): void {
        $sql= "INSERT INTO `{$this->tableName}` (title, description) VALUES (:title, :description)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->execute();
    }
}
