<?php

$classpath = realpath('../classes').'/';

// chargements de base
require_once( $classpath . '/AbstractClass/Interfaces/AbstractIterator.php');
require_once( $classpath . 'AbstractClass/AbstractClass.php' );
require_once( $classpath . 'Errors/Errors.php');
require_once( $classpath . 'Errors/Errors/Error.php');
require_once( $classpath . 'ClassLoader.php' );


$loader = new ClassLoader();
if ( $loader->loadClass( 'Template' , $classpath ) instanceOf Errors )
{
	echo 'Impossible d\'accomplir le chargement de base';
	exit;
}

// fin chargement de base

$maquette = '<body>[BODY]</body>';
$table = '<div>[DIV]</div>';
$content = 'Hello de lu!';

$page = new Template( );
$page->SetMaquette ( $maquette );

$contenu = new Template ();
$contenu->SetMaquette ( $content );

$tableau = new Template ();
$tableau->SetMaquette ( $table );
$tableau->SetTag ( 'DIV', $contenu );

$page->SetTag ( 'BODY', $tableau );

echo $page;

?>