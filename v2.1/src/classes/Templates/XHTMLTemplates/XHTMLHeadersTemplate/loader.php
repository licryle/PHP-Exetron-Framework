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

require_once ( $directory.'/XHTMLHeadersTemplates/loader.php' ); // Type : Subloader

require_once ( $directory.'/XHTMLHeadersTemplate.php' ); // Type : Class

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 


?>