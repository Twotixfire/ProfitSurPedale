<?php
    require_once __DIR__."/src/controller/SessionFinale.controller.php";
    
    $session = new SessionFinale();
    session_start();
    $session->validerSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wdth,wght@0,75..100,100..900;1,75..100,100..900&display=swap" rel="stylesheet">
    <title>Profits sur pédale</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1><img src="images/logo_profitssurpedale.png" alt="" height="69px" width="80px">Profits sur pédales</h1>
    </header>
    <nav>
        <a href="accueil.php" class="separateur">Accueil</a>
        <a href="servicesSession.php" class="separateur">Nos services</a>
        <a href="commenditairesAdhere.php" class="separateur">Commenditaires</a>
        <a href="vueUtilisateur.php"class="separateur">Tableau de bord</a>
        <a href="./src/controller/deconnexion.redirect.php">Déconnexion</a>
    </nav>
    <main>
      <img src="images/fond_accueil.jpg" alt="Cycliste professionnel" class="image-accueil" >
      <div class="accueil">
         <h2>Notre mission</h2>
         <p>Faciliter la carrière de nombreux athlètes cyclistes à travers le monde</p>
      </div>
      <br>
      <div class="accueil">
         <h2>Comment ?</h2>
         <p>En passant par notre site, vous aurez accès à divers services comme 
            <br>la comptabilisation de vos trajets et une sélections d'offre de commenditaires du milieu sportif.</p>
      </div>
      <br>
      <div class="accueil">
         <h2>Pourquoi ?</h2>
         <p>Nous savons à quel point il est difficile pour les athlètes de vivre de leur passion.<br> Nous voulons les aider à réaliser cela.</p>
      </div>
   </main>
    <footer>
        <p>© 2025 Tous droits réservés.</p>
    </footer>
</body>
</html>