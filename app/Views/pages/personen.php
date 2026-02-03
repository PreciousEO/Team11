<main class="container mt-5 mb-5">
    <div class="card w-100">
        <div class="card-header">
            Personen Übersicht
        </div>

        <div class="card-body">
            <?php if (!empty($personen)): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Vorname</th>
                            <th>Nachname</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($personen as $p): ?>
                            <tr>
                                <td><?= esc($p['id']) ?></td>
                                <td><?= esc($p['vorname']) ?></td>
                                <td><?= esc($p['name']) ?></td>
                                <td><?= esc($p['email']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-warning">
                    Keine Personen gefunden.
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
