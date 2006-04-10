<?php

/*************************************************************************
                           |MySQLConnection.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface of class <MySQLConnection> (file MySQLConnection.php) --------------
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
    
    public function TableExists ( $table )
    /**
	 * Search for table named $table in database.
	 * Connection may be opened.
	 *
	 * @param $table the tablename to be checked
     *
     * @return - true if table exists
	 * @return - an Errors object in case of error(s)
     *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/show-tables.html
	 *
     */
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
    
	public function TableDescription ( $table )
	/**
	 * Gets the description of the table named $table
	 *
	 * @param $table the name of the table to be describe
	 *
     * @return - a BDDRecordSet if table exists wich BDDRecord s describe a field of the table
	 * @return - an Errors object in case of error(s)
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/describe.html
	 *
	 */
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
		return parent::SetServer( $server );
	} //----- End of GetServer

    
    public function GetServer ( )
    /**
     * Gets host address for connection.
     *
     * @return the host address
     *
     */
	{
		return parent::GetServer();
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
		return parent::SetUsername( $username );
	} //----- End of SetUsername
    
    public function GetUsername ( )
    /**
     * Gets the login used for connection.
     *
     * @return the login used
     *
     */
	{
		return parent::GetUsername( );
	} //----- End of SetUsername
    
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
		return parent::SetPassword( $password );
	} //----- End of SetPassword
    
    public function GetPassword ( )
    /**
     * Gets the password associated to the login used for connection.
     *
     * @return the password used
     *
     */
    {
        return parent::GetPassword( );
    } //----- End of GetPassword
    
    public function Open( $isPersistent )
	/**
	 * Try to open connection.
	 *
	 * @param $isPersistent specifies if connection may be persistent or not = { CONNECTION_PERSISTENT | CONNECTION_NOT_PERSISTENT }
	 *
	 *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/mysql-pconnect.html
	 * @see http://dev.mysql.com/doc/refman/5.0/en/mysql-connect.html
	 */
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
                // connexion échouée
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
    
    public function SetDatabase( $database ) 
    /**
     * Sets the database to be used.
	 * Connection may be opened.
     *
	 * @param $database the name of the database to be used
     *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/mysql-select-db.html
     *
     */
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
            // change échoué
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
    
    public function Query( $query )
    /**
     * try to send a query to DB server
	 * Connection may be opened.
     *
	 * @param $query the query to be done
     *
     * @return - an Errors object in case of error(s)
     * @return - a BDDRecord object which contains entries as BDDRecordItem s
     *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/mysql-query.html
	 *
     */
    {
        if ( $this->database == '' )
        // no database selected
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'Aucune base de données sélectionnée' ) );
            
            return $errs;            
        }
        else
        {
            if ( ( $result = @mysql_query( $query , $this->connection ) ) === false ) 
            // query failed
            {
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_QUERY_FAILED , 'La requete a échoué ('.$query.') : '.mysql_error( $this->connection ) ) );
                
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
    
    public function GetQueriesCount ( )
    /**
     * Gets the number of queries that has been successfully sent.
     *
     * @return the number of queries sent from the creation of the object
     *
     */
	{
		return parent::GetQueriesCount();
	} //----- End of GetQueriesCount
    
    public function Close( )
    /**
     * Try to close the connection
     *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
     *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/mysql-close.html
     */
    {
        if ( !$this->isConnected() || !@mysql_close( $this->connection ) )
        {
            // no connection
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_CLOSED , 'Connexion déjà fermée' ) );
            
            return $errs;
        }
        else
        {
            $this->database = '';
        
            return NULL;
        }
    } //----- End of Close
    
    public function isConnected ( )
    /**
     * Check whether connection is opened or closed
     *
     * @return - true if connection is active
     * @return - false if connection is closed
     *
     */
    {
        return ( $this->connection !== NULL && @mysql_stat ( $this->connection ) !== NULL );
    } //----- End of isConnected
    
//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $server = '' , $username = '' , $password = '' )
	/**
	 * initialise members of the object.
	 * interrupts script if DataBase is not supported.
	 *
	 * @param $server the host address
	 * @param $username the login to be used for connection
	 * @param $password the password associated to the login
	 *
	 */
    {
            if ( ! function_exists( 'mysql_connect' ) )
            {
                die('PHP does not support MySQL');
            }
            
            $this->connection = NULL;
            
            $this->server = $server;
            $this->username = $username;
            $this->password = $password;
            
            $this->database = '';
            
            $this->nombreRequetes = 0;
    } //----- End of contructor
    
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

}

//------------------------------------------------------ other definitions

?>