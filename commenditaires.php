<?php
    $theme= filter_input(INPUT_GET, 'theme');

    $listeTheme=array("", "Oeuf", "Pizza", "Patates", "Gaufre", "Viandes fumées");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Services offerts</h1>
    </header>
    <nav>
        <a href="index.html">Accueil</a>
        <a href="themes.php">Nos services</a>
        <a href="commenditaire.php">Commenditaires</a>
        <a href="vueUtilisateur.html">Tableau de bord</a>
        <a href="connexion.html">Connexion</a>
    </nav>
    <main>
        <!--
        <h1>Le thème choisi est <?=$listeTheme[$theme]?></h1>
        <?php
            echo "<h1>Le thème choisi est $listeTheme[$theme]</h1>";
            for ($i=1; $i <= 5; $i++) { 
                echo "<div class=\"fiche\">
                <div class=\"resume\">
                    <h2>Les meilleures patates déjeuner #$i</h2>
                    <p>Lorem ipsum odor amet, consectetuer adipiscing elit. Platea tortor dictum venenatis eget erat luctus vulputate porttitor. 
                        Adipiscing ullamcorper nulla rhoncus euismod amet pellentesque ex pellentesque. Sagittis sem et ipsum mi arcu sollicitudin lectus lacus. 
                        Sagittis cubilia placerat gravida malesuada nec magna molestie. Mus eros finibus maecenas dapibus vehicula feugiat. 
                        Aenean pellentesque justo torquent turpis vulputate risus.</p>
                </div>
                <img src=\"https://chefcuisto.com/files/2017/10/meilleures-patates-dejeuner-1140x875.jpg\" alt=\"Patates déjeuner\" class=\"image-recette\">
                </div>";
            }
            
        ?>
        <div class="fiche">
            <div class="resume">
                <h2>Muffins au pain doré</h2>
                <p>Tempor eu per rutrum; eu cubilia nostra. Consequat vel est dignissim, imperdiet ridiculus rutrum venenatis penatibus. 
                    Ridiculus duis lectus dapibus; mus semper etiam. Non velit condimentum hac aptent euismod natoque felis phasellus nunc. 
                    Diam faucibus nunc potenti, fusce mattis magna senectus varius dapibus. Dis ornare fames auctor donec enim nunc fusce. 
                    Dictumst montes nec magnis gravida enim habitant. Curabitur et curabitur nunc phasellus laoreet ultrices malesuada velit</p>
            </div>
            <img src="https://chefcuisto.com/files/2017/02/muffins-pain-dore.jpg" alt="Muffins au pain doré" class="image-recette">
        </div> -->
    </main>
    <footer></footer>
</body>
</html>