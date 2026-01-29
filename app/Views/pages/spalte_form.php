<main class="container mt-5 mb-5">
    <div class="card w-100">
        <div class="card-header">
            <?= ($mode === 'update') ? 'Spalte bearbeiten' : 'Neue Spalte anlegen' ?>
        </div>

        <div class="card-body">
            <form method="post" action="<?= esc($action) ?>">

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Board ID</label>
                        <input type="number"
                               name="boardsid"
                               class="form-control"
                               value="<?= esc($spalte['boardsid'] ?? '') ?>"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Sort ID</label>
                        <input type="number"
                               name="sortid"
                               class="form-control"
                               value="<?= esc($spalte['sortid'] ?? '') ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Spalten-Bezeichnung</label>
                    <input type="text"
                           name="spalte"
                           class="form-control"
                           value="<?= esc($spalte['spalte'] ?? '') ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Spaltenbeschreibung</label>
                    <textarea name="spaltenbeschreibung"
                              class="form-control"
                              rows="4"><?= esc($spalte['spaltenbeschreibung'] ?? '') ?></textarea>
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
