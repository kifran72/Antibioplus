<?php
session_start();
if (!isset($_SESSION["Role"])) {

    header("location: ../Connexion/Page-co.php?mes");
} else {
    if ($_SESSION["Role"] != 0) {
        header("location: ../Connexion/Page-co.php?mes");
    }
}
include_once '../Connexion/Config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Creer Etude</title>
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
        <script src="JSEtude.js" charset="utf-8"></script>
    </head>
    <body>

    <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../Admin/Page-acceuil-admin.php?mes">Antibioplus</a>
                </div>
                <ul class="nav navbar-nav">
                    
                    <li><a href="../Admin/Utilisateur/Gestion-utilisateurs.php?er">Gestion utilisateurs</a></li>
                    <li><a href="../Admin/Utilisateur/Ajout-utilisateur-form.php?er">Ajout Utilisateur</a></li>
                    <li><a href="../Admin/Molecule/Ajout-molecule-form.php?er">Ajout Molecule</a></li>
                    <li><a href="../Admin/Antibiotique/Ajout-antibiotique-form.php?er">Ajout Antibiotique</a></li>
                    <li><a href="../Admin/Bacterie/Ajout-bacterie-form.php?er">Ajout Bacterie</a></li>
                    <li><a href="../Admin/Equipe/Gestion-equipe-form.php?er">Gestion D'equipe</a></li>
                    <li class="active"><a href="#">Création d'étude</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../Connexion/Page-co.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <h1>Nouvelle Etude</h1>
            <h3>
            <FONT color="red">
            <?php
            switch ($_GET["er"]) {
                
                case "nom" :
                    echo 'Erreur : Nom non renseigné';
                    break;
                case "rat" :
                    echo 'une equipe unique par antibiotique';
                    break;
                case "mol":
                    echo 'pas de molecule selectionnée';
                    break;
                case "bac":
                    echo 'pas de bacterie selectionnée';
                    break;
                case "ant":
                    echo 'pas d\'antibiotique et equipe selectionnée';
                    break;
            }
            ?>
            </FONT>
            </h3>
            <br>
            
            
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

            <table id="tableaumol" class="table">
                <tr>
                    <th>Molecule</th>
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
            <table id="tableaubac" class="table">
                <tr>
                    <th>Bacterie</th>
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

                $reqeq = $db->prepare("SELECT * FROM equipe where En_Etude = 0 and Actif = 1");

                $reqeq->execute();

                $resultateq = $reqeq->fetchAll();

                foreach ($resultateq as $ligneeq) {
                    echo "<option value=" . $ligneeq["ID_Equipe"]. ">" . $ligneeq["Nom_Equipe"] . "</option>";
                }
                ?>

            </select>
            <input type="button" value="Ajouter" onclick="addant(document.getElementById('tableaubio'), document.getElementById('choixantibio').value, document.getElementById('choixeq').value);" />
              <table id="tableaubio" class="table">
                <tr>
                    <th>Antibiotique</th>
                    <th>Equipe</th>
                </tr>
            </table>

            <br>
            <br>
            <br>
            
            
            
            <br>
            <br>
            <form id="kanard" action="Page-Ajout-etude.php" method="post">
                <h4>Nom de l'etude</h4>
                <input type="text" name="Nom" placeholder="nom de l'etude">
                <br>
                <h4>date debut</h4>
                
                <input type="date" name="Debut" value="<?php echo date('Y-m-d'); ?>"/>
                <br>
                <h4>date fin</h4>
                
                <input type="date" name="Fin" value="<?php echo date('Y-m-d'); ?>"/>
                
                <input type="submit" value="Confimer" class="btn btn-success">
                <a href="../Admin/Page-acceuil-admin.php?mes=ann" class="btn btn-info">annuler</a></td>
            </form>
        </div>
    </body>
</html>
