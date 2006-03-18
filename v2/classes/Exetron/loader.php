<?php

/*************************************************************************
                           |loader.php|  -  load classes of directory
                             -------------------
    start                : |DATE|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//-------------------------------------------------------- system Includes
//require(); // Type : Class/Conf/Loader

$directory = dirname( __FILE__ );

require_once ( $directory.'/XHTMLSitePage/loader.php' ); // Type : loader


$directory = dirname( __FILE__ );
require_once ( $directory.'/TableGroup/loader.php' ); // Type : loader

$directory = dirname( __FILE__ );
require_once ( $directory.'/TableUser/loader.php' ); // Type : loader

$directory = dirname( __FILE__ );
require_once ( $directory.'/TableVariable/loader.php' ); // Type : loader

$directory = dirname( __FILE__ );
require_once ( $directory.'/TableSite/loader.php' ); // Type : loader

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 


?>