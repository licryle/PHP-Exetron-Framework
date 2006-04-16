<?php

/*************************************************************************
                           |GroupError.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <GroupError> (file GroupError.php) --------------
/*if (defined('GROUPERROR_H'))
{
    return;
}
else
{

}
define('GROUPERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Group's Errors.
 */
//------------------------------------------------------------------------ 

class GroupError extends Error
{
//----------------------------------------------------------------- PUBLIC
	/**
	 * Requested Group has not been loaded from database or does not
	 * exist
	 */
    const GROUP_NOT_LOADED = 'GROUP_NOT_LOADED';

	/** Requested Group has a non valid idSite referrent */
    const GROUP_IDSITE_INEXISTANT = 'GROUP_IDSITE_INEXISTANT';
	
	/** The Group has a an empty name */
	const GROUP_NAME_EMPTY = 'GROUP_NAME_EMPTY';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>