<?php

// Test de l'interface Web


// chargements de base
require_once( '../release/lib/librairies.php' );

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