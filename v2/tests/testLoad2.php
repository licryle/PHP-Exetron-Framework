<?php

$classpath = realpath('classes').'/';

// chargements de base
require_once( $classpath . '/System/loader.php');
require_once( $classpath . '/Databases/loader.php');
require_once( $classpath . '/Exetron/loader.php');
require_once( $classpath . '/Templates/loader.php');


function StartAppl () 
{
}

function EndAppl ( $var ) 
{
	$exectime = new Template();
	$exectime->SetMaquette ( round( microtime(true) - $var['launchTime'], 3 ) );

	$GLOBALS[ 'page' ]->GetBody()->SetTag( 'EXECTIME', $exectime );
		
	echo $GLOBALS[ 'page' ];
}

$GLOBALS[ 'page' ] = new XHTMLPageTemplate () ;
$GLOBALS[ 'page' ]->SetMaquette (
'<?xml version="1.1" encoding="iso-8859-1" standalone="no" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	
<!-- Start of XHTML Page -->
<html>

<!-- Start of Headers -->
[HEAD]
<!-- End of Headers -->

<!-- Start of Body -->
[BODY]
<!-- End of Body -->

</html>
<!-- End of XHTML Page -->' );

$GLOBALS[ 'page' ]->GetHeaders ()->AddHeaders( '<title>Coucou</title>' );
$GLOBALS[ 'page' ]->GetHeaders ()->AddHeaders( '<script />' );

$GLOBALS[ 'page' ]->GetBody()->SetMaquette (
'
<body [PARAMS]>
[CONTENT]<br />
Exécuté en [EXECTIME]s.
</body>
');

$GLOBALS[ 'page' ]->GetBody()->AddContent( 'Bonjour!');
 

$application = Application::Application();
$application->OnApplicationStart ( 'StartAppl' , array() );
$application->OnApplicationEnd ( 'EndAppl' ) ;
$application->Start( );

?>