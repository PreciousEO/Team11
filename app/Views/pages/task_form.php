<main class="container mt-5 mb-5">
    <div class="card w-100">
        <div class="card-header">
            <?= ($mode === 'update') ? 'Task bearbeiten' : 'Neue Task anlegen' ?>
        </div>

        <div class="card-body">
            <form method="post"
                  action="<?= ($mode === 'update') ? '/public/tasks/update/' . esc($task['id']) : '/public/tasks/create' ?>">

                <div class="mb-3">
                    <label class="form-label">Taskbezeichnung</label>
                    <input type="text" name="tasks" class="form-control"
                           value="<?= esc($task['tasks'] ?? '') ?>" required>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Taskart ID</label>
                        <input type="number" name="taskartenid" class="form-control"
                               value="<?= esc($task['taskartenid'] ?? '') ?>" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Personen ID</label>
                        <input type="number" name="personenid" class="form-control"
                               value="<?= esc($task['personenid'] ?? '') ?>" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Spalten ID</label>
                        <input type="number" name="spaltenid" class="form-control"
                               value="<?= esc($task['spaltenid'] ?? '') ?>" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Sort ID</label>
                        <input type="number" name="sortid" class="form-control"
                               value="<?= esc($task['sortid'] ?? '') ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Erinnerungsdatum</label>
                    <input type="date" name="erinnerungsdatum" class="form-control"
                           value="<?= esc($task['erinnerungsdatum'] ?? '') ?>">
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="erinnerung" value="1"
                        <?= !empty($task['erinnerung']) ? 'checked' : '' ?>>
                    <label class="form-check-label">Erinnerung aktivieren</label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Notizen</label>
                    <textarea name="notizen" class="form-control" rows="4"><?= esc($task['notizen'] ?? '') ?></textarea>
                </div>

                <div class="d-flex gap-2">
                    <a href="/public/tasks" class="btn btn-secondary">Abbrechen</a>
                    <button type="submit" class="btn btn-primary">
                        <?= ($mode === 'update') ? 'Speichern' : 'Erstellen' ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
