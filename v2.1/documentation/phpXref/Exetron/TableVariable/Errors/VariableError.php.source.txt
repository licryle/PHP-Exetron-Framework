<?php

/*************************************************************************
                           |VariableError.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <VariableError> (file VariableError.php) --------------
/*if (defined('VARIABLEERROR_H'))
{
    return;
}
else
{

}
define('VARIABLEERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Variable's Errors.
 */
//------------------------------------------------------------------------ 

class VariableError extends Error
{
//----------------------------------------------------------------- PUBLIC
	/**
	 * Requested Variable has not been loaded from database or does not
	 * exist
	 */
    const VARIABLE_NOT_LOADED = 'VARIABLE_NOT_LOADED';
	
	/** The Variable has a an empty name */
    const VARIABLE_NAME_EMPTY = 'VARIABLE_NAME_EMPTY';
	
	/** The scope of the variable is not valid */
    const VARIABLE_SCOPE_INCORRECT = 'VARIABLE_SCOPE_INCORRECT';
	
	/** The access of the variable is not valid */
    const VARIABLE_ACCESS_INCORRECT = 'VARIABLE_ACCESS_INCORRECT';
	
	/** Requested Group has a non valid idSite referrent */
    const VARIABLE_IDSITE_INEXISTANT = 'VARIABLE_IDSITE_INEXISTANT';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>