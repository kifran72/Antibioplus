<?php

include_once '../../Connexion/config.php';

$Nom = $_POST["Nom"];

if ($Nom == "") {
    header("location: Ajout-molecule-form.php?er=nom");
    die();
}

$Souche = $_POST["Souche"];

if ($Souche == "") {
    header("location: Ajout-molecule-form.php?er=souche");
    die();
}

$test = FALSE;

$db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);

$reqtestB = $db->prepare("SELECT * FROM bacterie WHERE Nom_Bacterie=:nom");
$reqtestB->bindParam(":nom", $Nom);
$reqtestB->execute();
$resultat = $reqtestB->fetchAll();

if(count($resultat)==0) 
    {
        $reqB = $db->prepare("INSERT INTO Bacterie (Nom_Bacterie) VALUES (:nom)");
        $reqB->bindParam(":nom", $Nom);
        $reqB->execute();
        $ID = $db->lastInsertId();
        
    }
else 
    {
        $ID = intval($resultat[0]["ID_Bacterie"]);
        $reqtestS = $db->prepare("SELECT * FROM souche WHERE ID_Bacterie=:id and Numero =:num");
        $reqtestS->bindParam(":id", $ID);
        $reqtestS->bindParam(":num", $Souche);
        
        $reqtestS->execute();
        $resultatS = $reqtestS->fetchAll();
        if (count($resultatS)!=0){$test=TRUE;}
    }
    

if (!$test)
{
    $reqS = $db->prepare("INSERT INTO Souche (Numero, ID_Bacterie) VALUES (:num, :ID)");
    $reqS->bindParam(":num", $Souche);
    $reqS->bindParam(":ID", $ID);

    $reqS->execute();

    $reqS->errorInfo();

    if ($reqS->errorInfo()[0] == '00000') {
        header("location: ../Page-acceuil-admin.php?mes=bacok");
    }

    if ($reqS->errorInfo()[0] != '00000') {
        header("location: ../Page-acceuil-admin.php?mes=fail-bac");
    }
}
else {    header("location: ../Page-acceuil-admin.php?mes=fail-bac2");} 
 