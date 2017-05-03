<?php

session_start();
if (!isset($_SESSION["Role"])) {

    header("location: ../../Connexion/Page-co.php?mes");
} else {
    if ($_SESSION["Role"] != 0) {
        header("location: ../../Connexion/Page-co.php?mes");
    }
}

include "../../modele/antibiotique.php";
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Antibiotique</title>
        <script
            src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous"></script>
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
                    <li><a href="../Molecule/Ajout-molecule-form.php?er">Ajout Molecule</a></li>
                    <li class="active"><a href="#">Ajout Antibiotique</a></li>
                    <li><a href="../Bacterie/Ajout-bacterie-form.php?er">Ajout Bacterie</a></li>
                    <li><a href="../Equipe/Gestion-equipe-form.php?er">Gestion D'equipe</a></li>
                    <li><a href="../../Etude/Creation-etude-form.php?er">Création d'étude</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../../Connexion/Deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <form action="Page-ajout-anti.php" method="post">
                <h1>Nouvel Antibiotique</h1><FONT color="red">
                 <?php
                  
                ?>
                </FONT>
                <div class="form-group">
                    <label for="Nom" class="control-label col-md-2">Nom</label>

                    <input type="text" name="Nom" id="Nom" class="form-control">
                </div>
                
                <input type="submit" value="Confimer" class="btn btn-success">
            </form>
        </div>
    
         <div class="container">
            <h1>Gestion des antibiotiques</h1>
            <div class="container">
                <form class="form" method="post">
                    <div class="form-group container-fluid">
                        <div class="col-sm-3">
                            <label for="search-antibio">Rechercher un antibiotique</label>
                            <input type="text" class="form-control" id="search-antibio" placeholder="Nom antibiotique" name="antibio-name">
                        </div>
                        <div class="col-sm-4" style="margin-top: 25px;">
                            <button type="submit" class="btn btn-search">Rechercher</button>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['antibio-name']) && !empty($_POST)) {
                $antibio_name = $_POST['antibio-name'];
                $antibio = new Antibiotique;
                $listantibio_recherche = $antibio->getAntibioByName($antibio_name);
                
                echo "<div class=\"container\">\n";
                    echo "                        <table class=\"table\">\n";
                        echo "                                    <tr>";
                            echo "                                        <th>Nom antibiotique</th>";
                        echo "                                    </tr>";
                        
                        foreach ($listantibio_recherche as $ligne) {
                        echo '<tr>' .
                            '<td>' . $ligne['Nom_Antibiotique'] . '</td>' .
                            '<td>' . '<form id="form-hidden" method="post" action="">
                                <input type="submit" name="action" value="X" class="btn btn-danger" />
                                <input type="hidden" name="id" value="'.$ligne['ID_Antibiotique'].'">
                            <i id="supp" class="ion-android-close"></form></td></tr>';
                            }
                        echo "</table>\n";
                    echo "</div>";
                    }
                    ?>
                    
                </div>
            </div>
    </body>
</html>

