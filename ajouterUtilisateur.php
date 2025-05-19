<?php

require_once __DIR__.'/bd/bdprofitsurpedale.include.php';

if (!empty($_POST['courriel']) and !empty($_POST['mdp']))
{

    $courriel = filter_input(INPUT_POST,"courriel", FILTER_VALIDATE_EMAIL);

    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURLIRE,BDMDP);
    $requete = $connexion->prepare("SELECT * FROM Utilisateur WHERE emailUtilisateur=:mail");
    $requete->bindParam(":mail",$courriel, PDO::PARAM_STR);
    $requete->execute();
    $informations = $requete->fetchAll();

    if ($informations[0]['emailUtilisateur'] == $courriel){
        header("location: ./src/error/erreur.php?=courrielIndisponible");
        return;
    }
    
    $mdp = filter_input(INPUT_POST,"mdp",FILTER_DEFAULT);
    $smdp = password_hash($mdp, PASSWORD_DEFAULT);
    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURECRIRE,BDMDP);
    $requete = $connexion->prepare("INSERT INTO Utilisateur (emailUtilisateur,motDePasse, Commenditaire) VALUES (:nom,:mdp, 7)");
    $requete->bindParam(":nom",$courriel, PDO::PARAM_STR);
    $requete->bindParam(":mdp",$smdp, PDO::PARAM_STR);
    $requete->execute();

    error_log("[".date("d/m/o H:i:s e",time())."] Ajout d'un nouvel utilisateur " ."\n\r" ,3, __DIR__."/src/controller/logs/profitsurpedale.insertion-bd.log");
    header("location: ./connexion.php");
    return;

}



