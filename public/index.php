<?php

require_once '../lib/vendor/autoload.php';
require_once '../src/controleur/_controleur.php';
require_once '../config/routes.php';
require_once '../config/parametres.php';
require_once '../config/connexion.php';


$loader = new \Twig\Loader\FilesystemLoader('../src/vue/');
$twig = new \Twig\Environment($loader,[]);

$db=connect($config);
$contenu = getPage($db);
$contenu($twig);

?>