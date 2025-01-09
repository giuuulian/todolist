<?php
include_once 'model/tasksModel.php';

class TasksController
{
    private $model;

    public function __construct()
    {
        $this->model = new TasksModel;
    }

    public function getTasks()
    {
        $tasks = $this->model->getTasksByUser($_SESSION['id_user']);
        include_once 'view/tasks.php';
    }

    public function addTask()
    {
        if (isset($_POST['title'])) {
            $this->model->addTask($_SESSION['id_user'], $_POST['title'], $_POST['description'], $_POST['date_fin'] ?? '');
            header("Location: index.php?page=tasks");
        } else {
            include 'view/addTask.php';
        }
    }

    public function updateTask()
    {
        if (isset($_POST['id_task'], $_POST['title'])) {
            $this->model->updateTask($_POST['id_task'], $_POST['title'], $_POST['description'], $_POST['date_fin'], $_POST['is_completed'] ?? 0);
            header("Location: index.php?page=tasks");
        } else {
            $task = $this->model->getTaskById($_GET['id_task']);
            include 'view/editTask.php';
        }
    }

    public function deleteTask()
    {
        if (isset($_GET['id_task'])) {
            $this->model->deleteTask($_GET['id_task']);
            header("Location: index.php?page=tasks");
        }
    }

}
