
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
include_once '../../modele/etude.php';
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

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>


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

            <h1>Nouvelle Etude</h1><font color="red">
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
            </font>
            
            <div class="container">
                <h3>Création d'une étude</h3>
                <div class="container">
                    <form class="form" method="post" action="">
                    <div class="form-group container-fluid ">
                        <div class="col-sm-6">
                                <label for="date-begin">Date de début</label>
                                <input type="text" name="date-begin" class="form-control" id="date-begin" placeholder="Placer la date du début de l'étude sous la forme JJ/MM/AAAA">
                            </div>
                    </div>
                        <div class="form-group container-fluid ">
                            <div class="col-sm-8">
                                <label for="nommol">Molécule</label>
                                <select name="nommol" id="nommol" class="selectpicker">
                                    <?php
                                        $etude = new etude;

                                        $list_mol = $etude->getMolecule();

                                        $etude->fillInput($list_mol, "Nom_Molecule");
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group container-fluid ">
                            <div class="col-sm-8">
                                <label for="nommol">Bactérie</label>
                                <select name="nommol" id="nommol" class="selectpicker">
                                    <?php
                                        $etude = new etude;

                                        $list_bac = $etude->getBacterie();

                                        $etude->fillInput($list_bac, "Nom_Bacterie");
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

</body>


</html>
