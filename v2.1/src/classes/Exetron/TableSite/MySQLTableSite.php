<?php

/*************************************************************************
                           |MySQLTableSite.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <MySQLTableSite> (file MySQLTableSite.php) --------------
/*if (defined('MYSQLTABLESITE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLESITE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for operations on Site Table for MySQL 
 * Database.
 */
//------------------------------------------------------------------------ 

class MySQLTableSite extends MySQLTable implements TableSiteInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    public function SaveSites ( Sites $sites )
	/**
	 * Updates validated items in $sites in function of its idSite.
	 * If idSite doesn't exist, item is inserted.
	 * If an item of $sites hasn't been validate, it is skipped.
	 *
	 * @param $sites a Sites of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
	{		
		foreach ( $sites as $site )
		{
			if ( $site->IsValid() )
			{
				if ( $this->IdSiteExists ( $site->GetProperty( TableSite::TABLE_COLUMN_IDSITE ) ) )
				{
					if ( ( $errs = $this->UpdateSiteByIdSite ( $site )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->InsertSite( $site) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- End of SaveSites

	public function SelectSites ()
	/**
	 * Selects all the Site-s from Table.
     *
     * @return - a list of Site-s in a Sites object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
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
	} //---- End of SelectSites
	
	
	public function SelectSiteByIdSite ( $idSite )
	/**
	 * Selects the Site from table which TableSite::TABLE_COLUMN_IDSITE
	 * equals to $idSite.
     *
	 * @param $idSite the id of the Site to select
	 *
     * @return - the Site which TableSite::TABLE_COLUMN_IDSITE equals to
	 * $idSite in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableSite::TABLE_COLUMN_IDSITE . MySQLTABLE::MYSQL_SEEK_STRICT. intval( $idSite )
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of SelectSiteByIdSite
	
	public function FindSitesByName ( $siteName )
	/**
	 * Selects the Site-s from table which TableSite::TABLE_COLUMN_NAME
	 * looks like $siteName.
     *
	 * @param $siteName the name of the Site to select. It can contain
	 * magic chars like MYSQL_SEEK_MULTICHARS and MYSQL_SEEK_ANYCHAR. 
	 * Please refer to your database documentation.
	 *
     * @return - a Sites object : the Site-s which 
	 * TableSite::TABLE_COLUMN_NAME looks like $siteName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableSite::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR. addslashes( $siteName ).MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of FindSitesByName
	
	public function UpdateSiteByIdSite ( Site $updatedSite )
	/**
	 * Tries to update the given site $updatedSite in function of its
	 * property TableSite::TABLE_COLUMN_IDSITE.
	 *
	 * @param $updatedSite The Site to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */	
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Site non validé, merci de le valider avant de lancer une mise à jour') ) ;
			
			return $errors;
		}

		/* record validated, checks for existence => update */
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableSite::TABLE_COLUMN_IDSITE . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableSite::TABLE_COLUMN_IDSITE ) );
		
		if ( ! ($res = $this->IdSiteExists( intval ($new->GetProperty ( TableSite::TABLE_COLUMN_IDSITE ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre à jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- End of UpdateSite
	
	public function InsertSite ( Site $site )
	/**
	 * Inserts the given Site $site into the table.
	 *
	 * @param $site The Site to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	{
		return $this->Insert ( $site );
	} //---- End of InsertSite
	
	public function IdSiteExists ( $idSite )
	/**
	 * Checks whether the Site of id $idSite exists or not.
	 *
	 * @param $idSite The TableSite::TABLE_COLUMN_IDSITE of the site 
	 * to be checked.
	 *
	 * @return - true if site exists
	 * @return - false otherwise
     *
     */
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableSite::TABLE_COLUMN_IDSITE . MySQLTable::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR . intval( $idSite ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR;
		
		$res = $this->Select( TableSite::TABLE_COLUMN_IDSITE, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	} //---- End of IdSiteExists
	
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>