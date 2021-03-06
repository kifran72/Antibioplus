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
        <title>Creer Utilisateur</title>
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
                    <li class="active"><a href="#">Ajout Utilisateur</a></li>
                    <li><a href="../Molecule/Ajout-molecule-form.php?er">Ajout Molecule</a></li>
                    <li><a href="../Antibiotique/Ajout-antibiotique-form.php?er">Ajout Antibiotique</a></li>
                    <li><a href="../Bacterie/Ajout-bacterie-form.php?er">Ajout Bacterie</a></li>
                    <li><a href="../Equipe/Gestion-equipe-form.php?er">Gestion D'equipe</a></li>
                    <li><a href="../../Etude/Creation-etude-form.php?er">Création d'étude</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../../Connexion/Deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
        <div class="container">
        <div class="row">
            <form action="Page-Ajout-ut.php" method="post" class="col-xs-12 col-md-4 col-md-offset-4">
                <h1>Nouvel Utilisateur</h1>
                <FONT color="red">
                    <?php
                switch ($_GET["er"]) {
                    case "mdp-0" :
                        echo ' <h3> Erreur : mot de passe non renseigné </h3><br> ';
                        break;
                    case "mdp-1" :
                        echo ' <h3> Erreur : Confirmation mot de passe </h3><br> ';
                        break;
                    case "role" :
                        echo ' <h3> Erreur : Role non renseigné </h3><br> ';
                        break;
                    case "nom" :
                        echo ' <h3> Erreur : Nom non renseigné </h3><br> ';
                        break;
                    case "prenom" :
                        echo ' <h3> Erreur : Prenom non renseigné </h3><br> ';
                        break;
                    case "mail" :
                        echo ' <h3> Erreur : Email non renseigné </h3><br> ';
                        break;
                    default :
                        break;
                }
                ?>
                </FONT>
                <div class="form-group">
                    <label for="Nom" class="control-label">Nom</label>

                    <input type="text" name="Nom" id="Nom" class="form-control">

                </div>
                <div class="form-group">
                    <label for="Prenom" class="control-label">Prenom</label>

                    <input type="text" name="Prenom" id="Prenom" class="form-control">

                </div>
                <div class="form-group">
                    <label for="Mail" class="control-label">Email</label>

                    <input type="text" name="Mail" id="Mail" class="form-control">

                </div>
                <div class="form-group">
                    <label for="MDP" class="control-label">Mot de passe</label>

                    <input type="password" name="MDP" id="MDP" class="form-control">
                </div>

                <div class="form-group">
                    <label for="MDP" class="control-label">Confirmer Mot de passe</label>

                    <input type="password" name="MDP-conf" id="MDP-conf" class="form-control">

                </div>
                <label for="Admin" class="control-label">Administrateur </label>

                <input type="radio" name="Role" value="Admin" id="Admin" class="rounded-circle">

                <label for="Chercheur" class="control-label">Checheur </label>
                <input type="radio" name="Role" value="Chercheur" id="Chercheur" class="rounded-circle">

                <br>
                <input type="submit" value="Confimer" class="btn btn-success">
                <a href="../Page-acceuil-admin.php?mes=ann" class="btn btn-info">annuler</a></td>
            </form>
            </div>
            </div>
        </div>
    </body>

    </html>
