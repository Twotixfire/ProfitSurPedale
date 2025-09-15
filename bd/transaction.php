<?php

require_once __DIR__.'/bdprofitsurpedale.include.php';
require_once __DIR__."/../src/controller/SessionFinale.controller.php";

$session = new SessionFinale();
session_start();
$session->validerSession();


# Véridication du changement de commenditaire
if (!empty($_GET['commenditaire']))
{
    # Récupération du courriel de l'utilisateur
    $courriel = $_SESSION["courriel"];
    $idCommenditaire = $_GET['commenditaire'];

    
    # Récupération du commenditaire de l'utilisateur connecté
    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURLIRE,BDMDP);
    $requete = $connexion->prepare("SELECT * FROM Utilisateur WHERE emailUtilisateur=:mail");
    $requete->bindParam(":mail",$courriel, PDO::PARAM_STR);
    $requete->execute();
    $informations = $requete->fetchAll();

    $idCommenditaireUtilisateur = $informations[0]['Commenditaire'];

    if ($idCommenditaireUtilisateur == $idCommenditaire)
    {
        header("location: ../commenditairesAdhere.php?changementImpossible=$idCommenditaire");
        return;
    }

    # Changement du commenditaire de l'utilisateur connecté
    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURECRIRE,BDMDP);
    $requete = $connexion->prepare("UPDATE Utilisateur SET Commenditaire=:id WHERE emailUtilisateur=:mail");
    $requete->bindParam(":id",$idCommenditaire, PDO::PARAM_INT);
    $requete->bindParam(":mail",$courriel, PDO::PARAM_STR);
    $requete->execute();
    $informations = $requete->fetchAll();
    
    # Retour à la page de l'utilisateur
    error_log("[".date("d/m/o H:i:s e",time())."] Modification du commenditaire de l'utilisateur: " .$_SESSION['courriel']."\n\r" ,3, __DIR__."/../src/controller/logs/profitsurpedale.insertion-bd.log");
    header("location: ../vueUtilisateur.php");
    return;
}


# Vérification de l'ajout d'une transaction
if (!empty($_POST['kilometre']))
{
    # Récupération du courriel de l'utilisateur
    $courriel = $_SESSION["courriel"];


    # Données nécessaire pour l'ajout d'une transaction (date et distance(kilometre))
    $distance = $_POST['kilometre'];
    $date = date("Y-m-d H:i:s");


    # Récupération de l'identifiant et du commenditaire de l'utilisateur connecté
    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURLIRE,BDMDP);
    $requete = $connexion->prepare("SELECT * FROM Utilisateur WHERE emailUtilisateur=:mail");
    $requete->bindParam(":mail",$courriel, PDO::PARAM_STR);
    $requete->execute();
    $informations = $requete->fetchAll();

    $id = $informations[0]['idUtilisateur'];
    $idCommenditaireUtilisateur = $informations[0]['Commenditaire'];


    # Récupération du taux au kilometre du commenditaire
    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURLIRE,BDMDP);
    $requete = $connexion->prepare("SELECT * FROM Commenditaire WHERE idCommenditaires=:commenditaire");
    $requete->bindParam(":commenditaire",$idCommenditaireUtilisateur, PDO::PARAM_INT);
    $requete->execute();
    $offres = $requete->fetchAll();

    $tauxCommenditaire = $offres[0]['offreCommenditaire'];
    error_log($tauxCommenditaire);

    # Ajout d'une transaction dans la base de données
    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURECRIRE,BDMDP);
    $requete = $connexion->prepare("INSERT INTO Transaction (idUtilisateur, date, distance, revenuUnitaire) VALUES (:id,:date, :dst, :taux)");
    $requete->bindParam(":id",$id, PDO::PARAM_INT);
    $requete->bindParam(":date",$date, PDO::PARAM_STR);
    $requete->bindParam(":dst",$distance, PDO::PARAM_INT);
    $requete->bindParam(":taux",$tauxCommenditaire, PDO::PARAM_STR);
    $requete->execute();
    
    # Retour à la page de l'utilisateur
    error_log("[".date("d/m/o H:i:s e",time())."] Ajout d'une transaction par l'utilisateur: " .$_SESSION['courriel']."\n\r" ,3, __DIR__."/../src/controller/logs/profitsurpedale.insertion-bd.log");
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
    $requeteTransactions = $connexion->prepare("SELECT * FROM Transaction WHERE idUtilisateur=:id ORDER BY date DESC");
    $requeteTransactions->bindParam(":id",$id, PDO::PARAM_STR);
    $requeteTransactions->execute();

    $listeTransactions = $requeteTransactions->fetchAll();        
    return $listeTransactions;
}

function recupererCommenditaire($courriel)
{
    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURLIRE,BDMDP);
    $requete = $connexion->prepare("SELECT * FROM Utilisateur WHERE emailUtilisateur=:mail");
    $requete->bindParam(":mail",$courriel, PDO::PARAM_STR);
    $requete->execute();
    $identifiants = $requete->fetchAll();
    $idCommenditaireUtilisateur = $identifiants[0]['Commenditaire'];
    
    $connexion = new PDO("mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR,BDUTILISATEURLIRE,BDMDP);
    $requeteCommenditaire = $connexion->prepare("SELECT * FROM Commenditaire WHERE idCommenditaires=:commenditaire");
    $requeteCommenditaire->bindParam(":commenditaire",$idCommenditaireUtilisateur, PDO::PARAM_INT);
    $requeteCommenditaire->execute();

    $commenditaire = $requeteCommenditaire->fetchAll();
    return $commenditaire;
}