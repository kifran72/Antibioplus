<?php
include_once '../Connexion/Config.php';
session_start();

if(!isset($_POST["mol"])){
    header("location: Creation-etude-form.php?er=mol");
    die;
    }
$mol[] = $_POST["mol"][0];

foreach ($_POST["mol"] as $Lmol){
    $cpt = 0;
    $test = FALSE;
    while ($cpt != sizeof($mol) && !$test){
        if($Lmol == $mol[$cpt]){
            $test=TRUE;
        }
        $cpt++;
    }
    if (!$test){
        $mol[] = $Lmol;
    }
}

if(!isset($_POST["bac"])){
    header("location: Creation-etude-form.php?er=bac");
    die;
    }
$bac[] = $_POST["bac"][0];

foreach ($_POST["bac"] as $Lbac){
    $cpt = 0;
    $test = FALSE;
    while ($cpt != sizeof($bac) && !$test){
        if($Lbac == $bac[$cpt]){
            $test=TRUE;
        }
        $cpt++;
    }
    if (!$test){
        $bac[] = $Lbac;
    }
}


if(!isset($_POST["ant"])){
    header("location: Creation-etude-form.php?er=ant");
    die;
    }
$ant[] = $_POST["ant"][0];

$eq[] = $_POST["ant"][1];


$cpt =0;
foreach ($_POST["ant"] as $Lant){
    $test = false;
    $j=0;
    if ($cpt%2 == 0){
        while ($j< sizeof($ant) && !$test){
            if ($Lant == $ant[$j]){
                $test =TRUE;
            }
            $j++;
        }
    }
    else{
        while ($j< sizeof($eq) && !$test){
            if ($Lant == $eq[$j]){
                $test =TRUE;
            }
            $j++;
        }
    }
    
    if(!$test){
        if($cpt%2 == 0){
            $ant[] = $Lant;
        }
        else{
            $eq[] = $Lant;
        }
    }
    $cpt++;
}
$dateD=$_POST["Debut"];
$dateF=$_POST["Fin"];

if ($_POST["Nom"]==""){
    header("location: Creation-etude-form.php?er=nom");
    die;
}
    $Nom = $_POST["Nom"];

if(sizeof($ant)== sizeof($eq)){
   
    
    $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
    $creaEtt= $db->prepare("INSERT INTO etude (Nom_Etude, ID_Personne, Date_Debut, Date_Fin) VALUES (:Nom, :ID, :DD, :DF)");
    $creaEtt->bindParam(":Nom", $Nom);
    $creaEtt->bindParam(":ID", $_SESSION["ID"]);
    $creaEtt->bindParam(":DD", $dateD);
    $creaEtt->bindParam(":DF", $dateF);
    $creaEtt->execute();

    $IDE=$db->lastInsertId();
    
    $AjMol= $db->prepare("INSERT INTO etude_molecule (ID_Etude, ID_Molecule) VALUES (:IDE, :IDM)");
    $AjMol->bindParam(":IDE", $IDE);
    
    foreach ($mol as $Lmol){
    $AjMol->bindParam(":IDM", $Lmol);
    $AjMol->execute();
    }
    
    $AjBac= $db->prepare("INSERT INTO etude_bacterie (ID_Etude, ID_Souche) VALUES (:IDE, :IDS)");
    $AjBac->bindParam(":IDE", $IDE);

    foreach ($bac as $Lbac){
    $AjBac->bindParam(":IDS", $Lbac);
    $AjBac->execute();
    }
    
    $AjAnt= $db->prepare("INSERT INTO etude_antibiotique (ID_Etude, ID_Antibiotique, ID_Equipe) VALUES (:IDE, :IDA, :IDEq)");
    $AjAnt->bindParam(":IDE", $IDE);

    for ($i=0; $i<sizeof($ant); $i++){
        
            $AjAnt->bindParam(":IDA", $ant[$i]);
            $AjAnt->bindParam(":IDEq", $eq[$i]);
            $AjAnt->execute(); 
           
    }
    
    foreach ($eq as $Leq){
        $bloqueEquipe= $db->prepare("UPDATE equipe SET En_Etude = 1 Where ID_Equipe = :IDEq");
        $bloqueEquipe->bindParam(":IDEq", $Leq);
        $bloqueEquipe->execute();
    }
    
    $db=null;
    
    header("location: ../Admin/Page-acceuil-admin.php?mes=etok");
    die;
}
else{
    header("location: Creation-etude-form.php?er=rat");
    die;
}