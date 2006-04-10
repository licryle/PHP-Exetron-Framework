<?php

/*************************************************************************
                           |system.php|  -  load and launch main system
                             -------------------
    start                : 04/08/2006
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

require_once( 'conf.php' );
require_once( LIBRAIRIES );

function AutoLaunch ( $str )
// User's manual :
//Launch Web generation at the end of the page load
//If DEBUG_MODE is set to true, the content of
//$str will be displayed
//
// Contract :
//
{
	if ( class_exists ( 'CurrentPage' ) && is_subclass_of ( CurrentPage, 'AbstractSingleton' ) )
	{
		CurrentPage::GetInstance();
		$str = '[DEBUG='.$str.']';
	}
	
	if ( ! DEBUG_MODE )
	{
		$str = '';
	}
	
	return $str;
}

// Start Application

// connection n° MYSQL_CONF_BASE must be alwaysuse
$GLOBALS[ DB_ARRAY_INDEX ][ MYSQL_CONF_BASE ]['alwaysUse'] = 1;

ob_start ( 'AutoLaunch' );

?>