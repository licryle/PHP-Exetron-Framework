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

require_once ( $directory.'/Errors/SiteError.php' ); // Type : Error

require_once ( $directory.'/Interfaces/TableSiteInterface.php' ); // Type : Interface

require_once ( $directory.'/Iterators/Site.php' ); // Type : IteratorItem
require_once ( $directory.'/Iterators/Sites.php' ); // Type : Iterator

require_once ( $directory.'/MySQLTableSite.php' ); // Type : MySQLTable Management
require_once ( $directory.'/TableSite.php' ); // Type : High Level Table Management

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 


?>