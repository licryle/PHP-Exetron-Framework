<?php

$classpath = realpath('../classes').'/';

// Test de l'interface Web
require( $classpath . 'classes/AbstractClass/Interfaces/AbstractIterator.php');
require( $classpath . 'classes/AbstractClass/AbstractClass.php');
require( $classpath . 'classes/Errors/Errors/Error.php');
require( $classpath . 'classes/Errors/Errors.php');

require( $classpath . 'classes/HTMLPage/Errors/HTMLPageError.php');

require( $classpath . 'classes/HTMLPage/Iterators/Locator.php');
require( $classpath . 'classes/HTMLPage/Iterators/LocatorItem.php');

require( $classpath . 'classes/HTMLPage/HTMLPage.php');

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