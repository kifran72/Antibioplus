<?php
session_start();

if (!isset($_SESSION["Role"])) {

    header("location: ../Connexion/Page-co.php?mes");
} else {
    if ($_SESSION["Role"] != 0) {
        header("location: ../Connexion/Page-co.php?mes");
    }
}
?>
    <!DOCTYPE html>

    <html>

    <head>
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="/vue/Aceuil.css">
        <title>Acceuil Admin</title>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../Admin/Page-acceuil-admin.php">Antibioplus</a>
                </div>
                <ul class="nav navbar-nav">
                    
                    <li><a href="../Admin/Utilisateur/Gestion-utilisateurs.php?er">Gestion utilisateurs</a></li>
                    <li><a href="../Admin/Utilisateur/Ajout-utilisateur-form.php?er">Ajout Utilisateur</a></li>
                    <li><a href="../Admin/Molecule/Ajout-molecule-form.php">Ajout Molecule</a></li>
                    <li><a href="../Admin/Antibiotique/Ajout-antibiotique-form.php">Ajout Antibiotique</a></li>
                    <li><a href="../Admin/Bacterie/Ajout-bacterie-form.php">Ajout Bacterie</a></li>
                    <li><a href="../Admin/Utilisateur/Gestion-equipe-form.php">Gestion D'equipe</a></li>
                    <li><a href="../Admin/CreationEtudes/CreationEtudes.php">Création d'étude</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../Connexion/Page-co.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>

        <h5>
            <?php
        echo $_SESSION["Nom"];
        echo '<br>';
        echo $_SESSION["Prenom"];
        echo '<br>';
        if($_SESSION["Role"]){echo 'Chercheur';}
        else{echo 'admin';}        
        echo '<br>';
        echo '<br>';
        echo '<br>';
        switch ($_GET["mes"]) {
            case "bvn":
                echo '  <div class="alert alert-success">
                            <strong>Bienvenue !</strong> Bonne recherche  
                        </div>';
                break;
            
            case "utok":
                echo 'Utilisateur Créé';
                break;
            case "fail-ut":
                echo 'Echec Création Utilisateur';
                break;
            
            case "molok":
                echo 'Molecule Créé';
                break;
            case "fail-mol":
                echo 'Echec Création Molecule';
                break;
            
            case "bacok":
                echo 'Bacterie Créé';
                break;
            case "fail-bac":
                echo 'Echec Création Bacterie';
                break;
            
            case "fail-bac2":
                echo 'Echec Création Bacterie - souche deja créée';
                break;
            
            case "antiok":
                echo 'antibio créé';
                break;
            
            case "fail-anti":
                echo 'Echec Création antibio';
                break;
            
            case "ann":
                echo 'Annulation';
                break;
        }
        ?>
        </h5>

    </body>

    </html>
