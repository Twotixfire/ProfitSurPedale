<?php
 /**
  * Dépendances 
  */
require_once __DIR__."/SessionAuthentification.php";
require_once __DIR__."/../repository/SelectUtilisateur.classe.php";
require_once __DIR__.'/../model/Utilisateur.model.php';

if (!empty($_POST['courriel']) and !empty($_POST['mdp']))
{

    $courriel = filter_input(INPUT_POST,"courriel", FILTER_VALIDATE_EMAIL);
    $mdp = filter_input(INPUT_POST,"mdp",FILTER_DEFAULT);

    if ($requeteUtilisateur = new SelectUtilisateur($courriel) == false) {
        header("Location: ./../error/erreur.php");
    }

     
    $requeteUtilisateur = new SelectUtilisateur($courriel); //courriel reçu de la requête http
    $user = $requeteUtilisateur->select();

    if (password_verify($mdp, $user->getMdp()))
    {
        // Faire la session

        $session = new SessionAuthentification();
        session_start();
        $session->setSession($courriel, $_SERVER['REMOTE_ADDR']);


        header("Location: ../../Authentification.php");

    }
    else{
        header("Location: ./../error/erreur.php?mauvaisMotDePasse");
}   

}else 
{
    error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormal - mail ou mdp absent: Client ".$_SERVER['REMOTE_ADDR']."\n\r");
    header("Location: ./../error/erreur.php");
}




