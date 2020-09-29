<?php
    function listepersoControleur($twig, $db){    
        $form = array();   
        $perso = new Perso($db);  
        $liste = $perso->select();     
 
		   
        
              
    echo $twig->render('listeperso.html.twig', array('form'=>$form,'liste'=>$liste));
         
        }
    
?>