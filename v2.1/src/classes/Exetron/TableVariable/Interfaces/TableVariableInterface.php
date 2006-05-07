<?php

/*************************************************************************
                           |TableVariableInterface.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <TableVariableInterface> (file TableVariableInterface.php) --------------
/*if (defined('TABLEVARIABLEINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEVARIABLEINTERFACE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for VariableTable management for any databases.
 */
//------------------------------------------------------------------------ 

interface TableVariableInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

	/**
	 * Updates validated items in $variables in function of its idVariable.
	 * If idVariable doesn't exist, item is inserted.
	 * If an item of $variables hasn't been validate, it is skipped.
	 *
	 * @param $variables a Variables of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
    public function SaveVariables ( Variables $variables );
	
	/**
	 * Selects all the Variable-s from Table which scope is Server.
     *
     * @return - a list of Variable-s in a Variables object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectServerVariables ();
	
	/**
	 * Selects all the Variable-s from Table which is Site and refers to
	 * site of id $idSites.
     *
	 * @param $idSite The id of the Site the variable-s returned refers to.
	 *
     * @return - a list of Variable-s in a Variabless object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectSiteVariables ( $idSite );
	
	/**
	 * Selects the Variable-s from table which TableVariable::TABLE_COLUMN_NAME
	 * looks like $varName.
     *
	 * @param $varName the name of the Variable to select. It can contain
	 * magic chars like BDD_SEEK_MULTICHARS and BDD_SEEK_ANYCHAR where BDD
	 * represent your database type. Please refer to your database documentation.
	 *
     * @return - a Variables object : the Variable-s which 
	 * TableVariable::TABLE_COLUMN_NAME looks like $varName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectVariablesByName ( $varName );
	
	/**
	 * Tries to update the given Variable $updatedVariable in function of its
	 * property TableVariable::TABLE_COLUMN_IDVARIABLE.
	 *
	 * @param $updatedVariable The Variable to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function UpdateVariableByIdVariable ( Variable $updatedVariable );
	
	/**
	 * Inserts the given Variable $variable into the table.
	 *
	 * @param $variable The Variable to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertVariable ( Variable $variable );
	
	/**
	 * Checks whether the Variable of id $idVariable exists or not.
	 *
	 * @param $idVariable The TableVariable::TABLE_COLUMN_IDVARIABLE of the variable 
	 * to be checked.
	 *
	 * @return - true if variable exists
	 * @return - false otherwise
     *
     */
	public function IdVariableExists ( $idVariable );
	
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>