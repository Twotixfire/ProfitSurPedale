<?php
    $listeServices=array("Comptabilisation de vos trajets", "Calcule des revenus", "Contrats avec les commenditaires");
    $listeDescriptionService=array(
        "À chaque fois que aurez effectuez un trajet dans le monde, nous compatabiliserons la distance parcourue.",
        "Nous calculerons les revenus que vous aurez générer suite à vos trajets, selon vos sponsors.",
        "Vous n'avez qu'à soumettre une demande de contrat au commenditaire de votre choix et nous nous occupons des démarches logistiques.",
    )
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profits sur pédale</title><link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1><img src="images/logo_profitssurpedale.png" alt="" height="69px" width="80px">Profits sur pédales</h1>
    </header>
    <nav>
        <a href="index.html" class="separateur">Accueil</a>
        <a href="services.php" class="separateur">Nos services</a>
        <a href="commenditaires.php" class="separateur">Commenditaires</a>
        <a href="vueUtilisateur.php"class="separateur">Tableau de bord</a>
        <a href="connexion.php">Connexion</a>
    </nav>
    <main>
        <?php

            for ($i=0; $i < sizeof($listeServices); $i++) { 
                echo "
                <div class=\"ficheService\">
                    <div class=\"resumeService\">
                        <h2>$listeServices[$i]</h2>
                        <p>$listeDescriptionService[$i]</p>
                    </div>
                </div>";
            }
        ?>
    </main>
    <footer>
        <p>© 2025 Tous droits réservés.</p>
    </footer>
</body>
</html>