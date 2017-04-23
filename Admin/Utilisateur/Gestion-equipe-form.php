<?php
session_start();
if (!isset($_SESSION["Role"])) {
header("location: ../../Connexion/Page-co.php?mes");
} else {
if ($_SESSION["Role"] != 0) {
header("location: ../../Connexion/Page-co.php?mes");
}
}

require_once("../../modele/utilisateur.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <script src="../default/main.js"></script>
        <link rel="stylesheet" href="../default/main.css">
        <meta charset="UTF-8">
        <title>Gestion Equipe</title>
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
                    <li><a href="../Antibiotique/Ajout-antibiotique-form.php">Ajout Antibiotique</a></li>
                    <li><a href="../Bacterie/Ajout-bacterie-form.php">Ajout Bacterie</a></li>
                    <li class="active"><a href="#">Gestion D'equipe</a></li>
                    <li><a href="../CreationEtudes/CreationEtudes.php">Création d'étude</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../Connexion/Deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <h1>Gestion des équipes</h1>
            <div class="container">
                <form>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Rechercher une équipe</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                    </div>
                </form>
            </div>
        </div>                
        <div class="container">
            <h3>Créer une équipe</h3>
            <div class="container">
                <form class="form" method="post" action="Gestion-utilisateurs-form.php">
                    <div class="form-group">
                        <label for="nomequipe">Example label</label>
                        <input type="text" class="form-control" id="nomequipe" placeholder="Nom équipe">
                    </div>
                    <div class="form-group form-ajout-equipe">
                        <label style="margin-right: 5px;">Ajouter des membres</label><span class="glyphicon glyphicon-plus-sign" id="ajout_bouton" style="font-size: 1.2em;" aria-hidden="true"></span>
                        <select class="form-control" id="sel1">
                        
                        <?php
                            $utilisateurs = new utilisateur;

                            $list_utilisateurs = $utilisateurs->getUtilisateurs();

                            $utilisateurs->fillInputUtilisateur($list_utilisateurs);
                        ?>
                        
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
        <script src="../app/js/ajout_personne_equipe.js"></script>
    </body>
    </html>