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

require ( $directory.'/AbstractClass/loader.php' ); // Type : SubLoader

$directory = dirname( __FILE__ );
require ( $directory.'/AbstractSingleton/loader.php' ); // Type : SubLoader

$directory = dirname( __FILE__ );
require ( $directory.'/Errors/loader.php' ); // Type : SubLoader

$directory = dirname( __FILE__ );
require ( $directory.'/Application/loader.php' ); // Type : SubLoader

$directory = dirname( __FILE__ );
require ( $directory.'/AbstractSitePage/loader.php' ); // Type : SubLoader

$directory = dirname( __FILE__ );
require ( $directory.'/Session/loader.php' ); // Type : SubLoader

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

?>