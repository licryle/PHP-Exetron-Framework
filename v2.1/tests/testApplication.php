<?php

// chargements de base
require_once( '../release/lib/librairies.php' );

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