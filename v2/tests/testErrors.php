<?php

$classpath = realpath('classes').'/';

// Test de la gestion des erreurs

require( $classpath . 'classes/AbstractClass/Interfaces/AbstractIterator.php');
require( $classpath . 'classes/AbstractClass/AbstractClass.php');
require( $classpath . 'classes/Errors/Errors/Error.php');
require( $classpath . 'classes/Errors/Errors.php');

$errors = new Errors();

$errors->add(new Error(0,'Coucou c\'est moi!'));
$errors->add(new Error(10,'Aie!'));

echo '$errors contient '.$errors->GetCount().' erreurs<br/>';

echo $errors;

?>