
<?php
session_start();
if (!isset($_SESSION["Role"])) {

    header("location: ../Connexion/Page-co.php?mes");
} else {
    if ($_SESSION["Role"] != 0) {
        header("location: ../Connexion/Page-co.php?mes");
    }
}
include_once '../../Connexion/Config.php';
?>

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


    <script src ="JSEtude.js" charset="utf-8"></script>
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
                <li><a href="../Utilisateur/Gestion-equipe-form.php?er">Gestion D'equipe</a></li>
                <li class="active"><a href="#">Création d'étude</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../Connexion/Deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
       <div class="container">

            <h1>Nouvelle Etude</h1><FONT color="red">
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
            <table id="tableaumol" class="table">
                <tr>
                    <th>Molecule</th>
                </tr>
            </table>
            
            <select id="choixmol">
                <?php
                
                $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);

                $reqmol = $db->prepare("SELECT * FROM molecule");

                $reqmol->execute();

                $resultatmol = $reqmol->fetchAll();

                foreach ($resultatmol as $lignemol) {
                    echo "<option value=" . $lignemol["ID_Molecule"]. ">" . $lignemol["Nom_Molecule"] . "</option>";
                }

                ?>

            </select>
            <input type="button" value="Ajouter" onclick="addmol(document.getElementById('tableaumol'), document.getElementById('choixmol').value);" />

            <table id="tableaubac" class="table">
                <tr>
                    <th>Bacterie</th>
                </tr>
            </table>
            
            <select id="choixbac">
                <?php

                $reqbac = $db->prepare("SELECT * FROM souche");

                $reqbac->execute();

                $resultatbac = $reqbac->fetchAll();

                foreach ($resultatbac as $lignebac) {
                    echo "<option value=" . $lignebac["ID_Souche"]. ">" . $lignebac["Numero"] . "</option>";
                }
                ?>

            </select>
            <input type="button" value="Ajouter" onclick="addbac(document.getElementById('tableaubac'), document.getElementById('choixbac').value);" />

            <table id="tableaubio" class="table">
                <tr>
                    <th>Antibiotique</th>
                    <th>Equipe</th>
                </tr>
            </table>

            <select id="choixantibio">
                <?php

                $reqbio = $db->prepare("SELECT * FROM antibiotique");

                $reqbio->execute();

                $resultatbio = $reqbio->fetchAll();

                foreach ($resultatbio as $lignebio) {
                    echo "<option value=" . $lignebio["ID_Antibiotique"]. ">" . $lignebio["Nom_Antibiotique"] . "</option>";
                }
                ?>

            </select> <select id="choixeq">
                <?php
                $reqeq = $db->prepare("SELECT * FROM equipe");
                $reqeq->execute();
                $resultateq = $reqeq->fetchAll();

                foreach ($resultateq as $ligneeq) {
                    echo "<option value=" . $ligneeq["ID_Equipe"]. ">" . $ligneeq["Nom_Equipe"] . "</option>";
                }
                ?>

            </select>
            <input type="button" value="Ajouter" onclick="addant(document.getElementById('tableaubio'), document.getElementById('choixantibio').value, document.getElementById('choixeq').value);" />
            <br>
            <br>
            <br>
            
            <input type="text" name="Nom" placeholder="nom de l'etude"/>
            
            <br>
            <br>
            <form id="kanard" action="Page-Ajout-etude.php" method="post">
                <input type="submit" value="Confimer" class="btn btn-success">
                <a href="../Admin/Page-acceuil-admin.php?mes=ann" class="btn btn-info">annuler</a></td>
            </form>
        </div>

</body>


</html>
