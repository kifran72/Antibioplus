<html>

<head>
    <meta charset="UTF-8">
    <title>Creation d'études</title>
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
                <a class="navbar-brand" href="../../Admin/Page-acceuil-admin.php">Antibioplus</a>
            </div>
            <ul class="nav navbar-nav">

                <li><a href="../Utilisateur/Gestion-utilisateurs.php">Gestion utilisateurs</a></li>
                <li><a href="../Utilisateur/Ajout-utilisateur-form.php">Ajout Utilisateur</a></li>
                <li><a href="../Molecule/Ajout-molecule-form.php">Ajout Molecule</a></li>
                <li><a href="../Antibiotique/Ajout-antibiotique-form.php">Ajout Antibiotique</a></li>
                <li><a href="../Bacterie/Ajout-bacterie-form.php">Ajout Bacterie</a></li>
                <li><a href="../Utilisateur/Gestion-equipe-form.php">Gestion D'equipe</a></li>
                <li class="active"><a href="#">Création d'étude</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../Connexion/Deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

   <form action="CreationEtudes-form.php" class="navbar-form navbar-left">
        <h2>Creation d'étude</h2>


        <div class="form-group">
        <label for="CreatTeam">
                Nom de l'étude:
            </label>
        <input type="text" class="form-control" name="Nom_Etude">
        </div>


        <div class="form-group">
        <label for="CreatTeam">
                Numéro de l'équipe:
            </label>
        <input type="text" class="form-control" name="Nbr_Equipe">
        <input type="submit" class="btn btn-default" value="Ok">
        </div>

        <div class="form-group">
        <label for="CreatTeam">
                Nombre d'antibiotique:
            </label>
        <input type="text" class="form-control" name="Nbr_Equipe">
        <input type="submit" class="btn btn-default" value="Ok">
        </div>

        <div class="form-group">
        <label for="CreatTeam">
                Nombre de Molecule:
            </label>
        <input type="text" class="form-control" name="Nbr_Equipe">
        <input type="submit" class="btn btn-default" value="Ok">
        </div>

        <div class="form-group">
        <label for="CreatTeam">
                Nombre de bacterie:
            </label>
        <input type="text" class="form-control" name="Nbr_Equipe">
        <input type="submit" class="btn btn-default" value="Ok">
        </div>
    </div>
   </form>


<div class="container">
            <h1>Gestion des equipes</h1>

            
        <form action="Gestion-utilisateurs.php" method="post">

        <div class="container">
                        <h2>Equipes disponible</h2>
                        <table class="table">
                                    <tr>
                                        <th>Nom equipe</th>
                                        <th>Nombres chercheurs</th>
                                    </tr>
                    <?php
                    
                    
                    if (isset($_POST['action']) && !empty($_POST)) {
                        $id_personne = $_POST['id'];

                        require_once '../../Admin/Utilisateur/DeleteUser.php';
                        DeleteUser($id_personne);

                        echo 'Equipe supprimé !';
                    }
                    require_once '../../Connexion/Config.php';

                    $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);

                    $req = $db->prepare("SELECT * FROM equipe, personne");

                    $req->execute();

                    $resultat = $req->fetchAll();

                    foreach ($resultat as $ligne) {
                        echo '<tr>' .
                                '<td>' . $ligne['Nom_Equipe'] . '</td>' .
                                '<td>' . $ligne['Nom_Equipe'] . '</td>' .
                                '<td>' . '<form id="form-hidden" method="post" action="Gestion-utilisateurs.php">
                                        <input type="submit" name="action" value="X" class="btn btn-danger" />
                                        <input type="hidden" name="id" value="'.$ligne['ID_Equipe'].'">
                                        <i id="supp" class="ion-android-close"></form></td></tr>';


                    }

        ?>


                        </td>
            </div>


</body>

</html>
