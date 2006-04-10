<?php

// chargements de base
require_once( '../release/lib/librairies.php' );

define ('BASE','MySQL');

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