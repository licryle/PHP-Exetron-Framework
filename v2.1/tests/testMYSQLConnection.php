<?php

// chargements de base
require_once( '../release/lib/librairies.php' );

$mysql = new MYSQLConnection ( );
/*$mysql->setServer('sql.free.fr');
$mysql->setUsername('exetron');
$mysql->setPassword('');*/
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