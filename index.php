<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Controller/TaskController.php';
require_once __DIR__ . '/src/Models/TaskModel.php';

use App\Controller\TaskController;
use App\Models\TaskModel;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->overload(__DIR__ . '/.env');

$taskModel = new TaskModel();
$controller = new TaskController($taskModel);
$controller->addTask();



