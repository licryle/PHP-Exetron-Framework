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
	
    public static function GetInstance ( )
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
	{
		return parent::getThis( __CLASS__ );
	} // End of GetInstance
	

    public function OnLoad ( )
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
	{
		parent::OnLoad();
		
		$appl = Application::GetInstance();
		$DBVars = & @$appl->GetVariables[ DB_ARRAY_INDEX ];
		
		// set up all 'always' needed connections
		foreach ( $DBVars as $key => $db )
		{
			if ( $db['alwaysUse'] && ! isset ( $DBVars[ $key ] ) )
			{
				// set up
				$className = $db[ 'type' ].'Connection';
				$DBVars[ $key ] = new $className ( );
				
				$DBVars[ $key ]->SetServer( $db['host'] );
				$DBVars[ $key ]->SetUsername( $db['login'] );
				$DBVars[ $key ]->SetPassword( $db['password'] );
				
				$DBVars[ $key ]->Open( BDDConnection::CONNECTION_PERSISTENT );
				
				$DBVars[ $key ]->SetDatabase( $db['database'] );
			}
		}
		
		$className = $DBVars[ MYSQL_CONF_BASE ][ 'type' ].'TableVariable';
		$configuration = new $className ( CONFIGURATION_TABLE_NAME, $DBVars[ MYSQL_CONF_BASE ], $errors );

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
			$appl->SetConfiguration( $conf );
			
			unset ( $conf );
		}
		
		unset ( $servConf );
		unset ( $siteConf );

		$sessionsActivated = $appl->GetConfiguration()->GetVariableByName( SITE_SESSIONS_ACTIVATED );
		
		if ( ! ($sessionsActivated InstanceOf Errors) && $sessionsActivated->GetProperty ( TableVariable::TABLE_COLUMN_DATA ) )
		{
			// activate sessions
			Session::GetInstance();
		}
		
		unset ( $sessionsActivated );
		unset ( $appl );
	} //---- End of OnLoad
	
    public function Process ( )
	/**
	 * Function called after OnLoad and before OnUnLoad.
	 * Here is all the process of the page.
	 *
	 */
	{
		parent::Process();
	} //---- End of Process
	
    public function OnUnLoad ( $applicationVars )
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
	{
		parent::OnUnLoad( $applicationVars );
	} //---- End of OnUnLoad

//---------------------------------------------- Constructors - destructor
    protected function __construct()
	/**
	 * instanciates an XHTMLSitePage.
	 *
	 */
    {	
		parent::__construct();
    } //---- End of __construct


    public function __destruct ( )
	/**
	 * Destructs ressources allocated
	 */
    {
    } //---- End of __destruct

//---------------------------------------------------------- Magic Methods

    public function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    {
		return parrent::__ToString();
    } //---- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions

?>