<?php
    function listegenreControleur($twig, $db){    
        $form = array();   
        $genre = new Genre($db);  
        $liste = $genre->select();     
 
		   
        
              
         echo $twig->render('listegenre.html.twig', array('form'=>$form,'liste'=>$liste));
         
        }
    
?>