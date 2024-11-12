<?php

namespace App\Controller;

use App\Models\TaskModel;

class TaskController {
    private TaskModel $taskModel;

    public function __construct(TaskModel $taskModel) {
        $this->taskModel = $taskModel;
        $this->taskModel->createTableIfNotExists();
    }

    public function addTask() :void {
        $error = '';
        $success = '';
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           $title = $_POST['title'] ?? null;
           $description = $_POST['description'] ?? null;

           if (!empty($title) && !empty($description)) {
               try {
                   $this->taskModel->addTask($title, $description);
                   $success = "Task has been successfully added!";

               } catch (\Exception $exception) {
                   $error = "An error occurred while adding the task: " . $exception->getMessage();
               }
           } else {
               $error = 'Title and description cannot be empty';
           }
       }
        require_once  __DIR__ . '/../../views/addTaskView.php';
    }
}