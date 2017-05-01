<?php 
require_once '../../Connexion/Config.php';

    class Molecule {
        
        function addMolecule()
        {
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("INSERT INTO molecule (Nom_Molecule) VALUES (:nom)");
            $req->bindParam(":nom", $Nom);
            $req->execute();
            
        }
        function getMolecule(){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM molecule");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }
    
        function getMoleculeByName($name){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM molecule WHERE Nom_Molecule LIKE '". $name ."%'");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }
        function deleteAntibioByName($id){
            return $id;
        }
    }
?>