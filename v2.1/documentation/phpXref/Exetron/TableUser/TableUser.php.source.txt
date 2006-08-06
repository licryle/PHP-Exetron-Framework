<?php

/*************************************************************************
                           |TableUser.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <TableUser> (file TableUser.php) --------------
/*if (defined('TABLEUSER_H'))
{
    return;
}
else
{

}
define('TABLEUSER_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides constants for User table fields name
 */
//------------------------------------------------------------------------ 

class TableUser
{
//----------------------------------------------------------------- PUBLIC

	/** Primary key field of the User table */
	const TABLE_COLUMN_IDUSER = 'iduser';
	
	/** User name/login field */
	const TABLE_COLUMN_NAME = 'name';
	
	/** User password field */
	const TABLE_COLUMN_PASSWORD = 'pass';
	
	/** Foreign key that refers to Group Table */
	const TABLE_COLUMN_IDGROUP = 'idgroup';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>