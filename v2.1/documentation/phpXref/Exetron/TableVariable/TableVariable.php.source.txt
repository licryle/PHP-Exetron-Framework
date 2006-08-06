<?php

/*************************************************************************
                           |TableVariable.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <TableVariable> (file TableVariable.php) --------------
/*if (defined('TABLEVARIABLE_H'))
{
    return;
}
else
{

}
define('TABLEVARIABLE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides constants for Variable table fields name
 */
//------------------------------------------------------------------------ 

class TableVariable
{
//----------------------------------------------------------------- PUBLIC

	/** Primary key field of the Variable table */
	const TABLE_COLUMN_IDVARIABLE = 'idvariable';
	
	/** Variable scope field */
	const TABLE_COLUMN_SCOPE = 'scope';
	
	// TABLE_COLUMN_SCOPE's enum
	
		/** The variable just concerns current site */
		const TABLE_COLUMN_SCOPE_SITE = 'SITE';
		
		/** The variable concerns all sites */
		const TABLE_COLUMN_SCOPE_SERVER = 'SERVER';
		
	// end of TABLE_COLUMN_SCOPE's enum
	
	/** Variable Accesses field : defines who can modify it */
	const TABLE_COLUMN_ACCESS = 'access';

	// TABLE_COLUMN_ACCESS's enum
	
		/** The variable can only be modified by Global Admins */
		const TABLE_COLUMN_ACCESS_ROOT = 'ROOT';
		
		/** The variable can be modified by Site Admins (or globals)*/
		const TABLE_COLUMN_ACCESS_ADMIN = 'ADMIN';
		
	// end of TABLE_COLUMN_ACCESS's enum
	
	/** Variable Name field */
	const TABLE_COLUMN_NAME = 'name';
	
	/** Variable Data field */
	const TABLE_COLUMN_DATA = 'data';
	
	/** Foreign key that refers to Site Table */
	const TABLE_COLUMN_IDSITE = 'idsite';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>