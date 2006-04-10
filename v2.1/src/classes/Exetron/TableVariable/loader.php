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

require_once ( $directory.'/Errors/VariableError.php' ); // Type : Error

require_once ( $directory.'/Interfaces/TableVariableInterface.php' ); // Type : Interface

require_once ( $directory.'/Iterators/Variable.php' ); // Type : IteratorItem
require_once ( $directory.'/Iterators/Variables.php' ); // Type : Iterator

require_once ( $directory.'/MySQLTableVariable.php' ); // Type : MySQLTable Management
require_once ( $directory.'/TableVariable.php' ); // Type : High Level Table Management

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 


?>