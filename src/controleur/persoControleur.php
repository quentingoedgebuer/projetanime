<?php
    function persoControleur($twig, $db){    
        $form = array();
        $perso = new perso($db);
        $liste = $perso->perso();     

        if (isset($_POST['btPerso'])){      
            $nomperso = $_POST['nomperso'];
            $idanime = $_POST['idanime'];      
			$form['valide'] = true;      

           
                     
            $exec = $perso->insert($nomperso, $idanime); 
            
            $form['nomperso'] = $nomperso;
		}   
        
              
         echo $twig->render('perso.html.twig', array('form'=>$form,'liste'=>$liste));
         
        }
    
?>