<?php

/*************************************************************************
                           |TableUserInterface.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <TableUserInterface> (file TableUserInterface.php) --------------
/*if (defined('TABLEUSERINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEUSERINTERFACE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for TableUser management for any databases.
 */
//------------------------------------------------------------------------ 

interface TableUserInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

	/**
	 * Updates validated items in $users in function of its idUser.
	 * If idUser doesn't exist, item is inserted.
	 * If an item of $users hasn't been validate, it is skipped.
	 *
	 * @param $users a Users of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
    public function SaveUsers ( Users $users );
	 
	/**
	 * Selects all the User-s from Table.
     *
     * @return - a list of User-s in a Users object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectUsers ();
	
	/**
	 * Selects the Site from table which TableUser::TABLE_COLUMN_IDUSER
	 * equals to $idUser.
     *
	 * @param $idUser the id of the User to select
	 *
     * @return - the User which TableUser::TABLE_COLUMN_IDUSER equals to
	 * $idUser in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectUserByIdUser ( $idUser );
	
	/**
	 * Selects the User-s from table which TableUser::TABLE_COLUMN_IDGROUP
	 * equals to $idGroup. In other words : User-s that belong to the group of 
	 * id $idGroup
     *
	 * @param $idGroup the id of the Group the User may belong
	 *
     * @return - A Users of User-s which TableUser::TABLE_COLUMN_IDGROUP 
	 * equals to $idGroup in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectUsersByIdGroup ( $idGroup );	
	
	/**
	 * Selects the User-s from table which TableUser::TABLE_COLUMN_NAME
	 * looks like $userName.
     *
	 * @param $userName the name of the User to select. It can contain
	 * magic chars like MYSQL_SEEK_MULTICHARS and MYSQL_SEEK_ANYCHAR. 
	 * Please refer to your database documentation.
	 *
     * @return - a Users object : the User-s which 
	 * TableUser::TABLE_COLUMN_NAME looks like $userName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function FindUsersByName ( $userName );
	
	/**
	 * Tries to update the given site $updatedUser in function of its
	 * property TableUser::TABLE_COLUMN_IDUSER.
	 *
	 * @param $updatedUser The User to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */	
	public function UpdateUserByIdUser ( User $updatedUser );
	
	/**
	 * Inserts the given User $user into the table.
	 *
	 * @param $user The User to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertUser ( User $user );
	
	/**
	 * Checks whether the User of id $idUser exists or not.
	 *
	 * @param $idUser The TableUser::TABLE_COLUMN_IDUSER of the user 
	 * to be checked.
	 *
	 * @return - true if user exists
	 * @return - false otherwise
     *
     */
	public function IdUserExists ( $idUser );
    
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>