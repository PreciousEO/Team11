<main class="container mt-5 mb-5">
    <div class="card w-100">
        <div class="card-header">
            <?= ($mode === 'update') ? 'Task bearbeiten' : 'Neue Task anlegen' ?>
        </div>

        <div class="card-body">
            <form method="post"
                  novalidate
                  action="<?= ($mode === 'update') ? '/public/tasks/update/' . esc($task['id']) : '/public/tasks/create' ?>">

                <div class="mb-3">
                    <label class="form-label">Taskbezeichnung</label>
                    <input type="text"
                           name="tasks"
                           class="form-control <?= isset($error['tasks']) ? 'is-invalid' : '' ?>"
                           value="<?= esc($task['tasks'] ?? '') ?>">
                    <div class="invalid-feedback">
                        <?= esc($error['tasks'] ?? '') ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Taskart ID</label>
                        <input type="number"
                               name="taskartenid"
                               class="form-control <?= isset($error['taskartenid']) ? 'is-invalid' : '' ?>"
                               value="<?= esc($task['taskartenid'] ?? '') ?>">
                        <div class="invalid-feedback">
                            <?= esc($error['taskartenid'] ?? '') ?>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Personen ID</label>
                        <input type="number"
                               name="personenid"
                               class="form-control <?= isset($error['personenid']) ? 'is-invalid' : '' ?>"
                               value="<?= esc($task['personenid'] ?? '') ?>">
                        <div class="invalid-feedback">
                            <?= esc($error['personenid'] ?? '') ?>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Spalten ID</label>
                        <input type="number"
                               name="spaltenid"
                               class="form-control <?= isset($error['spaltenid']) ? 'is-invalid' : '' ?>"
                               value="<?= esc($task['spaltenid'] ?? '') ?>">
                        <div class="invalid-feedback">
                            <?= esc($error['spaltenid'] ?? '') ?>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Sort ID</label>
                        <input type="number"
                               name="sortid"
                               class="form-control <?= isset($error['sortid']) ? 'is-invalid' : '' ?>"
                               value="<?= esc($task['sortid'] ?? '') ?>">
                        <div class="invalid-feedback">
                            <?= esc($error['sortid'] ?? '') ?>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Erinnerungsdatum</label>
                    <input type="date"
                           name="erinnerungsdatum"
                           class="form-control <?= isset($error['erinnerungsdatum']) ? 'is-invalid' : '' ?>"
                           value="<?= esc($task['erinnerungsdatum'] ?? '') ?>">
                    <div class="invalid-feedback">
                        <?= esc($error['erinnerungsdatum'] ?? '') ?>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="erinnerung" value="1"
                            <?= !empty($task['erinnerung']) ? 'checked' : '' ?>>
                    <label class="form-check-label">Erinnerung aktivieren</label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Notizen</label>
                    <textarea name="notizen"
                              class="form-control <?= isset($error['notizen']) ? 'is-invalid' : '' ?>"
                              rows="4"><?= esc($task['notizen'] ?? '') ?></textarea>
                    <div class="invalid-feedback">
                        <?= esc($error['notizen'] ?? '') ?>
                    </div>
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
