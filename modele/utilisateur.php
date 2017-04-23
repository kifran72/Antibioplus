<?php 
require_once '../../Connexion/Config.php';

    class utilisateur {
        
        function getUtilisateurs(){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM personne");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }

        function fillInputUtilisateur($list_p){
            foreach($list_p as $utilisateur){
                echo "<option>".$utilisateur['Nom_Personne']."</option>";
            }
        }

    }