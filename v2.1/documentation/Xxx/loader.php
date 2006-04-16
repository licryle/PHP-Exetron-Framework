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

require_once ( $directory.'/Errors/XxxError.php' ); // Type : Error

require_once ( $directory.'/Interface/XxxInterface.php' ); // Type : Interface

require_once ( $directory.'/Iterators/Xxx.php' ); // Type : IteratorItem
require_once ( $directory.'/Iterators/Xxxs.php' ); // Type : Iterator

require_once ( $directory.'/Xxx.php' ); // Type : Class

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 


?>