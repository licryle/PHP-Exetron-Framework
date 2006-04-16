<?php

/*************************************************************************
                           |TableGroup.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <TableGroup> (file TableGroup.php) --------------
/*if (defined('TABLEGROUP_H'))
{
    return;
}
else
{

}
define('TABLEGROUP_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides constants for Group table fields name
 */
//------------------------------------------------------------------------ 

class TableGroup
{
//----------------------------------------------------------------- PUBLIC

	/** Primary key field of the Group table */
	const TABLE_COLUMN_IDGROUP = 'idgroup';
	
	/** Group name field */
	const TABLE_COLUMN_NAME = 'name';
	
	/** Group accesses field  : is this Group the most powerful ? */
	const TABLE_COLUMN_OVERRIDE = 'override';
	
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