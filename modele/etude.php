<?php 
require_once '../../Connexion/Config.php';

    class etude {

        function getBacterie(){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM bacterie");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }

        function getMolecule(){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM molecule");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }

        function getEquipe(){
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
            $req = $db->prepare("SELECT * FROM equipe");
            $req->execute();
            $resultat = $req->fetchAll();

            return $resultat;
        }   
        
        function fillInput($list_p, $nom_index){
            foreach($list_p as $unite_p){
                echo "<option>".$unite_p[$nom_index]."</option>";
            }
        }
    }
?>