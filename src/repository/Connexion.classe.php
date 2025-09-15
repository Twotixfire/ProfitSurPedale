<?php

require_once __DIR__."/../../bd/bdprofitsurpedale.include.php";

class Connexion
{
    function getConnexionBd()
    {
        try {
            $chaineConnexion = "mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR;

            return new PDO($chaineConnexion,BDUTILISATEURLIRE,BDMDP);

        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }

    }
}
