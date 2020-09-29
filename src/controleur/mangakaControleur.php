<?php
    function mangakaControleur($twig, $db){    
        $form = array();     

        if (isset($_POST['btMangaka'])){      
            $nommangaka = $_POST['nommangaka'];      
			$form['valide'] = true;      

           
            $mangaka = new Mangaka($db);         
            $exec = $mangaka->insert($nommangaka); 
            
            $form['nommangaka'] = $nommangaka;
		}   
        
              
         echo $twig->render('mangaka.html.twig', array('form'=>$form));
         
        }
    
?>