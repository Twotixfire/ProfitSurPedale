<?php
require_once __DIR__."/SessionAuthentification.php";
require_once __DIR__."/SessionFinale.controller.php";
    
$session = new SessionAuthentification();
session_start();
$session->validerSession();



$verifCode = $_SESSION["code"];
$courriel = $_SESSION["courriel"];

if (!empty($_POST['code'])){

    $codeEntre = filter_input(INPUT_POST,"code", FILTER_DEFAULT);

    if ($codeEntre == $verifCode) {

        $session->supprimer();

        $session = new SessionFinale();
        session_start();
        $session->setSession($courriel, $_SERVER['REMOTE_ADDR']);

        
        header("Location: ./../../vueUtilisateur.php");
    }
}


