<?php

/*************************************************************************
                           |TableSiteInterface.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Classe <TableSiteInterface> (file TableSiteInterface.php) --------------
/*if (defined('TABLESITEINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLESITEINTERFACE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for TableSite management for any databases.
 */
//------------------------------------------------------------------------ 

interface TableSiteInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

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
    public function SaveSites ( Sites $sites );
	 
	/**
	 * Selects all the Site-s from Table.
     *
     * @return - a list of Group-s in a Sites object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectSites ();
	
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
	public function SelectSiteByIdSite ( $idSite );
	
	/**
	 * Selects the Site-s from table which TableSite::TABLE_COLUMN_NAME
	 * looks like $siteName.
     *
	 * @param $siteName the name of the Site to select. It can contain
	 * magic chars like BDD_SEEK_MULTICHARS and BDD_SEEK_ANYCHAR where BDD
	 * represent your database type. Please refer to your database documentation.
	 *
     * @return - a Sites object : the Site-s which 
	 * TableSite::TABLE_COLUMN_NAME looks like $siteName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function FindSitesByName ( $siteName );
	
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
	public function UpdateSiteByIdSite ( Site $updatedSite );
	
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
	public function InsertSite ( Site $site );
	
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
	public function IdSiteExists ( $idSite );
    
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>