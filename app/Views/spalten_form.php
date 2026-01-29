
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-Entwicklung Team 11</title>

    <!-- eigenes CSS -->
    <link rel="stylesheet" type="text/css" href="https://team11.wi1cm.uni-trier.de/public/Css/style.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">

<!-- NAVIGATION -->
<nav class="navbar-bg d-flex align-items-center px-4">
    <a href="https://team11.wi1cm.uni-trier.de/public/">
        <img class="navbar_logo"
             src="https://team11.wi1cm.uni-trier.de/public/Logo/07_-_WE-Logo.svg"
             alt="Logo">
    </a>

    <a class="navbar-items text-decoration-none ms-4"
       href="https://team11.wi1cm.uni-trier.de/public/">
        Tasks
    </a>
    <a class="navbar-items text-decoration-none ms-3"
       href="https://team11.wi1cm.uni-trier.de/public/">
        Boards
    </a>
    <a class="navbar-items text-decoration-none ms-3"
       href="https://team11.wi1cm.uni-trier.de/public/spalten">
        Spalten
    </a>
</nav>

<!-- INHALT -->
<main class="container mt-4">

    <div class="container mt-5 mb-5 pb-5">
        <div class="row">
            <div class="col-12">

                <!-- äußerer Rahmen -->
                <div class="border rounded">

                    <!-- Überschrift mit dickerer Linie darunter -->
                    <div class="bg-light p-2 fw-bold border-bottom border-2">
                        Spalten erstellen
                    </div>

                    <!-- innerer Rahmen -->
                    <div class="inner-frame mx-3 mb-3 rounded">

                        <div class="mt-3 mb-3">
                            <form>
                                <!-- Spaltenbezeichnung -->
                                <div class="mb-3">
                                    <label for="spaltenname" class="form-label">Spaltenbezeichnung</label>
                                    <input type="text" class="form-control" id="spaltenname"
                                           placeholder="z. B. To Do">
                                </div>

                                <!-- Spaltenbeschreibung -->
                                <div class="mb-3">
                                    <label for="beschreibung" class="form-label">Spaltenbeschreibung</label>
                                    <textarea class="form-control" id="beschreibung" rows="3"
                                              placeholder="Kurze Beschreibung der Spalte"></textarea>
                                </div>

                                <!-- Sortid -->
                                <div class="mb-3">
                                    <label for="sortid" class="form-label">Sortid</label>
                                    <input type="number" class="form-control" id="sortid"
                                           placeholder="z. B. 10">
                                </div>

                                <!-- Board-Auswahl (Dropdown) -->
                                <div class="mb-3">
                                    <label for="board" class="form-label">Board</label>
                                    <select class="form-select" id="board">
                                        <option selected>Bitte wählen…</option>
                                        <option value="1">Board A</option>
                                        <option value="2">Board B</option>
                                        <option value="3">Board C</option>
                                    </select>
                                </div>

                                <!-- Buttons -->
                                <button type="submit" class="btn btn-success me-2">
                                    Speichern
                                </button>
                                <a href="<?= base_url('spalten') ?>" class="btn btn-secondary">
                                    Abbrechen
                                </a>
                            </form>
                        </div>

                    </div> <!-- .inner-frame -->

                </div> <!-- outer border -->

            </div>
        </div>
    </div>

</main>

<!-- FOOTER -->
<footer class="footer_class mt-auto">
    <div class="footer-content">
        <div class="footer-element-left">© Web-Entwicklung Team 11</div>
        <div class="right-group">
            <div class="footer-element-right">Impressum</div>
            <div class="footer-element-right">Datenschutz</div>
            <div class="footer-element-right">Kontakt</div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS (einmal, unten) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

