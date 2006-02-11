<?php

$classpath = realpath('../classes').'/';

// chargements de base
require_once( $classpath . '/AbstractClass/Interfaces/AbstractIterator.php');
require_once( $classpath . 'AbstractClass/AbstractClass.php' );
require_once( $classpath . 'Errors/Errors.php');
require_once( $classpath . 'Errors/Errors/Error.php');
require_once( $classpath . 'ClassLoader.php' );

$loader = new ClassLoader();
$loader->loadClass( 'AbstractClass' , $classpath );
$loader->loadClass( 'Session' , $classpath );


$session = new Session('id','id');

print_r($_SESSION);

echo intval( $session->IsSetVariable ( 'kikou' ) ).'<br />';
echo $session->GetVariable( 'kikou' ); echo '<br />';

foreach ( $session as $var => $value )
{
	echo $var.' = '.$value.'<br />';
}

$varName = rand (1, 5);
$session->SetVariable ( $varName.'tt', rand() );

echo $session->GetVariable( $varName.'tt' ).'<br />';
print_r( $_SESSION );

echo '<a href="?'.rand().'">Lien de test</a><br /><br />';

echo $session->GetId();

?>
