<?php

$classpath = realpath('../classes').'/';

// chargements de base
require_once( $classpath . '/AbstractClass/Interfaces/AbstractIterator.php');
require_once( $classpath . 'AbstractClass/AbstractClass.php' );
require_once( $classpath . 'Errors/Errors.php');
require_once( $classpath . 'Errors/Errors/Error.php');
require_once( $classpath . 'ClassLoader.php' );

$loader = new ClassLoader();
if ( $loader->loadClass( 'AbstractClass' , $classpath ) instanceOf Errors )
{
	echo 'Impossible d\'accomplir le chargement de base';
	exit;
}

// fin chargement de base

if ( $loader->loadClass( 'HTMLPage' , $classpath ) instanceOf Errors )
{
	echo 'Impossible de charger la classe de base';
	exit;
}

$design = new HTMLPage( HTMLPage::DEBUG_ENABLED );
if ( ( $errors = $design->SetMaquette( 'Vous �tes ici : [LOCATOR]<br /><br />[BODY]<br />Page g�n�r�e en [EXECTIME] s.' ) ) instanceof Errors ) 
{
    echo $errors;
}
else
{
    $design->getLocator()->Add( new LocatorItem ( 'http://cyrille2.free.fr/' , 'http://cyrille2.free.fr/' ) );
    $design->getLocator()->Add( new LocatorItem ( 'CV' , 'http://cyrille2.free.fr/fr/cv/' ) );
    
    $design->AddRawHTML ( 'Hello my <a href="http://google.fr">dear</a><br /> ');
}

echo 'h�llo world';

?>