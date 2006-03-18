<?php

/*************************************************************************
                           |loader.php|  -  load classes of directory
                             -------------------
    start                : |DATE|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//-------------------------------------------------------- system Includes
//require(); // Type : Class/Conf/

$directory = dirname( __FILE__ );

require_once ( $directory.'/System/loader.php' ); // Type : SubLoader

$directory = dirname( __FILE__ );
require_once ( $directory.'/DataBases/loader.php' ); // Type : SubLoader

$directory = dirname( __FILE__ );
require_once ( $directory.'/Templates/loader.php' ); // Type : SubLoader

$directory = dirname( __FILE__ );
require_once ( $directory.'/Exetron/loader.php' ); // Type : SubLoader

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

?>