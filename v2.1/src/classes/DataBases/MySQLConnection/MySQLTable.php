<?php

/*************************************************************************
                           |MySQLTable.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <MySQLTable> (file MySQLTable.php) --------------
/*if (defined('MYSQLTABLE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides Methods and constants for operations on MySQL Tables
 */
//------------------------------------------------------------------------ 

class MySQLTable extends BDDTable
{
//----------------------------------------------------------------- PUBLIC

	/** represents the whole list of columns */
	const TABLE_COLUMN_ALL = '*';
	
	/** MySQL 'where' clause */
	const MYSQL_CLAUSE_WHERE = ' WHERE ';
	
	/** MySQL 'limit' clause */
	const MYSQL_CLAUSE_LIMIT = ' LIMIT ';
	
	/** MySQL 'and' operator */
	const MYSQL_CLAUSE_AND = ' AND ';
	
	/** MySQL 'or' operator */
	const MYSQL_CLAUSE_OR = ' OR ';
	
	/** MySQL 'order' clause */
	const MYSQL_CLAUSE_ORDER = ' ORDER BY ';
	
		/** MySQL 'order' parameter for ascending sort */
		const MYSQL_CLAUSE_ORDER_ASCENDANT = ' ASC ';
		
		/** MySQL 'order' parameter for descending sort */
		const MYSQL_CLAUSE_ORDER_DESCENDANT = ' DESC ';
	
	/** MySQL 'group by' clause */
	const MYSQL_CLAUSE_GROUP = ' GROUP BY ';
	
	/** MySQL 'having' clause */
	const MYSQL_CLAUSE_HAVING = ' HAVING ';
	
	/** MySQL regex operator */
	const MYSQL_SEEK_REGEX = ' LIKE ';
	
		/** Magic char for multichars replacement */
		const MYSQL_SEEK_MULTICHARS = '%';
		
		/** Magic char for unique char replacement */
		const MYSQL_SEEK_ANYCHAR = '_';
	
	/** MySQL equals operator */
	const MYSQL_SEEK_STRICT = ' = ';
	
	/** MySQL not equals operator */
	const MYSQL_SEEK_STRICT = ' <> ';
	
	/** MySQL separator operator */
	const MYSQL_SEEK_SEPARATOR = '"';
	
	/** MySQL field name for fields' name in table description */
	const MYSQL_STRUCTURE_FIELD_NAME = 'Field';

//--------------------------------------------------------- public methods
	
    public function Select ( $fields, $options )
	/**
	 * Computes a selection of $fields on entries that correspond to 
	 * $options
     *
     * @param $fields array of string that reprensents fields' name to select
	 * @param $options string that contains various select options like 
	 * "where", "order", "limit", ...
     *
	 * @return - a BDDRecordSet that contains BDDRecord-s ( Database entries)
	 * if select was successful
	 * @return - an Errors object in case of error(s) : see BDDConnectionInterface::Query 
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/select.html
	 *
     */
	{
		$selectQuery = 'SELECT ';
		
		if ( is_array( $fields ) ) 
		{
			foreach( $fields as $field ) 
			{
				$selectQuery .= $field;
			}
			
			$selectQuery = substr( $selectQuery, 0, -1 ) ;
		}
		else
		{
			$selectQuery .= $fields;
		}
		
		$selectQuery .= ' FROM `'.$this->tableName.'` '.$options;
		
		return $this->bDDConnection->Query ( $selectQuery ) ;
	} //---- End of Select
	
    public function Insert ( BDDRecord $record )
	/**
	 * Tries to insert the given $record into database
	 *
	 * @param $record BDDRecord to be inserted
	 *
	 * @return - see BDDConnectionInterface::Query 
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/insert.html
	 *
     */
	{
		$newRecord = $this->bDDRecordToTableRecord ( $record );
		unset( $record );
		
		$insertQuery  = 'INSERT INTO `'.$this->tableName.'` SET ';
		
		foreach ( $newRecord as $champ  => $value )
		{
			$insertQuery .= $champ.' = "'. $value .'", ';
		}
		
		$insertQuery = substr ( $insertQuery , 0 , -2 );
		
		return $this->bDDConnection->Query ( $insertQuery ) ;
	} //---- End of Insert
	
    public function Update ( BDDRecord $updatedRec, $clause )
	/**
	 * Tries to update with the given $updatedRec into database in function
	 * of $clause parameter.
	 *
	 * @param $updatedRec the BDDRecord updated
	 * @param $clause clause constructed in Data Manipulation Language (eg. SQL)
	 * to determine which record has to be updated
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/update.html
	 *
     */
	{
		$newRecord = $this->bDDRecordToTableRecord ( $updatedRec );
		unset( $updatedRec );
		
		$updateQuery  = 'UPDATE `'.$this->tableName.'` SET ';
		
		foreach ( $newRecord as $champ  => $value )
		{
			$updateQuery .= $champ.' = "'. $value .'", ';
		}
		
		$updateQuery = substr ( $updateQuery , 0 , -2 ) . $clause;
		
		return $this->bDDConnection->Query ( $updateQuery ) ;
	
	} //---- End of Update
	
    public function Delete ( $clauses )
	/**
	 * Tries to delete entries that correpond to $clauses
	 *
	 * @param $clauses clauses constructed in Data Manipulation Language (eg. SQL)
	 * to determine which records have to be deleted
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/delete.html
	 *
     */
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'` WHERE '.$clause );
	} //---- End of Delete

    public function Clear (  )
	/**
	 * Tries to delete all entries of the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/delete.html
	 *
     */
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'`' );
	} //---- End of Clear
	
    public function Drop (  )
	/**
	 * Tries to drop the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/drop-table.html
	 *
     */
	{
		return $this->bDDConnection->Query ( 'DROP TABLE `'.$this->tableName.'`' );
	} //---- End of Drop
    
//---------------------------------------------- Constructors - destructor
    public function __construct( $table, MySQLConnection $connection, & $errors )
    /**
	 * Initialises MySQLTable for the table named $table on the given 
	 * $connection.
	 *
	 * @param $table name of the table
	 * @param $connection BDDConnection for all table operations. This must
	 * be a valid and connected BDDConnection unless it will cause an Error.
	 * @param $errors reference to an Errors object. It will be set if an
	 * error occurs during instanciation. If operation was successful, it
	 * equals NULL
	 *
     */
	{
		parent::__construct ( $table, $connection, $errors );
	} //---- End of constructor
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor
	
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

	protected function isValidProperty ( $property )
	/**
	 * Checks into table description if the property named $property
	 * exists as a field in table
	 *
	 * @return true if property exists
	 * @return false otherwise
	 *
     */
	{
		foreach ( $this->structure as $champ )
		{
			if ( $champ->getProperty( MySQLTable::MYSQL_STRUCTURE_FIELD_NAME ) == $property )
			{
				return true;
			}
		}
		
		return false;
	} //----- End of isValidProperty
	
	protected function bDDRecordToTableRecord ( BDDRecord $record )
	/**
	 * Computes conversion from a standard BDDRecord to a safe BDDRecord
	 * for MySQL queries. It also computes an intersection between 
	 * table fields and BDDRecord properties.
	 *
	 * @return a BDDRecord ready to be saved/updated into table
	 *
     */
	{
		$tableRecord = new BDDRecord();
		
		foreach ( $record as $champ => $value ) 
		{
			if ( $this->isValidProperty( $champ ) )
			{
				$tableRecord->SetProperty ( $champ , mysql_real_escape_string ( $value, $this->bDDConnection ) );
			}
		}
		
		return $tableRecord;
	} //----- End of bDDRecordToTableRecord
//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>