<?php
require_once __DIR__."/SessionAuthentification.php";
require_once __DIR__."/SessionFinale.controller.php";
    
$session = new SessionAuthentification();
session_start();
$session->validerSession();

$verifCode = $_SESSION["code"];

if (!empty($_POST['code'])){

    $codeEntre = filter_input(INPUT_POST,"code", FILTER_DEFAULT);

    if ($codeEntre == $verifCode) {

        $session = new SessionFinale();
        session_start();
        $session->setSession($courriel, $_SERVER['REMOTE_ADDR']);

        header("Location: ./../../vueUtilisateur.php");
    }
}


