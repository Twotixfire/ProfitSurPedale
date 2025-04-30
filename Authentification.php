<?php
    require_once __DIR__."/src/controller/SessionAuthentification.php";
    
    $session = new SessionAuthentification();
    session_start();
    var_dump($_SESSION);
    $session->validerSession();

    $destinataire = $_SESSION["courriel"];

    $code = rand(100000,999999);

    $_SESSION['code'] = $code;
    echo "<p> $code </p>";

    envoyerMail($destinataire, "Votre code est : ".$code);
    
    function envoyerMail($to, $message) {
        $subject = 'Code de vérification';
        $headers = 
        'From: beginh25techinfo@begin.h25.techinfo420.ca' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        return mail($to, $subject, $message, $headers);    
    }

    ?>

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
            <div class="title"><span>Authentification</span></div>
            <form action="./src/controller/2fa.php"  method="post">
              <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" name="code" id="code" placeholder="Numéro d'authentification" required />
              </div>
              <div class="row button">
                <input type="submit" value="Valider" />
              </div>
              <div class="signup-link"><a href="index.html"> Retourner à l'accueil</a></div>
            </form>
          </div>
    </main>
</body>
</html>