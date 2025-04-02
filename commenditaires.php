<?php
    $theme= filter_input(INPUT_GET, 'theme');

    $listeCommenditaires=array("Decathlon", "RedBull", "Giant", "Specialized", "Monster", "Scott");
    $listesOffresCommenditaires=array("0,71$", "0,53$", "0,57$", "0,36$", "0,51$", "0,47$");
    
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
            $numeroConteneurFlex = 3;
            $flexItemParConteneur = 2;
            $compteurCommenditaire = 0;

            for ($i=0;$ $i < $numeroConteneurFlex; $i++) {
                $compteurFlexItem = 0;
                echo "<div class=\"ficheCommenditaire\">";
                
                for ($i=$compteurCommenditaire; $i < sizeof($listeCommenditaires); $i++) {
                    if ($compteurFlexItem < $flexItemParConteneur) {
                        $logo = "";
                        $logo = "images/$listeCommenditaires[$i].png";
                        echo "<div class=\"ficheCommenditaire\">
                        <div class=\"resumeCommenditaire\">
                            <h2>$listeCommenditaires[$i]</h2>
                            <p>Revenus au kilomètre : $listesOffresCommenditaires[$i]<br></p>
                        </div>
                        <img src=$logo alt=\"$listeCommenditaires[$i]\" class=\"image-recette\">";
                    }
                    else{
                        break;
                    }
                }
                echo "</div>";
            }
        ?>
    </main>
    <footer></footer>
</body>
</html>