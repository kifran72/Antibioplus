<?php

session_start();
if (!isset($_SESSION["Role"])) {

    header("location: ../../Connexion/Page-co.php?mes");
} else {
    if ($_SESSION["Role"] != 0) {
        header("location: ../../Connexion/Page-co.php?mes");
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Creer Antibio</title>
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
                    <a class="navbar-brand" href="../../Admin/Page-acceuil-admin.php">Antibioplus</a>
                </div>
                <ul class="nav navbar-nav">

                    <li><a href="../Utilisateur/Gestion-utilisateurs.php">Gestion utilisateurs</a></li>
                    <li><a href="../Utilisateur/Ajout-utilisateur-form.php">Ajout Utilisateur</a></li>
                    <li><a href="../Molecule/Ajout-molecule-form.php">Ajout Molecule</a></li>
                    <li class="active"><a href="#">Ajout Antibiotique</a></li>
                    <li><a href="../Bacterie/Ajout-bacterie-form.php">Ajout Bacterie</a></li>
                    <li><a href="../Utilisateur/Gestion-equipe-form.php">Gestion D'equipe</a></li>
                    <li><a href="../CreationEtudes/CreationEtudes.php">Création d'étude</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../Connexion/Deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <form action="Page-ajout-anti.php" method="post">
                <h1>Nouvel Antibiotique</h1><FONT color="red">
                 <?php
                    if(isset($_GET['er'])){
                        switch ($_GET["er"]) {
                            case "nom" :
                                echo ' <h3> Erreur : Nom non renseigné </h3><br> ';
                                break;
                            
                            default :
                                break;
                        }
                    }
                ?>
                </FONT>
                <div class="form-group">
                    <label for="Nom" class="control-label col-md-2">Nom</label>

                    <input type="text" name="Nom" id="Nom" class="form-control">
                </div>
                
                <input type="submit" value="Confimer" class="btn btn-success">
                <a href="../Page-acceuil-admin.php?mes=ann" class="btn btn-info">annuler</a></td>
            </form>
        </div>
    </body>
</html>

