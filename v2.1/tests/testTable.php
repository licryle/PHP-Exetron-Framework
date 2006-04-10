<?php

// chargements de base
require_once( '../release/lib/librairies.php' );

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