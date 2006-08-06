<?php

/*************************************************************************
                           |BDDTableInterface.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Interface <BDDTableInterface> (file BDDTableInterface.php) --------------
/*if (defined('BDDTABLEINTERFACE_H'))
{
    return;
}
else
{

}
define('BDDTABLEINTERFACE_H',1);*/


//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Interface that provides generic methods for Database Tables
 */
//------------------------------------------------------------------------ 

interface BDDTableInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
    
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
     */
    abstract public function Select ( $fields, $options );
	
	/**
	 * Tries to insert the given $record into database
	 *
	 * @param $record BDDRecord to be inserted
	 *
	 * @return - see BDDConnectionInterface::Query 
	 *
     */
    abstract public function Insert ( BDDRecord $record );
	
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
     */
    abstract public function Update ( BDDRecord $updatedRec, $clause );
	
	/**
	 * Tries to delete entries that correpond to $clauses
	 *
	 * @param $clauses clauses constructed in Data Manipulation Language (eg. SQL)
	 * to determine which records have to be deleted
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    abstract public function Delete ( $clauses );
	
	/**
	 * Tries to delete all entries of the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    abstract public function Clear (  );
	
	/**
	 * Tries to drop the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    abstract public function Drop (  );

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>