<?php
session_start();
if (!isset($_SESSION["Role"])) {

    header("location: ../../Connexion/Page-co.php?mes");
} else {
    if ($_SESSION["Role"] != 1) {
        header("location: ../../Connexion/Page-co.php?mes");
    }
}
?>


    <html>

    <head>

        <head>
            <meta charset="UTF-8">
            <title>Etude en cous</title>
            <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
                crossorigin="anonymous">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
                crossorigin="anonymous">

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                crossorigin="anonymous"></script>

        </head>

        <body>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="../../Chercheur/Page-acceuil-chercheur.php">Antibioplus</a>
                    </div>
                    <ul class="nav navbar-nav">

                        <li><a href="../../Chercheur/GestionCompte/GestionCompte.php">Gestion du compte</a></li>
                        <li class="active"><a href="#">Etude en cours</a></li>
                        <li><a href="../../Chercheur/FindEtude/FindEtude.php">Recherche d'étude</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../../Connexion/Deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </nav>


            <div class="container">
                <select class="selectpicker" multiple>
                    <option>Mustard</option>
                    <option>Ketchup</option>
                    <option>Relish</option>
                </select>
            </div>
        </body>

    </html>