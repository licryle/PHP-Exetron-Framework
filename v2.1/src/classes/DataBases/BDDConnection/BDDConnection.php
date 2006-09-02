<?php

/*************************************************************************
                           |BDDConnection.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <BDDConnection> (file BDDConnection.php) --------------
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

    /*
	 * Searchs for table named $table in database.
	 * Connection may be opened.
	 *
	 * @param $table the tablename to be checked
     *
     * @return - true if table exists
	 * @return - an Errors object in case of error(s)
     *
     */
    //public function TableExists ( $table );
    
	/*
	 * Gets the description of the table named $table
	 *
	 * @param $table the name of the table to be describe
	 *
     * @return - a BDDRecordSet if table exists wich BDDRecord s describe a field of the table
	 * @return - an Errors object in case of error(s)
	 */
	//public function TableDescription ( $table );
    
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
    public function SetServer ( $server )
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
    
    /**
     * Gets host address for connection.
     *
     * @return the host address
     *
     */
    public function GetServer ( )
    {
        return $this->server;
    } //----- End of GetServer
    
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
    public function SetUsername ( $username )
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
    
    /**
     * Gets the login used for connection.
     *
     * @return the login used
     *
     */
    public function GetUsername ( )
    {
        return $this->username;
    } //----- End of GetUsername
    
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
    public function SetPassword ( $password )
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
    
    /**
     * Gets the password associated to the login used for connection.
     *
     * @return the password used
     *
     */
    public function GetPassword ( )
    {
        return $this->password;
    } //----- End of GetPassword
    
	/*
	 * Tries to open connection.
	 *
	 * @param $isPersistent specifies if connection may be persistent or not = { CONNECTION_PERSISTENT | CONNECTION_NOT_PERSISTENT }
	 *
	 *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
	 *
	 */
    //public function Open( $isPersistent );
    
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
    //public function SetDatabase( $database );
    
    /**
     * tries to send a query to DB server
	 * Connection may be opened.
     *
	 * @param $query the query to be done
     *
     * @return - an Errors object in case of error(s)
     * @return - a BDDRecord object which contains entries as BDDRecordItem s
     *
     */
    //public function Query( $query );
    
    /**
     * Gets the number of queries that has been successfully sent.
     *
     * @return the number of queries sent from the creation of the object
     *
     */
    public function GetQueriesCount ( )
	{
		return $this->nombreRequetes;
	}
    
    /**
     * Tries to close the connection
     *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
     *
     */
    //public function Close( );
    
    /**
     * Checks whether connection is opened or closed
     *
     * @return - true if connection is active
     * @return - false if connection is closed
     *
     */
    //public function isConnected ( );
    
//---------------------------------------------- Constructors - destructor
	/**
	 * initialises members of the object.
	 * interrupts script if DataBase is not supported.
	 *
	 * @param $server the host address
	 * @param $username the login to be used for connection
	 * @param $password the password associated to the login
	 *
	 */
    function __construct( $server = '' , $username = '' , $password = '' )
	{
		parent::__construct( );	
            
		$this->connection = NULL;
		
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		
		$this->database = '';
		
		$this->nombreRequetes = 0;
	}
	 
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