<?php

/*************************************************************************
                           |BDDConnection.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface of class <BDDConnection> (file BDDConnection.php) --------------
/*if (defined('BDDCONNECTION_H'))
{
    return;
}
else
{

}
define('BDDCONNECTION_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides basic methods for connection/queries on an abstract database
 */
//------------------------------------------------------------------------ 

abstract class BDDConnection extends AbstractClass implements BDDConnectionInterface
{
//----------------------------------------------------------------- PUBLIC

	/** for Open method, specifies a persistent connexion */
	const CONNECTION_PERSISTENT = 'CONNECTION_PERSISTENT'; 
	
	/** for Open method, specifies a non persistent connexion */
	const CONNECTION_NOT_PERSISTENT = 'CONNECTION_NOT_PERSISTENT';

//--------------------------------------------------------- public methods

    //public function TableExists ( $table );
    /*
	 * Search for table named $table in database.
	 * Connection may be opened.
	 *
	 * @param $table the tablename to be checked
     *
     * @return - true if table exists
	 * @return - an Errors object in case of error(s)
     *
     */
    
	//public function TableDescription ( $table );
	/*
	 * Gets the description of the table named $table
	 *
	 * @param $table the name of the table to be describe
	 *
     * @return - a BDDRecordSet if table exists wich BDDRecord s describe a field of the table
	 * @return - an Errors object in case of error(s)
	 */
    
    public function SetServer ( $server )
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
    {
        if ( !$this->isConnected() )
        {
            $this->server = $server;
            
            return NULL;
        }
        else
        {
            // connexion non fermée
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'You cannot modify host address when connection is not closed.' ) );
                    
            return $errs;
        }
    } //----- End of SetServer
    
    public function GetServer ( )
    /**
     * Gets host address for connection.
     *
     * @return the host address
     *
     */
    {
        return $this->server;
    } //----- End of GetServer
    
    public function SetUsername ( $username )
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
    {
        if ( !$this->isConnected() )
        {
            $this->username = $username;
            
            return NULL;
        }
        else
        {
            // connexion non fermée
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'You cannot modify username when connection is not closed.' ) );
            
            return $errs;
        }
    } //----- End of SetUsername
    
    public function GetUsername ( )
    /**
     * Gets the login used for connection.
     *
     * @return the login used
     *
     */
    {
        return $this->username;
    } //----- End of GetUsername
    
    public function SetPassword ( $password )
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
    {
        if ( !$this->isConnected() )
        {
            $this->password = $password;
            
            return NULL;
        }
        else
        {
            // connexion non fermée
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'You cannot modify password when connection is not closed.' ) );
            
            return $errs;
        }
    } //----- End of SetPassword
    
    public function GetPassword ( )
    /**
     * Gets the password associated to the login used for connection.
     *
     * @return the password used
     *
     */
    {
        return $this->password;
    } //----- End of GetPassword
    
    //public function Open( $isPersistent );
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
    
    //public function SetDatabase( $database );
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
    
    //public function Query( $query );
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
    
    public function GetQueriesCount ( )
    /**
     * Gets the number of queries that has been successfully sent.
     *
     * @return the number of queries sent from the creation of the object
     *
     */
	{
		return $this->nombreRequetes;
	}
    
    //public function Close( );
    /**
     * Try to close the connection
     *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
     *
     */
    
    //public function isConnected ( );
    /**
     * Check whether connection is opened or closed
     *
     * @return - true if connection is active
     * @return - false if connection is closed
     *
     */
    
//---------------------------------------------- Constructors - destructor
    //abstract function __construct( $server = '' , $username = '' , $password = '' );
	/*
	 * initialise members of the object.
	 * interrupts script if DataBase is not supported.
	 *
	 * @param $server the host address
	 * @param $username the login to be used for connection
	 * @param $password the password associated to the login
	 *
	 */
    
//---------------------------------------------------------- Magic methods

    public function __ToString ( )
    /**
	 * Returns a printable version of objet for debugging.
	 */
    {
		return parrent::__ToString();
    }

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
    /** host address */
	protected $server; 
	
    /** login for connection */
	protected $username;
	
    /** password associated to login */
	protected $password; 
    
	
	
    /** connection handler */
	protected $connection; 
	
    /** database name */
	protected $database; 
	
    /** number of queries successfully sent */
	protected $nombreRequetes; 

}

//------------------------------------------------------ other definitions

?>