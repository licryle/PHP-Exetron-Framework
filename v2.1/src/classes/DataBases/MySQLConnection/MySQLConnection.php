<?php

/*************************************************************************
                           |MySQLConnection.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <MySQLConnection> (file MySQLConnection.php) --------------
/*if (defined('MYSQLCONNECTION_H'))
{
    return;
}
else
{

}
define('MYSQLCONNECTION_H',1);*/


//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides basic methods for connection/queries on a MySQL database
 */
//------------------------------------------------------------------------ 

class MySQLConnection extends BDDConnection
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
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return BDDError::CONNECTION_NO_DB_SELECTED if No database is selected
	 * @return see BDDConnection::Query
	 * @return BDDError::CONNECTION_TABLE_INEXISTANT if table named $table
	 * does not exist.
	 *
     *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/show-tables.html
	 *
     */
    public function TableExists ( $table )
    {
        if ( $this->database == '' )
        // no database selected
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'No database selected.' ) );
            
            return $errs;            
        }
        else
        {
        	if ( ( $tableList = & $this->Query( 'SHOW TABLES FROM '.$this->database ) instanceof Errors ) )
            // query failed
            {
                return $tableList;
            }
            else
            // search for table
            {
				foreach ( $tableList as $currentTable )
				{
					if ( $table == $currentTable->GetProperty( 'Tables_in_'.$this->database ) )
                    {
                        unset ( $tableList );
                        return True;
                    }
                }
				
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_TABLE_INEXISTANT , 'This table does not exist.' ) );
                
                return $errs;                 
            }
        }
    } //----- End of TableExists
    
	/**
	 * Gets the description of the table named $table
	 *
	 * @param $table the name of the table to be describe
	 *
     * @return - a BDDRecordSet if table exists wich BDDRecord s describe a field of the table
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return BDDError::CONNECTION_NO_DB_SELECTED if No database is selected
	 * @return see MySQLConnection::Query
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/describe.html
	 *
	 */
	public function TableDescription ( $table )
    {
        if ( $this->database == '' )
        // no database selected
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'No database selected.' ) );
            
            return $errs;            
        }
        else
        {
			$ressource = & $this->Query( 'DESCRIBE `'.$table.'`' );
			
        	return $ressource;
        }
    } //----- End of TableDescription
    
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
		return parent::SetServer( $server );
	} //----- End of GetServer

    
    /**
     * Gets host address for connection.
     *
     * @return the host address
     *
     */
    public function GetServer ( )
	{
		return parent::GetServer();
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
		return parent::SetUsername( $username );
	} //----- End of SetUsername
    
    /**
     * Gets the login used for connection.
     *
     * @return the login used
     *
     */
    public function GetUsername ( )
	{
		return parent::GetUsername( );
	} //----- End of SetUsername
    
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
		return parent::SetPassword( $password );
	} //----- End of SetPassword
    
    /**
     * Gets the password associated to the login used for connection.
     *
     * @return the password used
     *
     */
    public function GetPassword ( )
    {
        return parent::GetPassword( );
    } //----- End of GetPassword
    
	/**
	 * Try to open connection.
	 *
	 * @param $isPersistent specifies if connection may be persistent or not = { CONNECTION_PERSISTENT | CONNECTION_NOT_PERSISTENT }
	 *
	 *
     * @return - NULL if operation was successful
     * @return - an Errors object in case of error(s) :
	 *
	 * @return BDDError::CONNECTION_CANNOT_OPEN if connection can not be established
	 * please have a look on host/login/password
	 * @return BDDError::CONNECTION_ALREADY_OPENED if connection is already opened 
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/mysql-pconnect.html
	 * @see http://dev.mysql.com/doc/refman/5.0/en/mysql-connect.html
	 */
    public function Open( $isPersistent )
    {
        if ( !$this->isConnected() ) 
        {
			if ( $isPersistent == BDDConnection::CONNECTION_PERSISTENT )
			{
				$connectFunction = 'mysql_pconnect';
			}
			else
			{
				$connectFunction = 'mysql_connect';
			}
		
            if ( ($this->connection = @$connectFunction( $this->server , $this->username , $this->password )) )
            {
                return NULL;
            }
            else
            {
                // connexion �chou�e
                $this->connection = NULL;
                
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_CANNOT_OPEN , 'Unable to open connection, please verify your login/password.' ) );
                
                return $errs;
            }
        }
        else
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_ALREADY_OPENED , 'Connection already opened.' ) );
            
            return $errs;
        }
    } //----- End of Open
    
    /**
     * Sets the database to be used.
	 * Connection may be opened.
     *
	 * @param $database the name of the database to be used
     *
     * @return - NULL if operation was successful
     * @return - an Errors object in case of error(s) :
	 *
	 * @return BDDError::CONNECTION_CLOSED if connection is closed
	 * @return BDDError::CONNECTION_CANNOT_CHANGE_DB if database cannot be changed
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/mysql-select-db.html
     *
     */
    public function SetDatabase( $database ) 
    {
        if ( !$this->isConnected() )
        {
            // connexion inexistante
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_CLOSED , 'Connection closed.' ) );
            
            return $errs;
        }
        else
        {
            if ( !@mysql_select_db ( $database , $this->connection ) )
            // change �chou�
            {
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_CANNOT_CHANGE_DB , 'Unable to change database : '.mysql_error( $this->connection ) ) );
                
                return $errs;
            }
            else
            {
                $this->database = $database;
            
                return NULL;
            }
        }
    } //----- End of SetDabase
    
    /**
     * tries to send a query to DB server
	 * Connection may be opened.
     *
	 * @param $query the query to be done
     *
     * @return - a BDDRecord object which contains entries as BDDRecordItem-s
     * @return - an Errors object in case of error(s) :
	 *
	 * @return BDDError::CONNECTION_NO_DB_SELECTED if no database has been 
	 * selected before query
	 * @return BDDError::CONNECTION_QUERY_FAILED if query failed
     *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/mysql-query.html
	 *
     */
    public function Query( $query )
    {
        if ( $this->database == '' )
        // no database selected
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'Aucune base de donn�es s�lectionn�e' ) );
            
            return $errs;            
        }
        else
        {
            if ( ( $result = @mysql_query( $query , $this->connection ) ) === false ) 
            // query failed
            {
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_QUERY_FAILED , 'La requete a �chou� ('.$query.') : '.mysql_error( $this->connection ) ) );
                
                return $errs;
            }
            else
            {
                $this->nombreRequetes++;
            
				// set in en BDDRecord
				
				$nouvellesRessources = new BDDRecordSet ( );
				
				while ( ($row = @mysql_fetch_assoc ( $result ) ) !== false )
				{
					$nouvellesRessources->Add ( new BDDRecord ( $row ) ) ;
				}
				
				@mysql_free_result ( $result ); // free memory

                return $nouvellesRessources ;
            }
        }
    } //----- End of Query
    
    /**
     * Gets the number of queries that has been successfully sent.
     *
     * @return the number of queries sent from the creation of the object
     *
     */
    public function GetQueriesCount ( )
	{
		return parent::GetQueriesCount();
	} //----- End of GetQueriesCount
    
    /**
     * Tries to close the connection
     *
     * @return - NULL if operation was successful
     * @return - an Errors object in case of error(s) :
	 *
	 * @return BDDError::CONNECTION_CLOSED is connection is already closed
     *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/mysql-close.html
     */
    public function Close( )
    {
        if ( !$this->isConnected() || !@mysql_close( $this->connection ) )
        {
            // no connection
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_CLOSED , 'Connection already closed' ) );
            
            return $errs;
        }
        else
        {
            $this->database = '';
        
            return NULL;
        }
    } //----- End of Close
    
    /**
     * Checks whether connection is opened or closed
     *
     * @return - true if connection is active
     * @return - false if connection is closed
     *
     */
    public function IsConnected ( )
    {
        return ( $this->connection !== NULL && @mysql_stat ( $this->connection ) !== NULL );
    } //----- End of IsConnected

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
    public function __construct( $server = '' , $username = '' , $password = '' )
    {
		parent::__construct( $server, $username, $password );

            if ( ! function_exists( 'mysql_connect' ) )
            {
                die('PHP does not support MySQL');
            }
    } //----- End of contructor
	 
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{
		$this->Close();
	
		parent::__destruct();
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic methods

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

}

//------------------------------------------------------ other definitions

?>