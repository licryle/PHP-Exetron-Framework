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

require_once ( dirname( __FILE__ ).'/TableGroup/loader.php' ); // Type : loader
require_once ( dirname( __FILE__ ).'/TableUser/loader.php' ); // Type : loader
require_once ( dirname( __FILE__ ).'/TableVariable/loader.php' ); // Type : loader
require_once ( dirname( __FILE__ ).'/TableSite/loader.php' ); // Type : loader

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 


?>