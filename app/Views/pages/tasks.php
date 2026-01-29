<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Tasks Übersicht</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (für Stift & Papierkorb) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<main class="container mt-5 mb-5">
    <div class="card w-100">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Tasks</span>
            <a href="/public/tasks/new" class="btn btn-primary btn-sm">Neu</a>
        </div>

        <div class="card-body">
            <?php if (!empty($tasks)): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Task</th>
                            <th>Erinnerungsdatum</th>
                            <th>Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tasks as $task): ?>
                            <?php if (!empty($task['geloescht'])) continue; ?>
                            <tr>
                                <td><?= esc($task['tasks']) ?></td>
                                <td>
                                    <?php if (!empty($task['erinnerungsdatum'])): ?>
                                        <?= date('d.m.Y', strtotime($task['erinnerungsdatum'])) ?>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td class="text-nowrap">

                                    <a class="btn btn-outline-primary btn-sm"
                                       href="/public/tasks/edit/<?= esc($task['id']) ?>"
                                       title="Bearbeiten">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="/public/tasks/delete/<?= esc($task['id']) ?>"
                                          method="post"
                                          style="display:inline"
                                          onsubmit="return confirm('Task wirklich löschen?');">
                                        <button class="btn btn-outline-danger btn-sm"
                                                type="submit"
                                                title="Löschen">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-warning">
                    Keine Tasks gefunden. Bitte Tasks in der Datenbank anlegen.
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

</body>
</html>
