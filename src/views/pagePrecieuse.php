<?php
    require_once __DIR__."/../controller/SessionFinale.controller.php";
    
    $session = new SessionFinale();
    session_start();
    $session->validerSession();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Information confidentielle</h1>
    <a href="../controller/deconnexion.redirect.php">Déconnexion du site</a>
</body>
</html>
