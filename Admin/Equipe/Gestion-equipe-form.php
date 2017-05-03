
<?php
session_start();

if (!isset($_SESSION["Role"])) {

    header("location: ../../../Connexion/Page-co.php?mes");
} else {
    if ($_SESSION["Role"] != 0) {
        header("location: ../../../Connexion/Page-co.php?mes");
    }
}
?>
<!DOCTYPE html>

<html>
    <head>
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

        <meta charset="UTF-8">
        <title>Gestion Equipe</title>
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
                    <li><a href="../Antibiotique/Ajout-antibiotique-form.php?er">Ajout Antibiotique</a></li>
                    <li><a href="../Bacterie/Ajout-bacterie-form.php?er">Ajout Bacterie</a></li>
                    <li class="active"><a href="#">Gestion D'equipe</a></li>
                    <li><a href="../../Etude/Creation-etude-form.php?er">Création d'étude</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../../Connexion/Deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>

        <h1>GESTION EQUIPE</h1>
        <?php
        switch ($_GET["er"]) {
            case "per":
                echo 'Aucune personne selectionnée';
                break;
            case "OP":
                echo 'Aucune action selectionnée';
                break;
            case "nom":
                echo 'Pas de nom pour la nouvelle equipe';
                break;
            case "act":
                echo 'Equipe en cours d\'etude, modification imposible';
        }
        ?>
        <div class="container">
            <form action="modification-equipe.php" method="post">
                <h3>Chercheur sans equipe</h3>
                <?php
                include_once '../../Connexion/Config.php';

                $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);

                $req = $db->prepare("SELECT Nom_Personne, Prenom_Personne, ID_Personne FROM personne WHERE ISNULL(ID_Equipe) and Role_Personne = 1");

                $req->execute();

                $resultat = $req->fetchAll();

                foreach ($resultat as $ligne) {
                    echo $ligne["Nom_Personne"] . ' ' . $ligne["Prenom_Personne"] . '<input type=checkbox name=Pers[] value=' . $ligne["ID_Personne"] . '> <br>';
                }
                ?>

                <h3>EQUIPE</h3>
                <?php
                
                $reqeq = $db->prepare("SELECT * FROM equipe");

                $reqeq->execute();

                $resultateq = $reqeq->fetchAll();

                foreach ($resultateq as $ligneeq) {
                    if($ligneeq["Actif"]==1){
                    echo '<h4>' . $ligneeq["Nom_Equipe"]."   ";
                    if ($ligneeq["En_Etude"]==1){
                        echo 'en etude  ';
                    }
                    echo '<a href="supprimerEquipe.php?id=' . $ligneeq["ID_Equipe"] . '" class="btn btn-danger glyphicon glyphicon-remove"></a></h4>';
                    echo '<br>';
                    $reqP = $db->prepare("SELECT Nom_Personne, Prenom_Personne, ID_Personne FROM personne WHERE ID_Equipe=:ide");

                    $reqP->bindParam(":ide", $ligneeq["ID_Equipe"]);
                    $reqP->execute();
                    $resultatP = $reqP->fetchAll();

                    
                    
                    foreach ($resultatP as $ligneP) {
                        echo $ligneP["Nom_Personne"] . ' ' . $ligneP["Prenom_Personne"] . '<input type=checkbox name=Pers[] value=' . $ligneP["ID_Personne"] . '> <br>';
                    }

                    echo '<br><br><br><br><br>';
                }
                }
                $db=null;
                ?>

                <h3>Operation :</h3>
                <input type=radio name=OP value="supp"> Retirer de/des equipe(s)
                <br>
                <input type=radio name=OP value="Add"> Ajouter à l'equipe 
                <select id="eq" name="eq">
                    <?php
                    foreach ($resultateq as $ligneeq) {
                        echo "<option value=" . $ligneeq["ID_Equipe"] . ">" . $ligneeq["Nom_Equipe"] . "</option>";
                    }
                   
                    ?>
                </select>
                <br>
                <input type="radio" name="OP" value="New"> Creer nouvelle equipe avec chercheur(s) selectioné(s)
                <input type="text" name="NewEq" placeholder="Nom de la nouvelle équipe">
                <br>
                <br>
                <br>
                <br>

                <input type="submit" value="Confimer" class="btn btn-success">
                <a href="../../Page-acceuil-admin.php?mes" class="btn btn-info">retour</a>
            </form>
        </div>
    </body>
</html>
