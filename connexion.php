<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profits sur pédale</title>
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
    <main>
        <div class="wrapper">
            <div class="title"><span>Connexion</span></div>
            <form action="./src/controller/authentification.redirect.php"  method="post">
              <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" name="courriel" id="courriel" placeholder="Adresse courriel" required />
              </div>
              <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required />
              </div>
              <div class="row button">
                <input type="submit" value="Se connecter" />
              </div>
              <div class="signup-link"><a href="creerCompte.php"> Créer un compte</a></div>
              <div class="signup-link"><a href="index.html"> Retourner à l'accueil</a></div>
            </form>
          </div>
    </main>
</form>
</body>
</html>