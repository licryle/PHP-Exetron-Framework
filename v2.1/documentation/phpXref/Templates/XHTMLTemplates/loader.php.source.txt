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

require ( $directory.'/XHTMLTemplate/loader.php' ); // Type : SubLoader

$directory = dirname( __FILE__ );
require ( $directory.'/XHTMLBodyTemplate/loader.php' ); // Type : SubLoader

$directory = dirname( __FILE__ );
require ( $directory.'/XHTMLHeadersTemplate/loader.php' ); // Type : SubLoader

$directory = dirname( __FILE__ );
require ( $directory.'/XHTMLPageTemplate/loader.php' ); // Type : SubLoader

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

?>