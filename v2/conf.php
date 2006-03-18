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
$GLOBALS['DB'][0]['type'] = 'MySQL';
$GLOBALS['DB'][0]['host'] = 'localhost';
$GLOBALS['DB'][0]['login'] = '';
$GLOBALS['DB'][0]['password'] = '';

// Debug mode
$GLOBALS['debug'] = 1;

// Paths
$GLOBALS['paths']['classes'] = 'W:\\www\\exetron\\v2\\classes\\';

$GLOBALS['librairies'] = 'W:\\www\\exetron\\v2\\classes\\librairies.php';

?>