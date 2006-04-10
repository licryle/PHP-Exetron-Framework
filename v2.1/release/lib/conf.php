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

$GLOBALS[ DB_ARRAY_INDEX ][0]['type'] = 'MySQL';
$GLOBALS[ DB_ARRAY_INDEX ][0]['host'] = 'localhost';
$GLOBALS[ DB_ARRAY_INDEX ][0]['login'] = '';
$GLOBALS[ DB_ARRAY_INDEX ][0]['password'] = '';
$GLOBALS[ DB_ARRAY_INDEX ][0]['alwaysUse'] = 1;

// Debug mode
define ( 'DEBUG_MODE', 1 );

// Paths
$GLOBALS['paths']['lib'] = realpath('.');

define( 'LIBRAIRIES', $GLOBALS['paths']['lib'] . 'librairies.php' );

?>