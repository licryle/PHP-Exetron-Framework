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

$mysql = new MYSQLConnection ( );
$mysql->setServer('localhost');
$mysql->setUsername('exetron');
$mysql->setPassword('');

if ( ( $errs = $mysql->Close( ) ) != NULL )
{
    echo $errs,'<br />';
}


if ( ( $errs = $mysql->Open( BDDConnection::CONNECTION_PERSISTENT ) ) != NULL )
{
    echo $errs,'<br />';
}
else
{
    echo 'Connection OK<br />';
    
    if ( ( $errs = $mysql->setUsername( 'coucou' ) ) != NULL )
    {
        echo $errs,'<br />';
    }
    
    if ( ( $errs = $mysql->SetDatabase( 'coucou' ) ) != NULL )
    {
        echo $errs,'<br />';
    }
    
    if ( ( $errs = $mysql->SetDatabase( 'exetron' ) ) != NULL )
    {
        echo $errs,'<br />';
    }
    else
    {
        echo 'Base chang�e avec succ�s<br />';
        
        if ( ( $res = $mysql->TableDescription( 'sites' ) ) instanceof Errors )
        {
            echo $res,'<br />';
          
        }
        else
        {
            foreach ( $res as $champ )
            {
				echo '<br /><br />Nvx Champ :<br/>';
                foreach ( $champ as $carac => $value )
				{
					echo $carac.' : '.$value.'<br />';
				}				
            }
        } 
		
        if ( ( $res = $mysql->Query( 'SHOW tables FROM exetron' ) ) instanceof Errors )
        {
            echo $res,'<br />';
          
        }
        else
        {
            foreach ( $res as $champ )
            {
				echo '<br /><br />Nvl table :<br/>';
                foreach ( $champ as $carac => $value )
				{
					echo $carac.' : '.$value.'<br />';
				}				
            }
        }        
    }
}

?>