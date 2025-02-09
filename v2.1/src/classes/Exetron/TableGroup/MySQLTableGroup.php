<?php

/*************************************************************************
                           |MySQLTableGroup.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <MySQLTableGroup> (file MySQLTableGroup.php) --------------
/*if (defined('MYSQLTABLEGROUP_H'))
{
    return;
}
else
{

}
define('MYSQLTABLEGROUP_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for operations on Group Table for MySQL 
 * Database.
 */
//------------------------------------------------------------------------ 

class MySQLTableGroup extends MySQLTable implements TableGroupInterface
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
    public function SaveGroups ( Groups $groups )
	{		
		foreach ( $groups as $group )
		{
			if ( $group->IsValid() )
			{
				if ( $this->IdGroupExists ( $group->GetProperty( TableGroup::TABLE_COLUMN_IDGROUP ) ) )
				{
					if ( ( $errs = $this->UpdateGroupByIdGroup ( $group )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->InsertGroup( $group) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- End of SaveGroups

	/**
	 * Selects all the Group-s from Table.
     *
     * @return - a list of Group-s in a Groups object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectGroups ()
	{
		$result = $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , '' );
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of SelectGroups
	
	
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
	public function SelectGroupByIdGroup ( $idGroup )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableGroup::TABLE_COLUMN_IDGROUP . MySQLTABLE::MYSQL_SEEK_STRICT . intval($idGroup)
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of SelectGroupByIdGroup
	
	
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
	public function SelectGroupsByIdSite ( $idSite )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableGroup::TABLE_COLUMN_IDSITE . MySQLTABLE::MYSQL_SEEK_STRICT . intval ( $idSite )
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of SelectGroupsByIdSite
	
	/**
	 * Selects the Group-s from table which TableGroup::TABLE_COLUMN_NAME
	 * looks like $groupName.
     *
	 * @param $groupName the name of the Group to select. It can contain
	 * magic chars like MYSQL_SEEK_MULTICHARS and MYSQL_SEEK_MULTICHARS. 
	 * Please refer to your database documentation.
	 *
     * @return - a Groups object : the Group-s which 
	 * TableGroup::TABLE_COLUMN_NAME looks like $groupName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function FindGroupsByName ( $groupName )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableGroup::TABLE_COLUMN_NAME . MySQLTABLE::MYSQL_SEEK_REGEX . MySQLTABLE::MYSQL_SEEK_SEPARATOR . addslashes( $groupName ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR		
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of FindGroupsByName
	
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
	public function UpdateGroupByIdGroup ( Group $updatedGroup )
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Group non valid�, merci de le valider avant de lancer une mise � jour') ) ;
			
			return $errors;
		}

		/* record validated, checks for existence => update */
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableGroup::TABLE_COLUMN_IDGROUP . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP ) );
		
		if ( ! ($res = $this->IdGroupExists( intval ($new->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre � jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- End of UpdateGroupByIdGroup
	
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
	public function InsertGroup ( Group $group )
	{
		return $this->Insert ( $group );
	} //---- End of InsertGroup
	
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
	public function IdGroupExists ( $idGroup )
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableGroup::TABLE_COLUMN_IDGROUP . MySQLTable::MYSQL_SEEK_STRICT . intval( $idGroup );
		
		$res = $this->Select( TableGroup::TABLE_COLUMN_IDGROUP, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	} //---- End of IdGroupExists
	
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>