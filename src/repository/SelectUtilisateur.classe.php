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
            $pdoRequete = $this->connexion->prepare("SELECT * FROM Utilisateur WHERE emailUtilisateur=:mail");
    
            $pdoRequete->bindParam(":mail",$this->courriel,PDO::PARAM_STR);
        
            $pdoRequete->execute();
    
            
            $user = $pdoRequete->fetch(PDO::FETCH_OBJ);

            if (empty($user)) {
                header("Location: ./../error/erreur.php?courrielInexistant");
            }


            $this->user->setId($user->idUtilisateur);
            $this->user->setCourriel($user->emailUtilisateur);
            $this->user->setMdp($user->motDePasse);

            return $this->user;
    
        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }        
    }
}


