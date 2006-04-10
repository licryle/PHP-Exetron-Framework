<?php

/*************************************************************************
                           |AbstractSitePageError.php|  -  description
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Interface of <AbstractSitePageError> class (file AbstractSitePageError.php) -----------------
if (defined('ABSTRACTSITEPAGEERROR_H'))
{
    return;
}
else
{

}
define('ABSTRACTSITEPAGEERROR_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Role of <AbstractSitePageError> class
//Extension of the Error class, implements constants for specific
//Application errors
//
//------------------------------------------------------------------------ 

class AbstractSitePageError extends Error
{
//----------------------------------------------------------------- PUBLIC

	const FUNCTION_NOT_CALLABLE = 'FUNCTION_NOT_CALLABLE';
	const FUNCTION_PARAM_NOT_ARRAY = 'FUNCTION_PARAM_NOT_ARRAY';
	const CALLBACK_NOT_EXISTS = 'CALLBACK_NOT_EXISTS';

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//----------------------------------------------------- Attributs protégés

}

//----------------------------------------------------- Others definitions

?>