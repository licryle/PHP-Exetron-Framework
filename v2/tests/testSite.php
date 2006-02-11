<?php

$classpath = realpath('../classes').'/';

// chargements de base
require_once( $classpath . '/AbstractClass/Interfaces/AbstractIterator.php');
require_once( $classpath . 'AbstractClass/AbstractClass.php' );
require_once( $classpath . 'Errors/Errors.php');
require_once( $classpath . 'Errors/Errors/Error.php');
require_once( $classpath . 'ClassLoader.php' );

define ('BASE','MySQL');

$loader = new ClassLoader();
if ( $loader->loadClass( 'AbstractClass' , $classpath ) instanceOf Errors )
{
	echo 'Impossible d\'accomplir le chargement de base';
	exit;
}

// fin chargement de base

if ( $loader->loadClass( 'BDDConnection' , $classpath ) instanceOf Errors )
{
	die('Impossible de charger la classe de BDD');
}

if ( $loader->loadClass( 'MySQLConnection' , $classpath ) instanceOf Errors )
{
	die('Impossible de charger la classe de Mysql');
}


if ( $loader->loadClass( 'TableVariable' , $classpath ) instanceOf Errors )
{
	die('Impossible de charger la classe de Table Variable');
}

if ( $loader->loadClass( 'TableSite' , $classpath ) instanceOf Errors )
{
	die('Impossible de charger la classe de Table Site');
}

$mysql = new MYSQLConnection ( );
$mysql->setServer('127.0.0.1');
$mysql->setUsername('localuser');
$mysql->setPassword('localpassword');


if ( ( $errs = $mysql->Open( BDDConnection::CONNECTION_PERSISTENT ) ) != NULL )
{
    echo $errs,'<br />';
}
else
{    
    if ( ( $errs = $mysql->SetDatabase( 'exetron' ) ) != NULL )
    {
        echo $errs,'<br />';
    }
    else
    {		
		$classVariables = BASE.'TableVariable';
	
		$tableConf = new $classVariables ( 'variable', $mysql, $errors );
		$config = new Variables ( $tableConf, $errors );		
		
		// Chargement des variables serveur 
		$config->LoadServerVariables();
		
		
		$classSites = BASE.'TableSite';
		
		$tableSite = new $classSites ( $config->GetVariableByName( 'TABLE_NAME_SITE')->GetProperty( TableVariable::TABLE_COLUMN_DATA ) , $mysql, $errors );
		$sites = new Sites ( $tableSite, $errors );
		
		// affichage de tous les sites
		$sites->LoadSites ();	
		foreach ( $sites as $site )
		{
			echo $site->GetProperty( TableSite::TABLE_COLUMN_NAME ).' d\'id '.$site->GetProperty( TableSite::TABLE_COLUMN_IDSITE ).'<br />';
		}
		$sites->DelAll();

		// insertion d'un nouveau site
		$tifaz = new Site ( new BDDRecord() );
		$tifaz->SetProperty ( TableSite::TABLE_COLUMN_NAME, 't\'ifa\\"z' );
		$tifaz->Validate( );
		
		$sites->SetSite ( $tifaz );
		
		echo $sites->SaveSites ( );
		
	}
}

?>