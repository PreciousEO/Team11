
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-Entwicklung Team11</title>
    <link rel="stylesheet" type="text/css" href="https://team11.wi1cm.uni-trier.de/public/Css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">


<nav class="navbar navbar-bg px-3">
    <div class="d-flex align-items-center h-100">
        <a href="https://team11.wi1cm.uni-trier.de/public/">
            <img class="navbar_logo" src="https://team11.wi1cm.uni-trier.de/public/Logo/07_-_WE-Logo.svg" alt="Logo">
        </a>

        <a class="navbar-items text-decoration-none ms-4" href="https://team11.wi1cm.uni-trier.de/public/tasks">Tasks</a>
        <a class="navbar-items text-decoration-none ms-3" href="https://team11.wi1cm.uni-trier.de/public/boards">Boards</a>
        <a class="navbar-items text-decoration-none ms-3" href="https://team11.wi1cm.uni-trier.de/public/spalten">Spalten</a>
        <a class="navbar-items text-decoration-none ms-3" href="https://team11.wi1cm.uni-trier.de/public/personen">Personen</a>
    </div>
</nav>
<div class="container mt-3" style="display: flex; align-items: center; justify-content: center">
    <table class="table table-responsive table-bordered table-striped table-hover w-100 d-block d-md-table"
           data-show-columns="true"
           showColumnsToggleAll="true"
           data-show-toggle="true"
           data-toggle="table"
           data-search="true"
           data-sort-stable="true"
           data-toolbar="#toolbar">
        <thead align="left">
        <tr>
            <th data-sortable="true">ID</th>
            <th data-sortable="true">Vorname</th>
            <th data-sortable="true">Name</th>
            <th>E-Mail</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Max</td>
            <td>Schneider</td>
            <td>max.schneider@example.com</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Sophie</td>
            <td>Weber</td>
            <td>sophie.weber@example.com</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Jonas</td>
            <td>Wagner</td>
            <td>jonas.wagner@example.com</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Paul</td>
            <td>Neumann</td>
            <td>paul.neumann@example.com</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Tim</td>
            <td>Wagner</td>
            <td>tim.wagner@example.com</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Lea</td>
            <td>Zimmermann</td>
            <td>lea.zimmermann@example.com</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Nina</td>
            <td>Schulz</td>
            <td>nina.schulz@example.com</td>
        </tr>
        <tr>
            <td>9</td>
            <td>Anna</td>
            <td>Becker</td>
            <td>anna.becker@example.com</td>
        </tr>
        <tr>
            <td>10</td>
            <td>Ben</td>
            <td>Schmidt</td>
            <td>ben.schmidt@example.com</td>
        </tr>
        <tr>


        </tbody>
    </table>
</div>
<footer class="footer_class">
    <div class = "footer-content">
        <div class="footer-element-left">©Web-Entwicklung Team 11 </div>
        <div class ="right-group">
            <div class ="footer-element-right">Impressum </div>
            <div class ="footer-element-right">Datenschutz </div>
            <div class ="footer-element-right">Kontakt</div>
        </div>
    </div>
</footer>
</body>
</html>