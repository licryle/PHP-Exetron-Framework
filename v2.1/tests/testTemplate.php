<?php

// chargements de base
require_once( '../release/lib/librairies.php' );


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