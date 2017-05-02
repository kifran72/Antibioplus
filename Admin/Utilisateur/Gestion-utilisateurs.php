
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

<?php  
    include("../default/head.html");
?>

<body>

<?php
    include("../default/navbar.html");
?>

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
