<?php
include_once 'model/bdd.php';

class TasksModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function getTasksByUser($id_user)
    {
        $task = $this->bdd->prepare("SELECT * FROM tasks WHERE id_user = ?");
        $task->execute([$id_user]);
        return $task->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($id_user, $title, $description, $date_fin)
    {
        $task = $this->bdd->prepare("INSERT INTO tasks (id_user, title, description, date_fin) VALUES (?, ?, ?, ?)");
        return $task->execute([$id_user, $title, $description, $date_fin]);
    }

    public function updateTask($id_task, $title, $description, $date_fin, $is_completed)
    {
        $task = $this->bdd->prepare("UPDATE tasks SET title = ?, description = ?, date_fin = ?, is_completed = ? WHERE id_task = ?");
        return $task->execute([$title, $description, $date_fin, $is_completed, $id_task]);
    }

    public function deleteTask($id_task)
    {
        $task = $this->bdd->prepare("DELETE FROM tasks WHERE id_task = ?");
        return $task->execute([$id_task]);
    }

    public function getTaskById($id_task)
    {
        $task = $this->bdd->prepare("SELECT * FROM tasks WHERE id_task = ?");
        $task->execute([$id_task]);
        return $task->fetch(PDO::FETCH_ASSOC);
    }

    public function saveTask($id_task)
    {
        $task = $this->bdd->prepare("UPDATE tasks SET is_completed = 1, save = 1 WHERE id_task = ?");
        return $task->execute([$is_completed, $save, $id_task]);
    }
}