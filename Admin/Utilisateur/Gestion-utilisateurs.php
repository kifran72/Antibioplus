
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
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestion utilisateurs</title>



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




</head>
<nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../Admin/Page-acceuil-admin.php?mes">Antibioplus</a>
                </div>
                <ul class="nav navbar-nav">

                    <li class="active"><a href="#">Gestion utilisateurs</a></li>
                    <li><a href="../Utilisateur/Ajout-utilisateur-form.php?er">Ajout Utilisateur</a></li>
                    <li><a href="../Molecule/Ajout-molecule-form.php?er">Ajout Molecule</a></li>
                    <li><a href="../Admin/Antibiotique/Ajout-antibiotique-form.php">Ajout Antibiotique</a></li>
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
        <h1>Gestion des utilisateurs</h1>
        <div class="container">
         <form class="navbar-form navbar-left col-xs-12 col-md-4 col-md-offset-4" method="post" action="Gestion-utilisateurs-form.php">
            <div class="form-group">
                <input type="text" class="form-control" name="find" placeholder="Recherche des utilisateurs">
                <button type="submit" class="btn btn-search">Ok</button>
            </div>

        </form>
        </div>
</div>

<form action="Gestion-utilisateurs.php" method="post">

    <div class="container">
                        <h2>Utilisateurs</h2>
                        <table class="table">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Mail</th>
                                    </tr>


                                

        <?php
        
        if(isset($_POST['action']) && !empty($_POST)){
            
            $id_personne = $_POST['id'];

            require_once '../../Admin/Utilisateur/DeleteUser.php';
            DeleteUser($id_personne);

            echo 'Personne supprimé !';
        }

            require_once '../../Connexion/Config.php';
            
               
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM personne");
            $req->execute();
            $resultat = $req->fetchAll();
            
        foreach ($resultat as $ligne) {
            echo '<tr>' .
                '<td>' . $ligne['Nom_Personne'] . '</td>' .
                '<td>' . $ligne['Prenom_Personne'] . '</td>' .
                '<td>' . $ligne['MAIL_Personne'] . '</td>' .
                '<td>' . '<form id="form-hidden" method="post" action="Gestion-utilisateurs.php">
						<input type="submit" name="action" value="X" class="btn btn-danger" />
						<input type="hidden" name="id" value="'.$ligne['ID_Personne'].'">
						<i id="supp" class="ion-android-close"></form></td></tr>';
                        
        }
        $db = null;
        ?>
    </table>
</div>
</form>
        
        


        
           
        
        </div>
    </div>
</body>

</html>
