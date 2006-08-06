<?php

/*************************************************************************
                           |BDDError.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <BDDError> (file BDDError.php) --------------
/*if (defined('BDDERROR_H'))
{
    return;
}
else
{

}
define('BDDERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Database's Errors.
 */
//------------------------------------------------------------------------ 

class BDDError extends Error
{
//----------------------------------------------------------------- PUBLIC
	/** Connection is currently not closed */
    const CONNECTION_NOT_CLOSED = 'CONNECTION_NOT_CLOSED';
	
	/** Connection is currently closed */
    const CONNECTION_CLOSED = 'CONNECTION_CLOSED';
	
	/** Connection is already opened */
    const CONNECTION_ALREADY_OPENED = 'CONNECTION_ALREADY_OPENED';
	
	/** Connection cannot be made */
    const CONNECTION_CANNOT_OPEN = 'CONNECTION_CANNOT_OPEN';
	
	/** Database cannot be changed for current connection */
    const CONNECTION_CANNOT_CHANGE_DB = 'CONNECTION_CANNOT_CHANGE_DB';
	
	/** Query failed */
    const CONNECTION_QUERY_FAILED = 'CONNECTION_QUERY_FAILED';
	
	/** Requested table does not exists in database */
    const CONNECTION_TABLE_INEXISTANT = 'CONNECTION_TABLE_INEXISTANT';
	
	/** Requested field does not exists in table */
    const CONNECTION_COLUMN_INEXISTANT = 'CONNECTION_COLUMN_INEXISTANT';
	
	/**
	 * TableClass given does not implement valid interface or does not
	 * herit from BDDTable
	*/
	const TABLE_CLASS_INCORRECT = 'TABLE_CLASS_INCORRECT';
	
	/** BDDRecord is not valid */
	const RECORD_NOT_VALID = 'RECORD_NOT_VALID';
	
	/** Cannot update an inexistant record */
	const RECORD_UPDATE_DOESNT_EXIST = 'RECORD_UPDATE_DOESNT_EXIST';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>