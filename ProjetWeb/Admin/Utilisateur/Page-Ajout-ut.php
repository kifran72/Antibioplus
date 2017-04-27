<?php

include_once '../../Connexion/Config.php';

$admin = 0;
$chercheur = 1;


$Nom = $_POST["Nom"];

if ($_POST["Nom"] == "") {
    header("location: Ajout-utilisateur-form.php?er=nom");
    die();

}

$Prenom = $_POST["Prenom"];

if ($_POST["Prenom"] == "") {
    header("location: Ajout-utilisateur-form.php?er=prenom");
    die();
}

$Mail = $_POST["Mail"];

if ($_POST["Mail"] == "") {
    header("location: Ajout-utilisateur-form.php?er=mail");
    die();

}

if ($_POST["MDP"] == "") {
    header("location: Ajout-utilisateur-form.php?er=mdp-0");
    die();
}

if ($_POST["MDP"] != $_POST["MDP-conf"]) {
    header("location: Ajout-utilisateur-form.php?er=mdp-1");
    die();
}

$MDP = $_POST["MDP"];

$MDP_conf = $_POST["MDP-conf"];

if (!isset($_POST["Role"])) {
    header("location: Ajout-utilisateur-form.php?er=role");
    die();
}

$Role = $_POST["Role"];

$db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);

$req = $db->prepare("INSERT INTO personne(Nom_Personne, Prenom_Personne, MDP_Personne, Role_Personne, MAIL_Personne) VALUES (:nom,:prenom,:mdp,:role,:mail)");
$req->bindParam(":nom", $Nom);

$req->bindParam(":prenom", $Prenom);
$req->bindParam(":mdp", $MDP);


if ($Role == "Admin") {
    $req->bindParam(":role", $admin);
} else {
    $req->bindParam(":role", $chercheur);
}
$req->bindParam(":mail", $Mail);
$req->execute();

if ($req->errorInfo()[0] == '00000') {
    header("location: ../Page-acceuil-admin.php?mes=utok");
}

if ($req->errorInfo()[0] != '00000') {
    header("location: ../Page-acceuil-admin.php?mes=fail-ut");
}

