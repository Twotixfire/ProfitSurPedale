<?php

include_once __DIR__.'/../repo/bd420-149.include.php';

function getFleurHtmlByid(string $balise, int $id)
{
    try {
        $fleur = selectToutById($id);
        $html = null;

        switch ($balise) {
            case 'p':
                $html = "<p>".$fleur->nom."</p>";
                break;
            
            default:
            $html = "<b>".$fleur->nom."</b>";
                break;
        }
        
        return $html;

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
   
}




function getFleursHtml(string $balise)
{
    try {
        $fleurs = selectTout();

        $html = "<table>";

        foreach ($fleurs as $fleur) {
            $html .= "<tr><td>".$fleur->id."</td><td>".$fleur->nom."</td></tr>";
        }

        $html .= "</table>";

        return $html;

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
   
}