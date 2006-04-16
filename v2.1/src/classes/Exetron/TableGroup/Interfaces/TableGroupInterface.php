<?php

/*************************************************************************
                           |TableGroupInterface.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Interface <TableGroupInterface> (file TableGroupInterface.php) --------------
/*if (defined('TABLEGROUPINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEGROUPINTERFACE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for TableGroup management for any databases.
 */
//------------------------------------------------------------------------ 

interface TableGroupInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

	/*
	 * Selects all the Groups from Table.
     *
     * @return - a list of Group-s in a Groups object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectGroups (); 
	
	/*
	 * Selects the Group from table which TableGroup::TABLE_COLUMN_IDGROUP
	 * equals to $idGroup.
     *
	 * @param $idGroup the id of the Group to select
	 *
     * @return - the Group which TableGroup::TABLE_COLUMN_IDGROUP equals to
	 * $idGroup in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectGroupByIdGroup ( $idGroup );
	
	/*
	 * Selects the Group-s from table which TableGroup::TABLE_COLUMN_NAME
	 * looks like $groupName.
     *
	 * @param $groupName the name of the Group to select. It can contain
	 * magic chars like BDD_SEEK_MULTICHARS and BDD_SEEK_ANYCHAR where BDD
	 * represent your database type. Please refer to your database documentation.
	 *
     * @return - a Groups object : the Group-s which 
	 * TableGroup::TABLE_COLUMN_NAME looks like $groupName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function FindGroupsByName ( $groupName );
	
	/*
	 * Tries to update the given group $updatedGroup in function of its
	 * property TableGroup::TABLE_COLUMN_IDGROUP.
	 *
	 * @param $updatedGroup The group to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */	
	public function UpdateGroupByIdGroup ( Group $updatedGroup );
	
	
	/*
	 * Inserts the given Group $group into the table.
	 *
	 * @param $group The group to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertGroup ( Group $group );
	
	/*
	 * Checks whether the group of id $idGroup exists or not.
	 *
	 * @param $idGroup The TableGroup::TABLE_COLUMN_IDGROUP of the group 
	 * to be checked.
	 *
	 * @return - true if group exists
	 * @return - false otherwise
     *
     */
	public function IdGroupExists ( $idGroup );
    
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>