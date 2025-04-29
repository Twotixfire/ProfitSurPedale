<?php

require_once __DIR__.'/bd/bdprofitsurpedale.include.php';

if (!empty($_POST['courriel']) and !empty($_POST['mdp']))
{
    $courriel = filter_input(INPUT_POST,"courriel", FILTER_VALIDATE_EMAIL);
    $mdp = filter_input(INPUT_POST,"mdp",FILTER_DEFAULT);
    $smdp = password_hash($mdp, PASSWORD_DEFAULT);
    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURECRIRE,BDMDP);
    $requete = $connexion->prepare("INSERT INTO Utilisateur (emailUtilisateur,motDePasse, Commenditaire) VALUES (:nom,:mdp, 1)");
    $requete->bindParam(":nom",$courriel, PDO::PARAM_STR);
    $requete->bindParam(":mdp",$smdp, PDO::PARAM_STR);
    $requete->execute();
    

    header("location: ./connexion.php");
    return;

}



