<?php

session_start();
if (!isset($_SESSION["Role"])) {

    header("location: ../../Connexion/Page-co.php?mes");
} else {
    if ($_SESSION["Role"] != 0) {
        header("location: ../../Connexion/Page-co.php?mes");
    }
}
include "../../modele/molecule.php";

?>

    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="UTF-8">
        <title>Creer Molecule</title>
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../Admin/Page-acceuil-admin.php?mes">Antibioplus</a>
                </div>
                <ul class="nav navbar-nav">

                    <li><a href="../Utilisateur/Gestion-utilisateurs.php?er">Gestion utilisateurs</a></li>
                    <li><a href="../Utilisateur/Ajout-utilisateur-form.php?er">Ajout Utilisateur</a></li>
                    <li class="active"><a href="#">Ajout Molecule</a></li>
                    <li><a href="../Antibiotique/Ajout-antibiotique-form.php?er">Ajout Antibiotique</a></li>
                    <li><a href="../Bacterie/Ajout-bacterie-form.php?er">Ajout Bacterie</a></li>
                    <li><a href="../Utilisateur/Gestion-equipe-form.php?er">Gestion D'equipe</a></li>
                    <li><a href="../CreationEtudes/CreationEtudes.php?er">Création d'étude</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../../Connexion/Deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <form class="form" method="post">
                <h1>Nouvelle Molecule</h1>
                <div class="form-group">
                    <label for="Nom" class="control-label col-md-2">Nom</label>

                    <input type="text" name="add" id="add" class="form-control">
                </div>

                <input type="submit" value="Confimer" class="btn btn-success">
                <?php
                  if (isset($_POST['add']) && !empty($_POST))
                  {
                    $addMol = $_POST['add'];
                    $mol = new Molecule;
                    $addMolecule = $mol->addMolecule();

                    echo 'Molecule créée !';
                    }
                
                    
                ?>
            </form>
                <div class="container">
            <h1>Gestion des molecules</h1>
            <div class="container">
                <form class="form" method="post">
                    <div class="form-group container-fluid">
                        <div class="col-sm-3">
                            <label for="search-molecule">Rechercher une molecule</label>
                            <input type="text" class="form-control" id="search-molecule" placeholder="Nom molecule" name="molecule-name">
                        </div>
                        <div class="col-sm-4" style="margin-top: 25px;">
                            <button type="submit" class="btn btn-search">Rechercher</button>
                        </div>
                    </div>
                <?php
                if (isset($_POST['molecule-name']) && !empty($_POST)) {
                $molecule_name = $_POST['molecule-name'];
                $molecule = new Molecule;
                $listMolecule_recherche = $molecule->getMoleculeByName($molecule_name);
                
                echo "<div class=\"container\">\n";
                    echo "                        <table class=\"table\">\n";
                        echo "                                    <tr>";
                            echo "                                        <th>Nom molecule</th>";
                        echo "                                    </tr>";
                        
                        foreach ($listMolecule_recherche as $ligne) {
                        echo '<tr>' .
                            '<td>' . $ligne['Nom_Molecule'] . '</td>' .
                            '<td>' . '<form id="form-hidden" method="post" action="">
                                <input type="submit" name="action" value="X" class="btn btn-danger" />
                                <input type="hidden" name="id" value="'.$ligne['ID_Molecule'].'">
                            <i id="supp" class="ion-android-close"></form></td></tr>';
                            }
                        echo "</table>\n";
                    echo "</div>";
                    }
                    ?>
            </form>
        </div>
    </body>

    </html>
