<?php
require_once __DIR__."/src/controller/SessionFinale.controller.php";

$session = new SessionFinale();
session_start();
$session->validerSession();

$utilisateur = $_SESSION["courriel"];

require_once __DIR__."/bd/transaction.php";
$historique = recupererTransactions($utilisateur);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h1 class="bienvenue">Bienvenue <?= $utilisateur ?></h1>
        <br>
        <div class="historique">
            <!--
            <div class="total">
                <h3>Revenu total :</h3>
                <p>60,48$</p>
            </div>
            <br>
            <div class="total">
                <h3>Distance totale :</h3>
                <p>108 km</p>
            </div>
            -->

            <form action="./bd/transaction.php"  method="post">
                <label for="input1"> Nouvelle transaction :<br>
                    <input type="text" id="kilometre" name="kilometre" placeholder="Distance pacourue">
                </label>
                <p></p>
                <div>
                    <input type="submit" value="Ajouter" />
                </div>
            </form>
            <br>
            <h2>Vos transactions</h2>

            <?php
                
                $affichageTransaction =
                "<table>
                    <tr>
                        <td>Date</td><td>Distance (km)</td>
                    </tr>";
                for ($i=0; $i < sizeof($historique); $i++) { 
                    
                    $date = $historique[$i]['date'];
                    $distance = $historique[$i]['distance'];
                    
                    $affichageTransaction .= "
                    <tr>
                        <td>$date</td><td>$distance</td>
                    </tr>";
                }
                $affichageTransaction .= "</table>";
                echo $affichageTransaction;
            ?>
            <!--
            <table>
                <tr>
                    <td>Date</td><td>Distance (km)</td><td>Revenu au km</td><td>Revenu du trajet</td>
                </tr>
                <tr>
                    <td>2003-11-03</td><td>72</td><td>0,56</td><td>40,32$</td>
                </tr>
                <tr>
                    <td>2007-06-13</td><td>36</td><td>0,56</td><td>20,16$</td>
                </tr>
            </table>
            -->
        </div>
    </main>
    <footer>
        <p>© 2025 Tous droits réservés.</p>
    </footer>
</body>
</html>