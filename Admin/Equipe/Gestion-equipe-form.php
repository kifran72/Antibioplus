<?php
session_start();

if (!isset($_SESSION["Role"])) {
    
    header("location: ../../../Connexion/Page-co.php?mes");
} else {
    if ($_SESSION["Role"] != 0) {
        header("location: ../../../Connexion/Page-co.php?mes");
    }
}
include "../../modele/equipe.php";
include "../../modele/utilisateur.php";
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


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>

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
          <li class="active"><a href="../Equipe/Gestion-equipe-form.php?er">Gestion D'equipe</a></li>
          <li><a href="../../Etude/Creation-etude-form.php?er">Création d'étude</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../../Connexion/Deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <form action="" method="post">
        <h1>Nouvelle équipe</h1>
        <FONT color="red">
<?php

////////////////////
// BOUCLE DE TEST //
////////////////////
if(isset($_POST['ajouter-equipe']) && !empty($_POST)){
    if(isset($_POST['nom_equipe']) && $_POST['nom_equipe'] != ""){ // Test si l'on a bien rempli le champs pour le nom de l'équipe
        if(isset($_POST['users'])){ // Test si l'on a bien selectionné un ou des utilisateurs
            $equipe = $_POST['nom_equipe']; 
            // Stock l'information (de type string ici) concernant le nom de l'équipe saisi au préalable
            // ici "nom_equipe" correspond à l'attribut "name" de l'input concernant le nom de l'équipe

            $users = $_POST['users'];
            // Stock l'information (de type array ici) concernant le ou les personnes choisis au préalable
            // ici "users" correspond à l'attribut "users[]" de l'input (<select>) concernant la liste de ou des personnes
            // Pour voir ce que contient le tableau users, la fonction "var_dump($VARIABLE)" peut être utilisé ;) (juste en dessous par exemple)
          

            ///// Facultatif //////
            // var_dump($users); //
            ///// Facultatif //////


            $utilisateur_class = new Utilisateur; // Initialisation de la classe Utilisateur (sans constructeur).
            $equipe_class = new Equipe; // Initialisation de la classe Equipe (sans constructeur).

            $last_id = $equipe_class->addEquipe($equipe); 
            // Stockage du retour de la méthode "addEquipe" de la classe Equipe
            // Type du retour : string 
            // Caractéristique du retour : L'ID de la dernière insertion effectué pour pouvoir récupérer l'id de la nouvelle équipe et pouvoir la réutiliser ensuite

            if($last_id){ // Si la méthode "addEquipe" retourne bien quelque chose (tout sauf un false), en l'occurence ici un string
                echo "L'équipe <b>".$equipe."</b> viens d'être crée avec succès ! -- ".$last_id; // Compréhensible...

                foreach($users as $user){  // Ici nous balayons la liste et utilisons chaque élément de celle-ci en les stockant dans une variable local "$user"
                    $utilisateur_class->associerUtilisateurEquipe($user, $last_id); // Modification de la colonne 'ID_Equipe' de la table 'personne' avec l'id de l'équipe dernièrement crée
                }
            }
            else {
                echo 'Un problème viens de se produire, impossible d\'ajouter l\'équipe.'; // Se passe de commentaire...
            }
        } else {
            echo "Aucun utilisateur selectionné"; // Se passe de commentaire...
        }

    } else {
        echo "Aucun nom d'équipe spécifié"; // Se passe de commentaire...
    }
}
////////////////////
// BOUCLE DE TEST //
////////////////////

?>
</FONT>
        <div class="form-group">
          <label for="nom_equipe" class="control-label col-md-2">Nom</label>

          <input type="text" name="nom_equipe" id="nom_equipe" class="form-control">
        </div>
        <div class="form-group">
          <label for="users" class="control-label col-md-2">Personne(s)</label>

          <select class="selectpicker" data-width="25%" multiple title="Choisir un/des utilisateur(s)..." name="users[]" id="users">
                <?php
                    $ut = new Utilisateur;

                    $list_ut = $ut->getUtilisateurs();

                    $ut->fillInputUtilisateur($list_ut);
                ?>
            </select>
        </div>

        <input type="submit" value="Confimer" class="btn btn-success" name="ajouter-equipe">

      </form>
    </div>

    <div class="container">
      <h1>Gestion des équipes</h1>
      <div class="container">
        <form class="form" method="post">
          <div class="form-group container-fluid">
            <div class="col-sm-3">
              <label for="search-bacterie">Rechercher une équipe</label>
              <input type="text" class="form-control" id="search-equipe" placeholder="Nom de l'équipe" name="nom-equipe">
            </div>
            <div class="col-sm-4" style="margin-top: 25px;">
              <button type="submit" class="btn btn-search">Rechercher</button>
            </div>
          </div>
        </form>
        <?php
            if(isset($_POST['suppr_equipe']) && isset($_POST['ID_Equipe']) && isset($_POST['recherche_equipe'])){
                $ID_Equipe = $_POST['ID_Equipe'];
                $recherche = $_POST['recherche_equipe'];

                $equipe = new Equipe;

                $equipe->deleteEquipeByName($ID_Equipe);

                $_POST['nom-equipe'] = $recherche;
            }
            if (isset($_POST['nom-equipe']) && !empty($_POST)) {
                $nom_equipe = $_POST['nom-equipe'];
                $equipe = new Equipe;
                $list_equipe = $equipe->getEquipeByName($nom_equipe);
                
                echo "<div class=\"container\">\n";
                echo "                        <table class=\"table\">\n";
                echo "                                    <tr>";
                echo "                                        <th>Nom de(s) l'équipe(s)</th>";
                echo "                                    </tr>";
                
                foreach ($list_equipe as $ligne) {
                    echo '<tr>' .
                    '<td>' . $ligne['Nom_Equipe'] . '</td>' .
                    '<td>' . '<form id="form-hidden" method="post" action="">
                    <input type="submit" name="suppr_equipe" value="X" class="btn btn-danger" />
                    <input type="hidden" name="ID_Equipe" value="'.$ligne['ID_Equipe'].'">
                    <input type="hidden" name="recherche_equipe" value="'.$nom_equipe.'">
                    <i id="supp" class="ion-android-close"></form></td></tr>';
                }
                echo "</table>\n";
                echo "</div>";
            }
        ?>
      </div>
    </div>
  </body>

  </html>