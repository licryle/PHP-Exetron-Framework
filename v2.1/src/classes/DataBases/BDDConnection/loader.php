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

require_once ( $directory.'/Errors/BDDError.php' ); // Type : Error

require_once ( $directory.'/Iterators/BDDRecord.php' ); // Type : IteratorItem
require_once ( $directory.'/Iterators/BDDRecordSet.php' ); // Type : Iterator

require_once ( $directory.'/Interfaces/BDDConnectionInterface.php' ); // Type : Interface
require_once ( $directory.'/Interfaces/BDDTableInterface.php' ); // Type : Interface

require_once ( $directory.'/BDDConnection.php' ); // Type : Class
require_once ( $directory.'/BDDTable.php' ); // Type : Class

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 


?>