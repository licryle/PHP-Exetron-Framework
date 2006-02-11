<?php

$classpath = realpath('../classes').'/';

// chargements de base
require_once( $classpath . '/AbstractClass/Interfaces/AbstractIterator.php');
require_once( $classpath . 'AbstractClass/AbstractClass.php' );
require_once( $classpath . 'Errors/Errors.php');
require_once( $classpath . 'Errors/Errors/Error.php');
require_once( $classpath . 'ClassLoader.php' );


$loader = new ClassLoader();
if ( $loader->loadClass( 'Application' , $classpath ) instanceOf Errors )
{
	echo 'Impossible d\'accomplir le chargement de base';
	exit;
}
if ( $loader->loadClass( 'BDDConnection' , $classpath ) instanceOf Errors )
{
	echo 'Impossible d\'accomplir le chargement de base';
	exit;
}
if ( $loader->loadClass( 'TableVariable' , $classpath ) instanceOf Errors )
{
	echo 'Impossible d\'accomplir le chargement de base';
	exit;
}

// fin chargement de base

function StartAppl () 
{
	echo 'Starting<br />';
}

function EndAppl ( $var, $var2, $var3) 
{
	echo 'Ending<br />'.$var.$var2.$var3;
}

$application = Application::Application();
$application->OnApplicationStart ( 'StartAppl' , array() );
$application->OnApplicationEnd ( 'EndAppl' , array('\'"',2,3) );
$application->Start( );

?>