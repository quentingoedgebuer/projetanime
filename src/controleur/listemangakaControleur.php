<?php
    function listemangakaControleur($twig, $db){    
        $form = array();   
        $mangaka = new Mangaka($db);  
        $liste = $mangaka->select();     
 
		   
        
              
         echo $twig->render('listemangaka.html.twig', array('form'=>$form,'liste'=>$liste));
         
        }
    
?>