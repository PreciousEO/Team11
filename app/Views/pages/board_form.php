<main class="container mt-5 mb-5">
    <div class="card w-100">
        <div class="card-header">
            <?= ($mode === 'update') ? 'Board bearbeiten' : 'Neues Board anlegen' ?>
        </div>

        <div class="card-body">
            <form method="post" novalidate action="<?= esc($action) ?>">

                <div class="mb-3">
                    <label class="form-label">Bezeichnung</label>

                    <input type="text"
                           name="bezeichnung"
                           class="form-control <?= isset($validation) && $validation && $validation->hasError('bezeichnung') ? 'is-invalid' : '' ?>"
                           value="<?= esc(old('bezeichnung') ?? ($board['bezeichnung'] ?? '')) ?>">

                    <div class="invalid-feedback">
                        <?= (isset($validation) && $validation) ? esc($validation->getError('bezeichnung')) : '' ?>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="/public/boards" class="btn btn-secondary">Abbrechen</a>

                    <button type="submit" class="btn btn-primary">
                        <?= ($mode === 'update') ? 'Speichern' : 'Erstellen' ?>
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>
