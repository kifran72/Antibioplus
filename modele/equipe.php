<?php
require_once '../../Connexion/Config.php';

    class Equipe {
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
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("DELETE FROM equipe WHERE ID_Equipe='". $id ."'");
            $req->execute();

            return true;
        }
        function addEquipe($name){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("INSERT INTO equipe(Nom_Equipe, Actif, En_Etude) VALUES('".$name."', '1', '0')");

            if($req->execute()){
                $id = $db->lastInsertId();
                return $id;
            } else {
                return false;
            }
        }
    }
?>