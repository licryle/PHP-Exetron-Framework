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

require ( dirname( __FILE__ ).'/AbstractClass/loader.php' ); // Type : SubLoader
require ( dirname( __FILE__ ).'/Errors/loader.php' ); // Type : SubLoader

require ( dirname( __FILE__ ).'/Application/loader.php' ); // Type : SubLoader
require ( dirname( __FILE__ ).'/Session/loader.php' ); // Type : SubLoader

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

?>