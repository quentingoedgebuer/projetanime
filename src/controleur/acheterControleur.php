<?php
function valideControleur($twig){
    $form =array();
if (isset($_POST['btValide'])){      
    $inputEmail = $_POST['inputEmail'];      
    $inputPassword = $_POST['inputPassword'];      
    $text = $_POST['text']; 
    $form[email]=$inputEmail;
    $form[mdp]=$inputPassword;
    $form[texte]=$text;

    echo $twig->render('lire.html.twig', array('form'=>$form));        
      }
}
?>