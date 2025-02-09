<?php

/*************************************************************************
                           |MySQLTableUser.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <MySQLTableUser> (file MySQLTableUser.php) --------------
/*if (defined('MYSQLTABLEUSER_H'))
{
    return;
}
else
{

}
define('MYSQLTABLEUSER_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for operations on User Table for MySQL 
 * Database.
 */
//------------------------------------------------------------------------ 

class MySQLTableUser extends MySQLTable implements TableUserInterface
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
    public function SaveUsers ( Users $users )
	{		
		foreach ( $users as $user )
		{
			if ( $user->IsValid() )
			{
				if ( $this->IdUserExists ( $user->GetProperty( TableUser::TABLE_COLUMN_IDUSER ) ) )
				{
					if ( ( $errs = $this->UpdateUserByIdUser ( $user )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->InsertUser( $user) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- End of SaveUsers

	/**
	 * Selects all the User-s from Table.
     *
     * @return - a list of User-s in a Users object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectUsers ()
	{
		$result = $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , '' );
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}
	} //---- End of SelectUsers
	
	
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
	public function SelectUserByIdUser ( $idUser )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_IDUSER.MySQLTABLE::MYSQL_SEEK_STRICT.intval($idUser)
				);
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}	
	} //---- End of SelectUserByIdUser
	
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
	public function SelectUsersByIdGroup ( $idGroup )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_IDGROUP.MySQLTABLE::MYSQL_SEEK_STRICT.intval($idGroup)
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}
	} //---- End of SelectUsersByIdGroup
	
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
	public function FindUsersByName ( $userName )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR. addslashes($userName).MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}
	} //---- End of FindUsersByName
	
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
	public function UpdateUserByIdUser ( User $updatedUser )
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de User non valid�, merci de le valider avant de lancer une mise � jour') ) ;
			
			return $errors;
		}

		// record valid�, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableUser::TABLE_COLUMN_IDUSER . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableUser::TABLE_COLUMN_IDUSER ) );
		
		if ( ! ($res = $this->IdUserExists( intval ($new->GetProperty ( TableUser::TABLE_COLUMN_IDUSER ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre � jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- End of UpdateUserByIdUser
	
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
	public function InsertUser ( User $user )
	{
		return $this->Insert ( $user );
	} //---- End of InsertUser
	
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
	public function IdUserExists ( $idUser )
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableUser::TABLE_COLUMN_IDUSER . MySQLTable::MYSQL_SEEK_STRICT . intval( $idUser );
		
		$res = $this->Select( TableUser::TABLE_COLUMN_IDUSER, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	} //---- End of IdUserExists
	
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>