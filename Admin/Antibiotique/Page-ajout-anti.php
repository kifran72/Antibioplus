<?php

include_once '../../Connexion/Config.php';

$Nom = $_POST["Nom"];
var_dump($Nom);

if ($_POST["Nom"] == "") {
    header("location: Ajout-molecule-form.php?er=nom");
    die();
}

$db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);

$req = $db->prepare("INSERT INTO antibiotique (Nom_antibiotique) VALUES (:nom)");
$req->bindParam(":nom", $Nom);

$req->execute();

if ($req->errorInfo()[0] == '00000') {
    header("location: ../Page-acceuil-admin.php?mes=antiok");
}

if ($req->errorInfo()[0] != '00000') {
    header("location: ../Page-acceuil-admin.php?mes=fail-anti");
}

