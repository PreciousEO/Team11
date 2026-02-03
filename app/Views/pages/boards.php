<main class="container mt-5 mb-5">
    <div class="card w-100">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Boards</span>

            <a href="/public/boards/new" class="btn btn-primary btn-sm">
                 Neu
            </a>
        </div>

        <div class="card-body">

            <?php if (!empty($boards)): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                        <tr>
                            <th style="width: 80px;">ID</th>
                            <th>Bezeichnung</th>
                            <th style="width: 140px;" class="text-end">Aktionen</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($boards as $board): ?>
                            <tr>
                                <td><?= esc($board['id']) ?></td>
                                <td><?= esc($board['bezeichnung'] ?? '') ?></td>

                                <td class="text-end text-nowrap">
                                    <a class="btn btn-outline-primary btn-sm"
                                       href="/public/boards/edit/<?= esc($board['id']) ?>">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <a class="btn btn-outline-danger btn-sm"
                                       href="/public/boards/delete/<?= esc($board['id']) ?>"
                                       onclick="return confirm('Board wirklich löschen?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-warning mb-0">
                    Keine Boards vorhanden.
                </div>
            <?php endif; ?>

        </div>
    </div>
</main>
