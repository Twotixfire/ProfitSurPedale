<?php

require_once __DIR__."/../../../config14avril2025/config.bd.include.php"; // Extérieur au dossier public:  /home/user/dossierConfigApp

class Connexion
{
    /** Retourne une connexion avec le driver Mariabd sur la bd. */
    function getConnexionBd()
    {
        try {
            $chaineConnexion = "mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR;

            return new PDO($chaineConnexion,USAGER,MDP);

        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }

    }
}
