<?php

/*************************************************************************
                           |BDDConnectionInterface.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface of class <MySQLConnection> (file BDDConnectionInterface.php) --------------
/*if (defined('BDDCONNECTIONINTERFACE_H'))
{
    return;
}
else
{

}
define('BDDCONNECTIONINTERFACE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides basic methods for connection/queries on an abstract database
 */
//------------------------------------------------------------------------ 

interface BDDConnectionInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
    
    /**
	 * Search for table named $table in database.
	 * Connection may be opened.
	 *
	 * @param $table the tablename to be checked
     *
     * @return - true if table exists
	 * @return - an Errors object in case of error(s)
     *
     */
	public function TableExists ( $table );
    
	/**
	 * Gets the description of the table named $table
	 *
	 * @param $table the name of the table to be describe
	 *
     * @return - a BDDRecordSet if table exists wich BDDRecord s describe a field of the table
	 * @return - an Errors object in case of error(s)
	 */
	public function TableDescription ( $table );
    
    /**
     * Sets host address for connection.
	 * Connection may be closed.
     *
	 * @param $server host address
     *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
     *
     */
    public function SetServer ( $server );
    
    /**
     * Gets host address for connection.
     *
     * @return the host address
     *
     */
    public function GetServer ( );
    
    /**
     * Sets the username for connection.
	 * Connection may be closed.
     *
	 * @param $username the login to be used for connection
     *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
     *
     */
    public function SetUsername ( $username );
    
    /**
     * Gets the login used for connection.
     *
     * @return the login used
     *
     */
    public function GetUsername ( );
    
    /**
     * Sets the password associated to the given username for connection.
	 * Connection may be closed.
     *
	 * @param $password the password associated to the given username for connection
     *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
     *
     */
    public function SetPassword ( $password );
    
    /**
     * Gets the password associated to the login used for connection.
     *
     * @return the password used
     *
     */
    public function GetPassword ( );
    
	/*
	 * Try to open connection.
	 *
	 * @param $isPersistent specifies if connection may be persistent or not = { CONNECTION_PERSISTENT | CONNECTION_NOT_PERSISTENT }
	 *
	 *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
	 *
	 */
    public function Open( $isPersistent );
    
    /**
     * Sets the database to be used.
	 * Connection may be opened.
     *
	 * @param $database the name of the database to be used
     *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
     *
     */
    public function SetDatabase( $database );
    
    /**
     * try to send a query to DB server
	 * Connection may be opened.
     *
	 * @param $query the query to be done
     *
     * @return - an Errors object in case of error(s)
     * @return - a BDDRecord object which contains entries as BDDRecordItem s
     *
     */
    public function Query( $query );
    
    /**
     * Gets the number of queries that has been successfully sent.
     *
     * @return the number of queries sent from the creation of the object
     *
     */
    public function GetQueriesCount ( );
    
    /**
     * Try to close the connection
     *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
     *
     */
    public function Close( );
    
    /**
     * Check whether connection is opened or closed
     *
     * @return - true if connection is active
     * @return - false if connection is closed
     *
     */
    public function isConnected ( );
    
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>