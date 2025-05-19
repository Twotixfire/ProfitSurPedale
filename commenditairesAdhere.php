<?php
    require_once __DIR__."/src/controller/SessionFinale.controller.php";
    
    $session = new SessionFinale();
    session_start();
    $session->validerSession();

    $commenditaireDejaSelectionne = 0;

    if (!empty($_GET['changementImpossible'])) {
        $commenditaireDejaSelectionne = $_GET['changementImpossible'];
    }

    $listeCommenditaires=array("Decathlon", "RedBull", "Giant", "Specialized", "Monster", "Scott");
    $listesOffresCommenditaires=array("0,71$", "0,53$", "0,57$", "0,36$", "0,51$", "0,47$");
    $listesOffresSpéciales=array(
        "Offre spécial du commanditaire : <br><br> 400$ d'achats chez Decathlon",
        "Offre spécial du commanditaire : <br><br> Vélo personalisé d'une valeur de 3000$, avec logo du commenditaire.",
        "Offre spécial du commenditaire : <br><br> Crédit de 1000$ sur le site du commenditaire",
        "Offre spécial du commenditaire : <br><br> Crédit de 5500$ en composantes de vélo",
        "Offre spécial du commenditaire : <br><br> Boisson énergisante à vie de Monster Energy",
        "Offre spécial du commenditaire : <br><br> Crédit de 3000$ en composantes de vélo"
    )    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script>
    
        function ErreurChangementCommenditaire(idCommenditaire) {

            let para = document.createElement("p");
            let text = document.createTextNode("Vous avez déjà ce commenditaire");
            para.appendChild(text);

            let element = document.getElementById("divCommenditaire" + String(idCommenditaire));
            element.appendChild(para);
        }

    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profits sur pédales</title>
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
        <?php
            $numeroConteneurFlex = 3;
            $flexItemParConteneur = 2;
            $compteurCommenditaire = 0;

            for ($j=0 ; $j < 3; $j++) {

                $compteurFlexItem = 0;
                echo "<div class=\"ficheCommenditaire\">";
                
                for ($i=$compteurCommenditaire; $i < sizeof($listeCommenditaires); $i++) {

                    if ($compteurFlexItem < $flexItemParConteneur) {

                        $compteurFlexItem ++;
                        $compteurCommenditaire ++;
                        $valeur = $i + 1;
                        $logo = "";
                        $logo = "images/$listeCommenditaires[$i].png";
                        echo "
                        <div class=\"resumeCommenditaire\" id=\"divCommenditaire$valeur\">
                            <img src=$logo alt=\"$listeCommenditaires[$i]\" class=\"image-logo\">
                            
                            <p>Revenus au kilomètre : $listesOffresCommenditaires[$i]<br>
                            <br>
                            $listesOffresSpéciales[$i]
                            </p>
                            <br>
                            <a href=\"./bd/transaction.php?commenditaire=$valeur\" class=\"boutton\">Adhérer</a>
                        </div>
                        ";
                        if ($valeur == $commenditaireDejaSelectionne) {
                            echo '<script type="text/javascript"> ErreurChangementCommenditaire('.$valeur.'); </script>';
                        }
                    }
                    else 
                        break 1;
                }
                echo "</div>";
            }
        ?>
    </main>
    <footer>
        <p>© 2025 Tous droits réservés.</p>
    </footer>
</body>
</html>