<?php 
require_once '../../Connexion/Config.php';

    class Antibiotique {
        
        function getAntibio(){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM antibiotique");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }
    
        function getAntibioByName($name){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM antibiotique WHERE Nom_Antibiotique LIKE '". $name ."%'");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }
        function deleteAntibioByName($id){
            return $id;
        }
    }
?>