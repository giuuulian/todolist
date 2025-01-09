<h1>Mes tâches</h1>
<a href="?page=addTask" class="btn btn-primary">Ajouter une tâche</a>
<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Status</th>
            <th>Date<th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td><?= htmlspecialchars($task['description']) ?></td>
            <td><?= $task['is_completed'] ? 'Terminée' : 'En cours' ?></td>
            <td><?= htmlspecialchars($task['date_fin']) ?></td>
            <td>
                <a href="?page=deleteTask&id_task=<?= $task['id_task'] ?>" class="btn btn-success">Valider</a>
                <a href="?page=editTask&id_task=<?= $task['id_task'] ?>" class="btn btn-warning">Modifier</a>
                <a href="?page=deleteTask&id_task=<?= $task['id_task'] ?>" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>