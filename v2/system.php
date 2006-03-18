<?php

/*************************************************************************
                           |system.php|  -  load and launch main system
                             -------------------
    start                : 04/08/2006
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

require_once( 'conf.php' );
require_once( $GLOBALS['librairies'] );

function AutoLaunch ( $str )
// User's manual :
//Launch Web generation at the end of the page load
//If $GLOBALS['debug'] is set to true, the content of
//$str will be displayed
//
// Contract :
//
{
	CurrentPage::GetInstance();
	
	if ( $GLOBALS['debug'] )
	{
		echo $str;
	}
}

ob_start ( 'AutoLaunch' );

?>