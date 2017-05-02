<?php 
require_once '../../Connexion/Config.php';

    class Bacterie {
        
        function getBacterie(){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM bacterie");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }
        function addBacterie(){
             $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
             $req = $db->prepare("INSERT INTO Bacterie (Nom_Bacterie) VALUES (:nom)");
             $req->bindParam(":nom", $Nom);
             $req->execute();
             $resultat = $req->fetchAll();

        }
        function getBacterieByName($name){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM bacterie WHERE Nom_Bacterie LIKE '". $name ."%'");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }
        function deleteBacterieByName($id){
            return $id;
        }
    }
?>