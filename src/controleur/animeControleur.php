<?php
    function animeControleur($twig, $db){    
        $form = array();   
        $anime = new Anime($db);
        $liste = $anime->genreselect();
        $liste2 = $anime->mangaka();    

        if (isset($_POST['btAnime'])){      
            $nomanime = $_POST['nomanime'];      
            $genre = $_POST['genre'];       
			$idmangaka = $_POST['idmangaka']; 
			$form['valide'] = true;      

           
                   
            $exec = $anime->insert($nomanime, $genre, $idmangaka); 
            
            $form['anime'] = $nomanime;
		}   
        
              
        echo $twig->render('anime.html.twig', array('form'=>$form,'liste'=>$liste,'liste2'=>$liste2));
         
        }
    
?>