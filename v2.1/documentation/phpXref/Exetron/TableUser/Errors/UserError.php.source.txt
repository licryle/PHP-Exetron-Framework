<?php

/*************************************************************************
                           |UserError.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <UserError> (file UserError.php) --------------
/*if (defined('USERERROR_H'))
{
    return;
}
else
{

}
define('USERERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for User's Errors.
 */
//------------------------------------------------------------------------ 

class UserError extends Error
{
//----------------------------------------------------------------- PUBLIC
	/**
	 * Requested User has not been loaded from database or does not
	 * exist
	 */
    const USER_NOT_LOADED = 'USER_NOT_LOADED';

	/** Requested Group has a non valid idGroup referrent */
    const USER_IDGROUP_INEXISTANT = 'USER_IDGROUP_INEXISTANT';
	
	/** The User has a an empty name/login */
	const USER_LOGIN_EMPTY = 'USER_LOGIN_EMPTY';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>