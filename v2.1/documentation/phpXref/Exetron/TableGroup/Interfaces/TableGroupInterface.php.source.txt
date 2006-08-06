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

	/**
	 * Updates validated items in $groups in function of its idGroup.
	 * If idGroup doesn't exist, item is inserted.
	 * If an item of $groups hasn't been validate, it is skipped.
	 *
	 * @param $groups a Groups of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
    public function SaveGroups ( Groups $groups );
	/**
	 * Selects all the Group-s from Table.
     *
     * @return - a list of Group-s in a Groups object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectGroups (); 
	
	/**
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
	

	/**
	 * Selects the Group-s from table which TableGroup::TABLE_COLUMN_IDSITE
	 * equals to $idSite. In other words : Group-s that belong to the site of 
	 * id $idSite
     *
	 * @param $idSite the id of the Site the Group may belong
	 *
     * @return - A Groups of Group-s which TableGroup::TABLE_COLUMN_IDSITE 
	 * equals to $idSite in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectGroupsByIdSite ( $idSite );
	 
	/**
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
	
	/**
	 * Tries to update the given group $updatedGroup in function of its
	 * property TableGroup::TABLE_COLUMN_IDGROUP.
	 *
	 * @param $updatedGroup The Group to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */	
	public function UpdateGroupByIdGroup ( Group $updatedGroup );
	
	
	/**
	 * Inserts the given Group $group into the table.
	 *
	 * @param $group The Group to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertGroup ( Group $group );
	
	/**
	 * Checks whether the Group of id $idGroup exists or not.
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