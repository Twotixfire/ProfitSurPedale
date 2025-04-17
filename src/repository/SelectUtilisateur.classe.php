<?php

require_once __DIR__.'/Select.abstract.php';
require_once __DIR__.'/../model/Utilisateur.model.php';

class SelectUtilisateur extends Select
{
    protected string $courriel;
    protected string $mdp;
    protected Utilisateur $user;

    public function __construct(string $courriel)
    {
        $this->courriel = $courriel;
        $this->user = new Utilisateur();
        parent::__construct(); 
    }
    

    
    /**
     * Sélection du user selon le courriel
     */
    public function select()
    {
        try {
            $pdoRequete = $this->connexion->prepare("select * from users where courriel=:mail");
    
            $pdoRequete->bindParam(":mail",$this->courriel,PDO::PARAM_STR);
        
            $pdoRequete->execute();
    
            $user = $pdoRequete->fetch(PDO::FETCH_OBJ);

            $this->user->setId($user->id);
            $this->user->setCourriel($user->courriel);
            $this->user->setMdp($user->mdp);

            return $this->user;
    
        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }        
    }



    /**
     * Sélection de plusieurs users
     */

     public function selectMultiple()
     {
        null;
     }
}


