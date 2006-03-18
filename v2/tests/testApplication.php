<?php

$classpath = realpath('classes').'/';

// chargements de base
require_once( $classpath . 'loader.php');

// fin chargement de base

function StartAppl () 
{
	echo 'Starting<br />';
}

function EndAppl ( $var ) 
{
	echo 'Ending<br />';
	print_r($var);
}

$application = Application::GetInstance();
$application->OnApplicationStart ( 'StartAppl' , array() );
$application->OnApplicationEnd ( 'EndAppl' );
$application->Start( );

?>