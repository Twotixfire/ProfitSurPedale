<?php

class Utilisateur 
{
    private int $id;
    private string $courriel;
    private string $mdp;


    /**
     * Setter d'Utilisateur
     */
    public function setId(int $p)
    {
        $this->id = $p;
    }

    public function setCourriel(string $p)
    {
        $this->courriel = $p;
    }

    public function setMdp(string $p)
    {
        $this->mdp = $p;
    }


    /**
     * Getter d'Utilisateur
     */
    public function getId()
    {
        return $this->id;
    }

    public function getCourriel()
    {
        return $this->courriel;
    }

    public function getMdp()
    {
        return $this->mdp;
    }
}