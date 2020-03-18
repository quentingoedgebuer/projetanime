<?php

function livreControleur($twig){
    $form =array();
if (isset($_POST['Valide'])){      
    $inputEmail = $_POST['inputEmail'];      
    $inputPassword = $_POST['inputPassword'];      
    $text = $_POST['message']; 
    $form['valide']=true;
    $form['email']=$inputEmail;
    $form['mdp']=$inputPassword;
    $form['message']=$text;
}
    echo $twig->render('livre.html.twig',array('form'=>$form));        
      
}
?>