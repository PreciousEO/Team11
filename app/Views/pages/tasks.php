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

                <div class="card-body d-flex flex-column gap-3 dragula-container" data-spaltenid="<?= esc($s['id']) ?>">

                    <?php if (empty($s['tasks'])): ?>
                        <div class="text-muted empty-msg">Keine Tasks.</div>
                    <?php endif; ?>

                    <?php foreach (($s['tasks'] ?? []) as $t): ?>
                        <div class="card task-item" data-taskid="<?= esc($t['id']) ?>">
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <i class="bi bi-list-check" style="cursor: grab;"></i>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Finde alle Container, die Tasks aufnehmen können
        var containers = Array.from(document.querySelectorAll('.dragula-container'));

        // 2. Initialisiere Dragula für diese Container
        var drake = dragula(containers, {
            // Optional: Verhindern, dass "Keine Tasks"-Texte und der "Neu"-Button verschoben werden
            invalid: function (el, handle) {
                return el.classList.contains('empty-msg') || el.classList.contains('btn');
            }
        });

        // 3. Event-Listener, wenn ein Element losgelassen wird (Drop)
        drake.on('drop', function(el, target, source, sibling) {

            // Hole die Daten aus dem HTML
            var taskId = el.getAttribute('data-taskid');
            var newSpaltenId = target.getAttribute('data-spaltenid');

            // Berechne die neue Position (sortid) in der Spalte
            var newSortId = 1;
            var tasksInColumn = target.querySelectorAll('.task-item');

            tasksInColumn.forEach(function(task, index) {
                if (task === el) {
                    newSortId = index + 1; // 1-basiert, wie es oft in DBs üblich ist
                }
            });

            // Test-Ausgabe in der Konsole - Drücke F12 im Browser, um das zu prüfen!
            console.log("Erfolg! Task " + taskId + " verschoben nach Spalte " + newSpaltenId + " auf Position " + newSortId);

            // Übung8.2-Ajax
            // Die Daten, die wir an den Server senden wollen
            const payload = {
                id: taskId,
                spaltenid: newSpaltenId,
                sortid: newSortId
            };

            // AJAX-Anfrage an den Controller senden
            fetch('/public/tasks/updateSort', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(payload)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Netzwerkantwort war nicht ok');
                    }
                    return response.json(); // Wir erwarten eine JSON-Antwort vom Server
                })
                .then(data => {
                    if(data.success) {
                        console.log('AJAX: Erfolgreich in der Datenbank gespeichert!');
                    } else {
                        console.error('AJAX: Fehler beim Speichern auf dem Server.');
                    }
                })
                .catch(error => {
                    console.error('AJAX: Ein Fehler ist aufgetreten:', error);
                });

        });
    });
</script>
