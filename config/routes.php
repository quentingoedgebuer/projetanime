<?php


function getPage($db){    

    $lesPages['accueil'] = "accueilControleur";        
    $lesPages['connexion'] = "connexionControleur"; 
    $lesPages['inscription'] = "inscriptionControleur"; 
    $lesPages['maintenance'] = "maintenanceControleur"; 
    $lesPages['deconnexion'] = "deconnexionControleur";
    $lesPages['utilisateur'] = "utilisateurControleur";
    $lesPages['anime'] = 'animeControleur';
    $lesPages['genre'] = 'genreControleur';
    $lesPages['listeanime'] = 'listeanimeControleur';
    $lesPages['listegenre'] = 'listegenreControleur';
    $lesPages['perso'] = 'persoControleur';
    $lesPages['listeperso'] = 'listepersoControleur';
    $lesPages['mangaka'] = 'mangakaControleur';
    $lesPages['listemangaka'] = 'listemangakaControleur';
    
 
    if ($db!=null){

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