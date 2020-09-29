<?php
    function genreControleur($twig, $db){    
        $form = array();     

        if (isset($_POST['btGenre'])){      
            $libelle = $_POST['libelle'];      
			$form['valide'] = true;      

           
            $genre = new Genre($db);         
            $exec = $genre->insert($libelle); 
            
            $form['genre'] = $libelle;
		}   
        
              
         echo $twig->render('genre.html.twig', array('form'=>$form));
         
        }
    
?>