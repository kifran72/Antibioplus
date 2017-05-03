<?php 
require_once '../../Connexion/Config.php';

    class Utilisateur {
        function getUtilisateurs(){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM personne");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }
        function fillInputUtilisateur($list_p){
            foreach($list_p as $utilisateur){
                echo "<option value='".$utilisateur['ID_Personne']."'>".$utilisateur['Nom_Personne']."</option>";
            }
        }
        function associerUtilisateurEquipe($userId, $equipeId){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("UPDATE personne SET ID_Equipe = '". $equipeId ."' WHERE ID_Personne='". $userId ."'");

            if($req->execute()){
                return true;
            }
            else {
                return false;
            }
        }
    }
?>