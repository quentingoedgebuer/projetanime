<?php


function getPage($db){    

    $lesPages['accueil'] = "accueilControleur";     
    $lesPages['produit'] = "produitControleur";    
    $lesPages['connexion'] = "connexionControleur"; 
    $lesPages['inscription'] = "inscriptionControleur"; 
    $lesPages['maintenance'] = "maintenanceControleur"; 
    $lesPages['livre'] = "livreControleur";
    if ($db!=NULL){

    if (isset($_GET['page'])){      
        $page = $_GET['page'];  
        
    }    
    else{        
      $page = 'accueil';    
    }    
    if (isset($lesPages[$page])){        
        $contenu = $lesPages[$page];    
    }    
    else{        
      $contenu = $lesPages['accueil'];    
    }    
        return $contenu;
    }else{
        return $lesPages['maintenance'];
    }
  }
  ?>