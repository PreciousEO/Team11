<main class="container mt-5 mb-5">
    <div class="card w-100">
        <div class="card-header">
            <?= ($mode === 'update') ? 'Spalte bearbeiten' : 'Neue Spalte anlegen' ?>
        </div>

        <div class="card-body">
            <form method="post" action="<?= esc($action) ?>" novalidate>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Board ID</label>
                        <input type="number"
                               name="boardsid"
                               class="form-control <?= isset($error['boardsid']) ? 'is-invalid' : '' ?>"
                               value="<?= esc($spalte['boardsid'] ?? '') ?>">
                        <div class="invalid-feedback">
                            <?= esc($error['boardsid'] ?? '') ?>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Sort ID</label>
                        <input type="number"
                               name="sortid"
                               class="form-control <?= isset($error['sortid']) ? 'is-invalid' : '' ?>"
                               value="<?= esc($spalte['sortid'] ?? '') ?>">
                        <div class="invalid-feedback">
                            <?= esc($error['sortid'] ?? '') ?>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Spalten-Bezeichnung</label>
                    <input type="text"
                           name="spalte"
                           class="form-control <?= isset($error['spalte']) ? 'is-invalid' : '' ?>"
                           value="<?= esc($spalte['spalte'] ?? '') ?>">
                    <div class="invalid-feedback">
                        <?= esc($error['spalte'] ?? '') ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Spaltenbeschreibung</label>
                    <textarea name="spaltenbeschreibung"
                              class="form-control <?= isset($error['spaltenbeschreibung']) ? 'is-invalid' : '' ?>"
                              rows="4"><?= esc($spalte['spaltenbeschreibung'] ?? '') ?></textarea>
                    <div class="invalid-feedback">
                        <?= esc($error['spaltenbeschreibung'] ?? '') ?>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="/public/spalten" class="btn btn-secondary">Abbrechen</a>
                    <button type="submit" class="btn btn-primary">
                        <?= ($mode === 'update') ? 'Speichern' : 'Erstellen' ?>
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>
