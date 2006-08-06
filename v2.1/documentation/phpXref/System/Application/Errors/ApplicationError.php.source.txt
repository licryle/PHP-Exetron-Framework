<?php

/*************************************************************************
                           |ApplicationError.php|
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <ApplicationError>  (file ApplicationError.php) -----------------
/*if (defined('APPLICATIONERROR_H'))
{
    return;
}
else
{

}
define('APPLICATIONERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Application's Errors.
 */
//------------------------------------------------------------------------ 

class ApplicationError extends Error
{
//----------------------------------------------------------------- PUBLIC

	/**
	 * The given function does not have suffisant scope to be called
	 * or does not exists
	 */
	const FUNCTION_NOT_CALLABLE = 'FUNCTION_NOT_CALLABLE';
	
	/** Parameters of function must be an array */
	const FUNCTION_PARAM_NOT_ARRAY = 'FUNCTION_PARAM_NOT_ARRAY';
	
	/** The given callback does not exists and cannot be set */
	const CALLBACK_NOT_EXISTS = 'CALLBACK_NOT_EXISTS';

	/** Callback has not been set and cannot be launched */
	const CALLBACK_NOT_SET = 'CALLBACK_NOT_SET';
	
	/** Application has already been started */
	const ALREADY_STARTED = 'ALREADY_STARTED';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>