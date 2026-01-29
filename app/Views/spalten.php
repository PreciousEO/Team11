
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-Entwicklung Team 11</title>
    <link rel="stylesheet" type="text/css" href="https://team11.wi1cm.uni-trier.de/public/Css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Font-Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap 5 CDN -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"

    >
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class = "d-flex flex-column min-vh-100">

<body>

<!-- NAVIGATION -->
<nav class="navbar-bg d-flex align-items-center px-4">
    <a href="https://team11.wi1cm.uni-trier.de/public/">
        <img class="navbar_logo" src="https://team11.wi1cm.uni-trier.de/public/Logo/07_-_WE-Logo.svg" alt="Logo">
    </a>

    <a class="navbar-items text-decoration-none ms-4" href="https://team11.wi1cm.uni-trier.de/public/tasks">Tasks</a>
    <a class="navbar-items text-decoration-none ms-3" href="https://team11.wi1cm.uni-trier.de/public/boards">Boards</a>
    <a class="navbar-items text-decoration-none ms-3" href="https://team11.wi1cm.uni-trier.de/public/spalten">Spalten</a>
    <a class="navbar-items text-decoration-none ms-3" href="https://team11.wi1cm.uni-trier.de/public/personen">Personen</a>
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
                        Spalten
                    </div>

                    <!-- kleinere Button-Zeile, etwas Abstand innen -->
                    <div class="p-3 d-flex">
                        <a href="/create_spalten" class="btn btn-primary btn-sm me-2">Erstellen</a>
                    </div>

                    <!-- innerer Rahmen um die Tabelle (zweiter Rahmen) -->
                    <div class="inner-frame mx-3 mb-3 rounded">

                        <div class="table-responsive">
                            <!-- table-bordered sorgt für Linien zwischen Zellen -->
                            <table class="table table-striped table-hover table-bordered mb-0 align-middle">
                                <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Board</th>
                                    <th>SortID</th>
                                    <th>Spalte</th>
                                    <th>Spaltenbeschreibung</th>
                                    <th>Bearbeiten</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Allgemeine ToDos</td>
                                    <td>100</td>
                                    <td>Zu besprechen</td>
                                    <td>Noch zu besprechende ToDos</td>
                                    <td class="text-nowrap">
                                        <button class="btn btn-outline-primary btn-sm me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Allgemeine ToDos</td>
                                    <td>200</td>
                                    <td>In Bearbeitung</td>
                                    <td>ToDos die aktuell bearbeitet werden</td>
                                    <td class="text-nowrap">
                                        <button class="btn btn-outline-primary btn-sm me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </div>

                    </div> <!-- .inner-frame -->

                </div> <!-- outer border -->

            </div>
        </div>
</main>

<!-- FOOTER -->
<!---Footer Anfang--->
<footer class="footer_class mt-auto">
    <div class = "footer-content">
        <div  class="footer-element-left">© Web-Entwicklung Team 11 </div>
        <div class ="right-group">
            <div class ="footer-element-right">Impressum </div>
            <div class ="footer-element-right">Datenschutz </div>
            <div class ="footer-element-right">Kontakt</div>
        </div>
    </div>
</footer>

<!---Footer Ende--->
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>