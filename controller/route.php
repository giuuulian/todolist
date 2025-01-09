<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

switch ($page) {
    case 'tasks':
        include_once 'controller/TasksController.php';
        $tasksController = new TasksController;
        $tasksController->getTasks();
        break;
    case 'addTask':
        include_once 'controller/TasksController.php';
        $tasksController = new TasksController;
        $tasksController->addTask();
        break;
    case 'editTask':
        include_once 'controller/TasksController.php';
        $tasksController = new TasksController;
        $tasksController->updateTask();
        break;
    case 'deleteTask':
        include_once 'controller/TasksController.php';
        $tasksController = new TasksController;
        $tasksController->deleteTask();
        break;
    case 'inscription':
        include_once 'controller/usersController.php';
        $users = new UsersController;
        $users->inscription();
        break;
    case 'connexion':
        include_once 'controller/usersController.php';
        $users = new UsersController;
        $users->connexion();
        break;
    case 'deconnexion':
        $_SESSION = array();
        header("Location: index.php");
        break;
    default:
        include 'view/404.php';
}