<main class="container mt-5 mb-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Tasks</h2>

        <div class="dropdown">
            <?php
            $activeName = 'Board wählen';
            foreach (($boards ?? []) as $b) {
                if ((int)$b['id'] === (int)($activeBoardId ?? 0)) {
                    $activeName = $b['bezeichnung'];
                    break;
                }
            }
            ?>
            <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                <?= esc($activeName) ?>
            </button>

            <ul class="dropdown-menu dropdown-menu-end">
                <?php foreach (($boards ?? []) as $b): ?>
                    <li>
                        <a class="dropdown-item"
                           href="/public/tasks?board=<?= esc($b['id']) ?>">
                            <?= esc($b['bezeichnung']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="d-flex flex-nowrap gap-3 overflow-auto pb-3">

        <?php foreach (($spalten ?? []) as $s): ?>
            <div class="card" style="min-width: 340px;">
                <div class="card-header">
                    <div class="fw-bold"><?= esc($s['spalte']) ?></div>
                    <small class="text-muted"><?= esc($s['spaltenbeschreibung'] ?? '') ?></small>
                </div>

                <div class="card-body d-flex flex-column gap-3">

                    <?php if (empty($s['tasks'])): ?>
                        <div class="text-muted">Keine Tasks.</div>
                    <?php endif; ?>

                    <?php foreach (($s['tasks'] ?? []) as $t): ?>
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <i class="bi bi-list-check"></i>
                                        <span class="fw-semibold"><?= esc($t['name']) ?></span>
                                    </div>

                                    <div class="d-flex gap-2">
                                        <a class="btn btn-sm btn-outline-primary"
                                           href="/public/tasks/edit/<?= esc($t['id']) ?>">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form method="post"
                                              action="/public/tasks/delete/<?= esc($t['id']) ?>"
                                              onsubmit="return confirm('Task wirklich löschen?');">
                                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="mt-2 text-muted">
                                    <i class="bi bi-calendar"></i>
                                    <?= esc($t['erinnerungsdatum'] ?? '-') ?>

                                    <?php if (!empty($t['erinnerung'])): ?>
                                        <span class="ms-2 text-danger">
                                            <i class="bi bi-bell-fill"></i>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="mt-2">
                                    <i class="bi bi-person-circle"></i>
                                    <?= esc($t['person'] ?: '-') ?>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                    <a class="btn btn-primary mt-2"
                       href="/public/tasks/new?spaltenid=<?= esc($s['id']) ?>">
                        <i class="bi bi-plus-lg"></i> Neu
                    </a>

                </div>
            </div>
        <?php endforeach; ?>

    </div>
</main>
