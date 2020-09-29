<?php
    function listeanimeControleur($twig, $db){    
        $form = array();   
        $anime = new Anime($db);  
        $liste = $anime->select();     
 
		   
        
              
         echo $twig->render('listeanime.html.twig', array('form'=>$form,'liste'=>$liste));
         
        }
    
?>