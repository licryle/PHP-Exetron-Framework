<?php

/*************************************************************************
                           |TemplateError.php|
                             -------------------
    start                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- class <TemplateError> (file TemplateError.php) -----------------
/*if (defined('TEMPLATEERROR_H'))
{
    return;
}
else
{

}
define('TEMPLATEERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Template's Errors.
 */
//------------------------------------------------------------------------ 

class TemplateError extends Error
{
//----------------------------------------------------------------- PUBLIC
	/** Tag does not exists */
    const TEMPLATE_TAG_INEXISTANT = 'TEMPLATE_TAG_INEXISTANT';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>