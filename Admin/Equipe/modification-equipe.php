<?php

include_once '../../../Connexion/Config.php';


if (!isset($_POST["Pers"])) {
    header("location: Gestion-equipe-form?er=per");
    die;
} else {
    foreach ($_POST["Pers"] as $p) {
        $suj[] = $p;
    }
}

if (!isset($_POST["OP"])) {

    header("location: Gestion-equipe-form?er=OP");
    die;
} else {
    $Opp = $_POST["OP"];
}


if ($Opp == "supp") {

$db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);

    $req = $db->prepare("UPDATE Personne SET ID_Equipe = NULL WHERE ID_Personne =:ID");

    foreach ($suj as $pers) {

        $req->bindParam(":ID", $pers);
        $req->execute();  
        $db=null;
        }
        header("location: Gestion-equipe-form?er");
        die;
        
}

if ($Opp == "Add"){
    
$db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);

    $IDeq = $_POST["eq"];
    $req = $db->prepare("UPDATE Personne SET ID_Equipe =:IDeq WHERE ID_Personne=:IDp");
    $req->bindParam("IDeq", $IDeq);
    
    foreach ($suj as $pers) {

        $req->bindParam(":IDp", $pers);
        $req->execute();  
        }
        $updTeam = $db->prepare("UPDATE equipe SET Actif = 1 WHERE ID_Equipe = :IDeq");
        $updTeam->bindParam("IDeq", $IDeq);
        $updTeam->execute();
        $db=null;
        header("location: Gestion-equipe-form?er");
        die;
    
}

if ($Opp == "New"){
    $NewNom = $_POST["NewEq"];
    if ($NewNom == ""){
        header("location: Gestion-equipe-form?er=nom");
        die;
    }
    
$db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);

    $req = $db->prepare("INSERT INTO `equipe`(`Nom_Equipe`) VALUES (:Nom)");
    $req->bindParam(":Nom", $NewNom);
    $req->execute();
    $IDNew = $db->lastInsertId();
        
    $reqP = $db->prepare("UPDATE Personne SET ID_Equipe =:IDeq WHERE ID_Personne=:IDp");
    $reqP->bindParam("IDeq", $IDNew);
    
    foreach ($suj as $pers) {

        $reqP->bindParam(":IDp", $pers);
        $reqP->execute();  
        }
        $db=null;
        header("location: Gestion-equipe-form?er");
        die;
    
    
}