<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thèmes</title><link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Thèmes de recette</h1>
    </header>
    <nav>
        <a href="index.html">Accueil</a>
        <a href="themes.php">Nos services</a>
        <a href="commenditaire.php">Commenditaires</a>
        <a href="vueUtilisateur.html">Tableau de bord</a>
        <a href="connexion.html">Connexion</a>
    </nav>
    <main>
        <?php

            for ($i=1; $i <= 5; $i++) { 
                echo "<div class=\"fiche\">
                <div class=\"resume\">
                    <h2>Thème de recettes #$i</h2>
                    <p>Lorem ipsum odor amet, consectetuer adipiscing elit. Platea tortor dictum venenatis eget erat luctus vulputate porttitor. 
                        Adipiscing ullamcorper nulla rhoncus euismod amet pellentesque ex pellentesque. Sagittis sem et ipsum mi arcu sollicitudin lectus lacus. 
                        Sagittis cubilia placerat gravida malesuada nec magna molestie. Mus eros finibus maecenas dapibus vehicula feugiat. 
                        Aenean pellentesque justo torquent turpis vulputate risus.</p>
                        <a href=\"recettes.php?theme=$i\">&gt; Consulter</a>
                </div>
                <img src=\"https://chefcuisto.com/files/2017/10/meilleures-patates-dejeuner-1140x875.jpg\" alt=\"Patates déjeuner\" class=\"image-recette\">
                </div>";
            }
            
        ?>
    </main>
    <footer></footer>
</body>
</html>