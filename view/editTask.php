<h1>Modifier une tâche</h1>
<form action="" method="post">
    <input type="hidden" name="id_task" value="<?= $task['id_task'] ?>">

    <label for="title">Titre :</label>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>

    <label for="description">Description :</label>
    <textarea id="description" name="description"><?= htmlspecialchars($task['description']) ?></textarea>

    <label for="date_fin">Date :</label>
    <input type="date" id="date_fin" name="date_fin" value="<?= htmlspecialchars($task['date_fin']) ?>">

    <label for="is_completed">Terminée :</label>
    <input type="checkbox" id="is_completed" name="is_completed" value="1" <?= $task['is_completed'] ? 'checked' : '' ?>>

    <button type="submit" class="btn btn-warning">Modifier</button>
</form>