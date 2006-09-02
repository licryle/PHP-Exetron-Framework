<?php

/*************************************************************************
                           |Application.php|
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

/*!
 * *************************** Change Log ********************************
 * 08.08.2006 by Cyrille BERLIAT <cyrille.berliat@gmail.com>
 * Changing old callback system to use HookManager for functions 
 * OnApplicationStart and OnApplicationEnd
 * ***********************************************************************
 */
//------------- Class <Application> (file Application.php) ---------------
/*if (defined('APPLICATION_H'))
{
    return;
}
else
{

}
define('APPLICATION_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Represents an application. All your PHP applications may inherits from
 * this class. It has to be instancied by a first call to GetInstance().
 * All next calls will only return the reference to the Application pre-
 * viously instancied.
 *
 * When application is started (a call to Start()), the Application object
 * automatically calls the call back set up with OnApplicationStart().
 *
 * A call back is also called when application ends. Application uses the
 * PHP's API register_shudown_function. You MUST NOT use this function by
 * yourself as it would by pass Application class's callback.
 *
 * Application can keep the configuration of your application by using 
 * SetConfiguration() and GetConfiguration().
 *
 * As a general abstraction of an application, Application does not
 * include $_GET, $_POST or $_FILES variables. You may look at child named
 * WebApplication.
 *
 * @see register_shutdown_function on http://www.php.net
 * 
 */
//------------------------------------------------------------------------ 

class Application extends AbstractSingleton
{
//----------------------------------------------------------------- PUBLIC
	/** Variable index for Unix Time of Application start */
	const SYSTEM_START_TIME = 'SYSTEM_START_TIME';
	
	/** Hook called just before Application shutdown */
	const HOOK_SHUTDOWN = 'Application_Shutdown';
	
	/** Hook called just before Application shutdown */
	const HOOK_START = 'Application_Start';

//--------------------------------------------------------- Public Methods
	
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
	} //----- End of GetInstance
	
    /**
     * Get the object of type Variables that correspond 
	 * to the configuration of Application. Configuration has to be set
	 * with SetConfiguration().
	 * 
	 * You MUST NOT unset or change it's type using reference.
	 *
	 * @return the configuration of the application as a Variables' object.
	 */
    public function GetConfiguration ( )
	{
		return $this->configuration;
	} //----- End of GetConfiguration
	
    /**
     * Set the Application Configuration to the one given by $configuration.
	 * If $configuration is NULL, the new confoguration will be empty.
	 *
	 * @param $configuration the new configuration of the application.
	 */
    public function SetConfiguration ( Variables $configuration )
	{
		if ( $configuration == NULL )
		{
			unset ( $this->configuration );
			$this->configuration = new Variables( new BBDRecordSet() );
		}
		else
		{
			$this->configuration = $configuration;
		}
	} //----- End of SetConfiguration
	
	
    /**
     * Tries to start the application.
	 * Sets up system vars and shutdown_function.
	 * Triggers Application::HOOK_START without an empty array of parameters.
	 *
	 * @return null if application successfully started
	 * @return an object of type Errors in case of error(s). Errors can be :
	 * - ApplicationError::ALREADY_STARTED if Application::Start has already
	 * been called.
	 *
	 */
    public function Start ( )
	{
		if ( $this->started )
		{
			$errors = new Errors ();
			$errors->Add ( new ApplicationError ( ApplicationError::ALREADY_STARTED, 'Application has been already started.' ) );
			
			return $errors;
		}
	
		// get launchTime in microseconds
		$this->systemVars[ self::SYSTEM_START_TIME ] = microtime ( true );
		
		// set up call back function for the end of the application
		register_shutdown_function ( array(& $this,'onApplicationEnd'), $this->systemVars );

		$var = array();
		HooksManager::GetInstance()->Trigger( Application::HOOK_START, $var );
	} //----- End of Start
	
    /**
     * Triggers the Application::HOOK_SHUTDOWN hook with the given $params.
	 *
	 * @param $params array of parameters to be sent to registered functions 
	 * for this hook.
	 *
     */
    public function OnApplicationEnd ( $params )
	{
		$params = array( $params );
		HooksManager::GetInstance()->Trigger( Application::HOOK_SHUTDOWN, $params );
	} //----- End of OnApplicationEnd

//---------------------------------------------- Constructors - destructor
	/**
	 * Initialises systems vars, configuration and default call backs.
	 */
    protected function __construct()
    {
		parent::__construct();
		
		$this->configuration = new Variables ( new BDDRecordSet() );
		$this->started = false;
		
		$this->systemVars = array( );
		
		
    } //---- End of __construct


	/**
	 * Destructs ressources allocated
	 *
	 */
    public function __destruct ( )
    {
		parent::__destruct();
    } //---- End of __destruct
    
//---------------------------------------------------------- Magic Methods

    /**
	 * An application should never printed to screen so this method always
	 * returns an empty string.
	 */
    public function __ToString ( )
    {
		return '';
    } //---- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties
	/** check if the application has already been started */
	protected $started;

	/**
	 * The system's variable of the Application
	 * Contains Application Vars :
	 *- SYSTEM_START_TIME : Unix Time of Application start
	 *
	 */
	protected $systemVars; 
	
	/** contains the configuration of the Application */
	protected $configuration;
}

//----------------------------------------------------- Others definitions

?>