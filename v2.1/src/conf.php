<?php

/*************************************************************************
                           |config.php|  -  provides configuration
	for the System
                             -------------------
    start                : 04/08/2006
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

// DataBases connections' configuration
define ( 'DB_ARRAY_INDEX', 'db');

// Configuration Table Name : start of the configuration
define ( 'CONFIGURATION_TABLE_NAME', 'variable' );

// Configuration's constants
	define ( 'TABLE_NAME_SITE', 'TABLE_NAME_SITE' );
	define ( 'TABLE_NAME_USER', 'TABLE_NAME_USER' );
	define ( 'TABLE_NAME_GROUP', 'TABLE_NAME_GROUP' );
	
	define ( 'SITE_EXTERN_URL', 'SITE_EXTERN_URL' );
	define ( 'SITE_SESSIONS_ACTIVATED', 'SITE_SESSIONS_ACTIVATED' );
	define ( 'SITE_TITLE', 'SITE_TITLE' );
	define ( 'SITE_DESCRIPTION', 'SITE_DESCRIPTION' );
	define ( 'SITE_KEYWORDS', 'SITE_KEYWORDS' );
// end of Configuration's constants


// databases' connections
$GLOBALS[ DB_ARRAY_INDEX ][0]['type'] = 'MySQL';
$GLOBALS[ DB_ARRAY_INDEX ][0]['host'] = 'localhost';
$GLOBALS[ DB_ARRAY_INDEX ][0]['login'] = '';
$GLOBALS[ DB_ARRAY_INDEX ][0]['password'] = '';
$GLOBALS[ DB_ARRAY_INDEX ][0]['database'] = 'exetron';
$GLOBALS[ DB_ARRAY_INDEX ][0]['alwaysUse'] = 1;

// Select the base to be used for configuration
// Be careful : this connection will be automatically set to alwaysuse
define ( 'MYSQL_CONF_BASE', 0 );

// Debug mode
define ( 'DEBUG_MODE', 1 );

// Current Site
define ( 'IDSITE', 1 );

// Paths
$GLOBALS['paths']['lib'] = realpath('.');

define( 'LIBRAIRIES', $GLOBALS['paths']['lib'] . 'librairies.php' );

?>