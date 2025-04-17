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
        <a href="index.html" class="separateur">Accueil</a>
        <a href="services.php" class="separateur">Nos services</a>
        <a href="commenditaires.php" class="separateur">Commenditaires</a>
        <a href="vueUtilisateur.php"class="separateur">Tableau de bord</a>
        <a href="connexion.php">Connexion</a>
    </nav>
    <main>
        <h1 class="bienvenue">Bienvenue Nom utilisateur</h1>
        <br>
        <div class="historique">
            
            <div class="total">
                <h3>Revenu total :</h3>
                <p>60,48$</p>
            </div>
            <br>
            <div class="total">
                <h3>Distance totale :</h3>
                <p>108 km</p>
            </div>

            <form id="formulaire">
                <label for="input1"> Nouvelle transaction :<br>
                    <input type="text" id="nomIndividu" name="input1" placeholder="Distance pacourue" onchange="recupererDistance(this)">
                </label>
            </form>
            <br>
            <h2>Vos transactions</h2>
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
            
        </div>
        
        

    </main>
    <footer>
        <p>© 2025 Tous droits réservés.</p>
    </footer>
</body>
</html>