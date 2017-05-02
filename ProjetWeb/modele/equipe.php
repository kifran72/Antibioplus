<?php 
require_once '../../Connexion/Config.php';

    class equipe {
        
        function getEquipe(){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM equipe");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }

        function getEquipeByName($name){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM equipe WHERE Nom_Equipe LIKE '". $name ."%'");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }
        function deleteEquipeByName($id){
            return $id;
        }
    }
?>