<?php

require_once __DIR__.'/bdprofitsurpedale.include.php';
require_once __DIR__."/../src/controller/SessionFinale.controller.php";

$session = new SessionFinale();
session_start();
$session->validerSession();

if (!empty($_POST['kilometre']))
{
    $distance = $_POST['kilometre'];
    $courriel = $_SESSION["courriel"];
    $date = date("Y-m-d H:i:s");

    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURLIRE,BDMDP);
    $requete = $connexion->prepare("SELECT * FROM Utilisateur WHERE emailUtilisateur=:mail");
    $requete->bindParam(":mail",$courriel, PDO::PARAM_STR);
    $requete->execute();
    $identifiants = $requete->fetchAll();
    $id = $identifiants[0]['idUtilisateur'];

    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURECRIRE,BDMDP);
    $requete = $connexion->prepare("INSERT INTO Transaction (idUtilisateur, date, distance) VALUES (:id,:date, :dst)");
    $requete->bindParam(":id",$id, PDO::PARAM_INT);
    $requete->bindParam(":date",$date, PDO::PARAM_STR);
    $requete->bindParam(":dst",$distance, PDO::PARAM_INT);
    $requete->execute();
    

    header("location: ../vueUtilisateur.php");
    return;

}


function recupererTransactions($courriel)
{
    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURLIRE,BDMDP);
    $requete = $connexion->prepare("SELECT * FROM Utilisateur WHERE emailUtilisateur=:mail");
    $requete->bindParam(":mail",$courriel, PDO::PARAM_STR);
    $requete->execute();
    $identifiants = $requete->fetchAll();
    $id = $identifiants[0]['idUtilisateur'];
    


    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURLIRE,BDMDP);
    $requeteTransactions = $connexion->prepare("SELECT * FROM Transaction WHERE idUtilisateur=:id");
    $requeteTransactions->bindParam(":id",$id, PDO::PARAM_STR);
    $requeteTransactions->execute();

    $listeTransactions = $requeteTransactions->fetchAll();
    return $listeTransactions;
}

function ajouterTransaction()
{

}