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
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
	
    public static function GetInstance ( )
    // User's manual :
    //Getter of the unique instance. Create this if doesn't exist
	//Must appears in all children.
	//
    // Contract :
    //
	{
		return parent::getThis( __CLASS__ );
	} // End of GetInstance
	

    public function OnLoad ( )
    // User's manual :
    //function to be called on ApplicationStart
	//
    // Contract :
    //
	{
		parent::OnLoad();
		
		$appl = Application::GetInstance();
		$DBVars = & $appl->GetVariables[ DB_ARRAY_INDEX ];
		
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
    // User's manual :
    //all processes of the page.
	//called after ApplicationStart / OnStart.
	//
    // Contract :
    //
	{
		parent::Process();
	} //---- End of Process
	
    public function OnUnLoad ( $applicationVars )
    // User's manual :
    //function to be called on ApplicationEnd
	//
    // Contract :
    //
	{
		parent::OnUnLoad( $applicationVars );
	} //---- End of OnUnLoad

//---------------------------------------------- Constructors - destructor
    protected function __construct()
    // User's manual :
    //Internal constructor that disable instanciation
    // Contract :
    //
    {	
		parent::__construct();
    } //---- End of __construct


    public function __destruct ( )
    // User's manual :
    //
    // Contract :
    //
    {
    } //---- End of __destruct

//---------------------------------------------------------- Magic Methods

    public function __ToString ( )
    // User's manual :
    //
    // Contract :
    //
    {
		return '';
    } //---- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods
    // protected type Méthode ( );
    // User's manual :
    //
    // Contract :
    //

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions

?>