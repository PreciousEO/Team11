<main class="container mt-5 mb-5">
    <div class="card w-100">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Spalten</span>
            <a href="/public/spalten/new" class="btn btn-primary btn-sm">Neu</a>
        </div>

        <div class="card-body">
            <?php if (!empty($spalten)): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Board ID</th>
                            <th>Sort ID</th>
                            <th>Spalte</th>
                            <th>Spaltenbeschreibung</th>
                            <th>Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($spalten as $spalte): ?>
                            <tr>
                                <td><?= esc($spalte['id']) ?></td>
                                <td><?= esc($spalte['boardsid']) ?></td>
                                <td><?= esc($spalte['sortid']) ?></td>
                                <td><?= esc($spalte['spalte']) ?></td>
                                <td><?= esc($spalte['spaltenbeschreibung']) ?></td>

                                <td class="text-nowrap">
                                    <a class="btn btn-outline-primary btn-sm"
                                       href="/public/spalten/edit/<?= esc($spalte['id']) ?>">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="/public/spalten/delete/<?= esc($spalte['id']) ?>"
                                          method="post"
                                          style="display:inline"
                                          onsubmit="return confirm('Spalte wirklich löschen?');">
                                        <button class="btn btn-outline-danger btn-sm" type="submit">
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
                    Keine Spalten vorhanden.
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
