<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thèmes</title><link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1><img src="images/logo_profitssurpedale.png" alt="" height="69px" width="80px">Profits sur pédales</h1>
    </header>
    <nav>
        <a href="index.html" class="separateur">Accueil</a>
        <a href="services.php" class="separateur">Nos services</a>
        <a href="commenditaires.php" class="separateur">Commenditaires</a>
        <a href="vueUtilisateur.html"class="separateur">Tableau de bord</a>
        <a href="connexion.html">Connexion</a>
    </nav>
    <main>
        <?php

            for ($i=0; $i < 3; $i++) { 
                echo "
                <div class=\"ficheService\">
                    <div class=\"resumeService\">
                        <h2>Service #$i</h2>
                        <p></p>
                        <a href=\"recettes.php?$i\">&gt; Consulter</a>
                    </div>
                </div>";
            }
        ?>
    </main>
    <footer></footer>
</body>
</html>