<?php

/*************************************************************************
                           |BDDTable.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <BDDTable> (file BDDTable.php) --------------
/*if (defined('BDDTABLE_H'))
{
    return;
}
else
{

}
define('BDDTABLE_H',1);*/


//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Abstract class that provides generic methods for Database Tables
 */
//------------------------------------------------------------------------ 

abstract class BDDTable extends AbstractClass implements BDDTableInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
    
	/*
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
     */
    //public function Select ( $fields, $options );

	
	/*
	 * Tries to insert the given $record into database
	 *
	 * @param $record BDDRecord to be inserted
	 *
	 * @return - see BDDConnectionInterface::Query 
	 *
     */
    //public function Insert ( BDDRecord $record );
	
	/*
	 * Tries to update with the given $updatedRec into database in function
	 * of $clause parameter.
	 *
	 * @param $updatedRec the BDDRecord updated
	 * @param $clause clause constructed in Data Manipulation Language (eg. SQL)
	 * to determine which record has to be updated
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    //public function Update ( BDDRecord $updatedRec, $clause );
	
	/*
	 * Tries to delete entries that correpond to $clauses
	 *
	 * @param $clauses clauses constructed in Data Manipulation Language (eg. SQL)
	 * to determine which records have to be deleted
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    //public function Delete ( $clauses );
	
	/*
	 * Tries to delete all entries of the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    //public function Clear (  );
	
	/*
	 * Tries to drop the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    //public function Drop (  );
	
	/**
	 * Escape the given $value for a secured insert/update into database.
	 *
	 * @param $value The value to be escaped
	 *
	 * @return the escaped string
	 *
     */
    abstract public function EscapeValue ( $value );

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises BDDTable for the table named $table on the given 
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
    public function __construct( $table, BDDConnection $connection, & $errors )
    {
		parent::__construct();
	
		$errors = NULL;
		
    	if ( ! $connection->isConnected ( ) )
		{
			$errors = new Errors();
			$errors->Add( new BDDError( BDDError::CONNECTION_CLOSED, 'Connexion close, impossible d\'instancier une Table.') );
			
			return;
		}
		
		if ( ($tabex = $connection->TableExists ( $table ) ) instanceOf Errors )
		{
			$errors = $tabex;
			
			return;
		}
		unset ( $tabex );
		
		
		$this->structure = & $connection->TableDescription ( $table );
		$this->bDDConnection = $connection;
		$this->tableName = $table;
    } //---- End of constructor
	
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{
		parent::__destruct();
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods

    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    public function __ToString ( )
    {
		return parent::__ToString();
    }

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	/** Name of the current table */
	protected $tableName;
	
	/** BDDConnection object for database connection */
	protected $bDDConnection;
	
	/** contains table structure */
	protected $structure;
}

//------------------------------------------------------ other definitions

?>