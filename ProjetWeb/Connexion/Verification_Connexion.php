<?php

include_once 'Config.php';

session_start();

$user = $_POST["user"];
$pass = $_POST["pass"];

$db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);

$req = $db->prepare("SELECT Prenom_Personne, Nom_Personne, Role_Personne FROM personne WHERE ID_Personne=:id and MDP_Personne=:mdp");

$req->bindParam(":id", $user);

$req->execute();

$resultat = $req->fetchAll();

if (count($resultat) == 0) {
    $req = $db->prepare("SELECT Prenom_Personne, Nom_Personne, Role_Personne FROM personne WHERE MAIL_Personne=:mail and MDP_Personne=:mdp");

    $req->bindParam(":mail", $user);

    $req->bindParam(":mdp", $pass);

    $req->execute();

    $resultat = $req->fetchAll();
}

$db=null;

if (count($resultat) == 0) {
    header("location: Page-co.php?mes=inc");
} else {
    $_SESSION["Nom"] = $resultat[0]["Nom_Personne"];
    $_SESSION["Prenom"] = $resultat[0]["Prenom_Personne"];
    $_SESSION["Role"] = $resultat[0]["Role_Personne"];

    if ($resultat[0]["Role_Personne"] == 1) {
        header("location: ../Chercheur/Page-acceuil-chercheur.php?mes=bvn");
    } else {
        header("location: ../Admin/Page-acceuil-admin.php?mes=bvn");
    }
}
