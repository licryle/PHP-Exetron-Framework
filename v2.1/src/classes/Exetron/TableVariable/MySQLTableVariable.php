<?php

/*************************************************************************
                           |MySQLTableVariable.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <MySQLTableVariable> (file MySQLTableVariable.php) --------------
/*if (defined('MYSQLTABLEVARIABLE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLEVARIABLE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for operations on Variable Table for MySQL 
 * Database.
 */
//------------------------------------------------------------------------ 

class MySQLTableVariable extends MySQLTable implements TableVariableInterface
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
    public function SaveVariables ( Variables $variables )
	{		
		foreach ( $variables as $variable )
		{
			if ( $variable->IsValid() )
			{
				if ( $this->IdVariableExists ( $variable->GetProperty( TableVariable::TABLE_COLUMN_IDVARIABLE ) ) )
				{
					if ( ( $errs = $this->UpdateVariable( $variable )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->InsertVariable( $variable) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- End of SaveVariables
	
	/**
	 * Selects all the Variable-s from Table which scope is Server.
     *
     * @return - a list of Variable-s in a Variables object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectServerVariables ()
	{
		$result = $this->Select (	MySQLTABLE::TABLE_COLUMN_ALL , 
									MySQLTABLE::MYSQL_CLAUSE_WHERE .
										TableVariable::TABLE_COLUMN_SCOPE . MySQLTABLE::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR . TableVariable::TABLE_COLUMN_SCOPE_SERVER .MySQLTABLE::MYSQL_SEEK_SEPARATOR
					);
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Variables ( $result );
		}
	} //---- End of SelectServerVariable
	
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
	public function SelectSiteVariables ( $idSite )
	{
		$result = $this->Select (	MySQLTABLE::TABLE_COLUMN_ALL ,
									MySQLTABLE::MYSQL_CLAUSE_WHERE.
											TableVariable::TABLE_COLUMN_SCOPE.MySQLTABLE::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR.TableVariable::TABLE_COLUMN_SCOPE_SITE . MySQLTABLE::MYSQL_SEEK_SEPARATOR .
									MySQLTABLE::MYSQL_CLAUSE_AND.
											TableVariable::TABLE_COLUMN_IDSITE.MySQLTABLE::MYSQL_SEEK_STRICT.MySQLTABLE::MYSQL_SEEK_SEPARATOR.$idSite.MySQLTABLE::MYSQL_SEEK_SEPARATOR
					);
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Variables ( $result );
		}
	} //---- End of SelectSiteVariable
	
	/**
	 * Selects the Group-s from table which TableVariable::TABLE_COLUMN_NAME
	 * looks like $varName.
     *
	 * @param $varName the name of the Variable to select. It can contain
	 * magic chars like MYSQL_SEEK_MULTICHARS and MYSQL_SEEK_MULTICHARS. 
	 * Please refer to your database documentation.
	 *
     * @return - a Variables object : the Variable-s which 
	 * TableVariable::TABLE_COLUMN_NAME looks like $varName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectVariablesByName ( $varName )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableVariable::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR.$varName.MySQLTABLE::MYSQL_SEEK_SEPARATOR		
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Variables ( $result );
		}
	} //---- End of SelectVariablesByName
	
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
	public function UpdateVariableByIdVariable ( Variable $updatedVariable )
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Variable non valid�, merci de le valider avant de lancer une mise � jour') ) ;
			
			return $errors;
		}

		// record valid�, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableVariable::TABLE_COLUMN_IDVARIABLE . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE ) );
		
		if ( ! ($res = $this->IdVariableExists( intval ($new->GetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre � jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- End of UpdateVariableByIdVariable
	
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
	public function InsertVariable ( Variable $variable )
	{
		return $this->Insert ( $variable );
	} //---- End of InsertVariable
	
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
	public function IdVariableExists ( $idVariable )
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableVariable::TABLE_COLUMN_IDVARIABLE . MySQLTABLE::MYSQL_SEEK_SEPARATOR . MySQLTable::MYSQL_SEEK_STRICT . intval( $idVariable ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR;
		
		$res = $this->Select( TableVariable::TABLE_COLUMN_IDVARIABLE, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	} //---- End of IdVariableExists
	
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>