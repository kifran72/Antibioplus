<?php

session_start();

if (!isset($_SESSION["Role"])) {

    header("location: ../../../Connexion/Page-co.php?mes");
    die;
} else {
    if ($_SESSION["Role"] != 0) {
        header("location: ../../../Connexion/Page-co.php?mes");
        die;
    }
}

$ID = $_GET["id"];


include_once '../../../Connexion/Config.php';

$db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);

$Test = $db->prepare("SELECT Actif FROM equipe WHERE ID_Equipe =:ID ");
$Test->bindParam(":ID", $ID);
$Test->execute();
$resTest = $Test->fetchAll();

if($resTest[0]["Actif"]==1){

    header("location: Gestion-equipe-form.php?er=act");
    die;
}


$reqP = $db->prepare("SELECT ID_Personne FROM personne WHERE ID_Equipe =:ID ");

$reqP->bindParam(":ID", $ID);

$reqP->execute();

$resultatP = $reqP->fetchAll();


    $reqUp = $db->prepare("UPDATE personne SET ID_Equipe = NULL WHERE ID_Personne =:ID");


foreach ($resultatP as $ligne) {
    $reqUp->bindParam("ID", $ligne["ID_Personne"]);
    $reqUp->execute();
}

    $reqsup = $db->prepare("update equipe set Actif=0 where ID_Equipe =:ID");
    $reqsup->bindParam(":ID", $ID);
    $reqsup->execute();
$db=null;
    header("location: Gestion-equipe-form.php?er");
    die;