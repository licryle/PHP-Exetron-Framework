<?php

// Test de la gestion des erreurs

// chargements de base
require_once( '../release/lib/librairies.php' );

$errors = new Errors();

$errors->add(new Error(0,'Coucou c\'est moi!'));
$errors->add(new Error(10,'Aie!'));

echo '$errors contient '.$errors->GetCount().' erreurs<br/>';

echo $errors;

?>