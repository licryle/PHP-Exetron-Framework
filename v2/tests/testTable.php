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
    echo 'Connection OK<br />';
    
    if ( ( $errs = $mysql->SetDatabase( 'exetron' ) ) != NULL )
    {
        echo $errs,'<br />';
    }
    else
    {
        echo 'Base chang�e avec succ�s<br />';
		
		$base = 'Mysql';
		$tableName = $base.'TableVariable';
		$tableConf = new $tableName ( 'variable', $mysql, $errors );
	
		if ( $errors instanceOf Errors ) 
		{
			echo $errors;
		}
		else
		{
			echo 'Instance de Table Variable cr��e<br />';

			$config = new Variables ( $tableConf, $errors );
			
			if ( $errors instanceOf Errors ) 
			{
				echo $errors;
			}
			else
			{
				echo 'Instance de Variable cr��e<br />';
				
				if ( ($errs = $config->LoadServerVariables ( ) ) instanceOf Errors )
				{
					echo 'Erreur survenue lors du chargement de la config server';
					echo $errs;
				}
				else
				{
					if ( ( $var  = & $config->GetVariable('UNKNOWN_VAR')) instanceOf Errors )
					{
						echo $var;
					}
					else
					{
						echo $var;
					}

					echo '<br />';
					
					if ( ( $var  = $config->GetVariable('TABLE_NAME_SITE')) instanceOf Errors )
					{
						echo $var;
					}
					else
					{
						$var->SetProperty( TableVariable::TABLE_COLUMN_DATA , 'site' );
						/*echo $var->Validate();
						echo 'Saved : '.intval($config->SaveVariables ()==NULL).'<br/>' ;
						
						$config->LoadServerVariables ( );
						echo $config->GetVariable('TABLE_NAME_SITE');*/
					}
				}
			}
		}
    }
}

?>