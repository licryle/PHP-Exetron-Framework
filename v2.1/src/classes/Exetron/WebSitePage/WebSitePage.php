<?php

/*************************************************************************
                           |WebSitePage.php|
                             -------------------
    start                : |10.04.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <WebSitePage>  (file WebSitePage.php) -----------------
/*if (defined('WEBSITEPAGE_H'))
{
    return;
}
else
{

}
define('WEBSITEPAGE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Web Extension of XHTMLSitePage. It includes a BDDConnection for
 * configuration loading.
 *
 * This class 
 */
//------------------------------------------------------------------------ 

class WebSitePage extends XHTMLSitePage
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- Public Methods
	
	/**
	 * Gets the current session object
	 *	 
	 * @return unique instance of a Session object
	 */
	public function GetSession()
	{
		return $this->session;
	} //---- End of GetSession
	
	/**
	 * Gets all active databases connections
	 *	 
	 * @return an array of all active connections
	 */
	public function GetDatabasesConnections()
	{
		return $this->databasesConnections;
	} //---- End of GetDatabasesConnections
	
	/**
	 * Gets configuration database connection
	 *	 
	 * @return a Database object
	 */
	public function GetConfigurationDatabaseConnection()
	{
		return $this->confDatabaseConnection;
	} //---- End of GetDatabasesConnections
	
	/**
	 * Gets a unique instance of current class.
	 * Create it if it doesn't exist.
	 * Children must call parent::getInstance( __CLASS__ )
	 *
	 * This method MUST be redefined in ALL children.
	 *
	 * @return unique instance of current class
	 *
	 * @see AbstractSingleton::getThis()
	 *
	 */
    public static function GetInstance ( )
	{
		return parent::getThis( __CLASS__ );
	} // End of GetInstance
	

	/**
	 * callback function to be called by Application on ApplicationStart.
	 * Initializes the page with an XHTMLPageTemplate.
	 *
	 * Then try to load configuration variables for site and server.
	 *
	 * DB_ARRAY_INDEX must be set.
	 * MYSQL_CONF_BASE must be set.
	 * SITE_SESSIONS_ACTIVATED must be set.
	 * IDSITE must be set.
	 * Application->GetVariables[ DB_ARRAY_INDEX ] must be set.
	 *
	 * @see Application class
	 *
	 */
    public function OnLoad ( )
	{
		parent::OnLoad();
		
		$DBVars =  & $this->GetApplication()->GetVariables();
		$DBVars = & $DBVars[ DB_ARRAY_INDEX ];
		
		$this->initializeDatabasesConnections( $DBVars, MYSQL_CONF_BASE );
		
		
		$confConnexion = $this->GetConfigurationDatabaseConnection( );
		
		$className = $DBVars[ MYSQL_CONF_BASE ][ 'type' ].'TableVariable';
		$configuration = new $className ( CONFIGURATION_TABLE_NAME, $confConnection, $errors );

		unset ( $DBVars );
		unset ( $className );
		unset ( $confConnection );
		
		$servConf = $configuration->SelectServerVariables();
		$siteConf = $configuration->SelectSiteVariables( IDSITE );
		
		unset ( $configuration );
		
		if ( $siteConf InstanceOf Errors || $servConf InstanceOf Errors )
		{
			echo ( $siteConf . $servConf );
		}
		else
		{
			$conf = $servConf;
			
			foreach ( $siteConf as $siteVar )
			{
				$conf->Add ( $siteVar );
			}
		
			// load Server configuration
			$this->GetApplication()->SetConfiguration( $conf );
			
			unset ( $conf );
		}
		
		unset ( $servConf );
		unset ( $siteConf );

		$sessionsActivated = $this->GetApplication()->GetConfiguration()->GetVariableByName( SITE_SESSIONS_ACTIVATED );
		
		
		$this->GetTemplate()->GetHeaders()->AddHeaders( '<title>'.$this->GetApplication()->GetConfiguration()->GetVariableByName( SITE_TITLE )->GetProperty ( TableVariable::TABLE_COLUMN_DATA ).'</title>' );
		$this->GetTemplate()->GetHeaders()->AddHeaders( '<meta http-equiv="desc" content="'.$this->GetApplication()->GetConfiguration()->GetVariableByName( SITE_DESCRIPTION )->GetProperty ( TableVariable::TABLE_COLUMN_DATA ).'" />' );
		$this->GetTemplate()->GetHeaders()->AddHeaders( '<meta http-equiv="keywords" content="'.$this->GetApplication()->GetConfiguration()->GetVariableByName( SITE_KEYWORDS )->GetProperty ( TableVariable::TABLE_COLUMN_DATA ).'" />' );
		
		if ( ! ($sessionsActivated InstanceOf Errors) && $sessionsActivated->GetProperty ( TableVariable::TABLE_COLUMN_DATA ) )
		{
			// activate sessions
			$this->session = Session::GetInstance();
		}
		
		unset ( $sessionsActivated );
	} //---- End of OnLoad
	
	/**
	 * Function called after OnLoad and before OnUnLoad.
	 * Here is all the process of the page.
	 *
	 */
    public function Process ( )
	{
		parent::Process();
	} //---- End of Process
	
	/**
	 * callback function to be called by Application on ApplicationEnd.
	 * Sets up Execution time from Tag named TAG_EXECUTION_TIME and
	 * flushes the page.
	 *
	 * @param $applicationVars arguments passed by Application on function
	 * call - see Application class
	 *
	 * @see Application class
	 *
	 */
    public function OnUnLoad ( $applicationVars )
	{
		parent::OnUnLoad( $applicationVars );
	} //---- End of OnUnLoad

//---------------------------------------------- Constructors - destructor
	/**
	 * instanciates a WebSitePage.
	 *
	 */
    protected function __construct()
    {
		$this->databasesConnections = array();
		$this->confDatabaseConnection = NULL;
		
		parent::__construct();
    } //---- End of __construct


	/**
	 * Destructs ressources allocated
	 */
    public function __destruct ( )
    {
    } //---- End of __destruct

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
    } //---- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods
	/**
	 * Initializes all databases connections flaged as used in the $DBVars
	 * array.
	 *
	 * @param $DBVars array of Databases structures
	 *
	 * @param $confDBIndex integer that indicates which $DBVars contains
	 * the database connection for the configuration of all sites.
	 *
	 */
	protected function initializeDatabasesConnections( & $DBVars, $confDBIndex )
	{		
		$this->confDatabaseConnection = NULL;
	
		// set up all 'always' needed connections
		foreach ( $DBVars as $index => $db )
		{
			if ( $db['alwaysUse'] )
			{
				// set up
				$className = $db[ 'type' ].'Connection';
				$newDB = new $className ( ) or ($errors = new Errors());
				
				$newDB->SetServer( $db['host'] );
				$newDB->SetUsername( $db['login'] );
				$newDB->SetPassword( $db['password'] );
				
				$newDB->Open( BDDConnection::CONNECTION_PERSISTENT );
				
				$errors = $newDB->SetDatabase( $db['database'] );
				
				if ( $errors == NULL )
				{
					$this->databasesConnections[] = & $newDB;
					
					if ( $index == $confDBIndex )
					{
						$this->confDatabaseConnection = & $newDB;
					}
				}
				else
				{
					die ( $errors );
				}
				
				unset ( $newDB );
			}
		}
	} //----- End of initializeDatabasesConnections

//--------------------------------------------------- protected properties
	/** session object */
	protected $session;
	
	/** array of databases connections */
	protected $databasesConnections;
	
	/** reference to main database connection : the configuration one */
	protected $confDatabaseConnection;
}

//----------------------------------------------------- Others definitions

?>