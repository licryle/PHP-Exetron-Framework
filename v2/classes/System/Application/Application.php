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
     * Start the application.
	 * Call the call back function set up by OnApplicationStart.
	 *
	 * @return null if application successfully started
	 * @return an object of type Errors in case of error(s).
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
		register_shutdown_function ( $this->onApplicationEnd, $this->systemVars );

		return $this->launchCallBack ( 'onApplicationStart' );
	} //----- End of Start
	
    /**
     * Set up call_back function for Application Start.
	 * The $function will be called when Start() will.
	 * 
	 * @param $function the name of the function to be called
	 * @param $params must be an array of parameters for the function
	 * 
	 * For calling method of a class, use array (& $obj, 'method_name')
	 * 
	 * @return an object of Errors' type in case of Error(s)
	 * @return null instead
	 * 
	 * 
	 * Errors may be composed by :
	 * - ApplicationError::FUNCTION_NOT_CALLABLE;
	 * - ApplicationError::FUNCTION_PARAM_NOT_ARRAY;
	 * - ApplicationError::CALLBACK_NOT_EXISTS;
	 * 
	 */
    final public function OnApplicationStart ( $function, $params )
	{
		HooksManager::GetInstance()->Trigger( Application::HOOK_START );
	} //----- End of OnApplicationStart
	
    /**
     * Set up call_back function for Application End.
	 * The $function will be called when Script will be stopped
	 * 
	 * @param $function the name of the function to be called
	 * @param $function may accept 1 argument. This argument will be an array of system variables
	 * Please look at the definition of systemVars
	 * 
	 * For calling method of a class, use array (& $obj, 'method_name')
	 * 
	 * @return an object of Errors' type in case of Error(s)
	 * @return null instead
	 *
	 * Errors may be composed by :
	 * - ApplicationError::FUNCTION_NOT_CALLABLE;
	 * - ApplicationError::FUNCTION_PARAM_NOT_ARRAY;
	 * - ApplicationError::CALLBACK_NOT_EXISTS;
	 *
     */
    public function OnApplicationEnd ( $function )
	{
		HooksManager::GetInstance()->Trigger( Application::HOOK_SHUTDOWN );
		$falseArray = array();
			$errors = $this->setCallBack ( 'onApplicationEnd', $function, $falseArray ) ;
		unset( $falseArray );
		
		if ( $errors InstanceOf Errors )
		{
			return $errors;
		}

		return null;
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
	
		$this->onApplicationStart = -1;
		$this->onApplicationStartParams = -1;
		
		$this->onApplicationEnd = -1;
		$this->onApplicationEndParams = -1;
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
	
	/**
	 * Let us know if a $function and it's $params are good to form a 
	 * call back function
	 *
	 * @param $function The function tobe verified
	 * @param $params The parameters for the function as a call back
	 * @param $errors The "return by reference"'s variable for errors detected.
	 *
	 * $errors MUST BE a valid Errors object.
	 *
	 * @return true if the function can be set as CallBack
	 * @return false instead
	 */
	protected function isCorrectCallBack ( & $function, & $params, Errors & $errors )
	{	
		// function incorrect or doesn't have good scope
		if ( !is_callable( $function ) )
		{
			$errors->Add ( new ApplicationError ( ApplicationError::FUNCTION_NOT_CALLABLE, 'Incorrect function or scope.') );
		}
		
		// params not an array
		if ( !is_array( $params ) )
		{
			$errors->Add ( new ApplicationError ( ApplicationError::FUNCTION_PARAM_NOT_ARRAY, 'Params of the function must be an array.') );		
		}
		
		return ( $errors->GetCount () == 0 );
	} //------ End of isCorrectCallBack
	
	/**
	 * Internally sets call back for callback named $callBackName/
	 *
	 * @param $callBackName the name of the call back to be set
	 * @param $function the function to set as a callback
	 * @param $params the parameters for the function to be set
	 *
	 * @return an object of Errors' type in case of Error(s)
	 * @return null instead
	 *
	 * Errors may be composed by :
	 * - ApplicationError::FUNCTION_NOT_CALLABLE;
	 * - ApplicationError::FUNCTION_PARAM_NOT_ARRAY
	 * - ApplicationError::CALLBACK_NOT_EXISTS
	 *
	 */
	protected function setCallBack ( $callBackName, & $function, & $params )
	{			
		$errors = new Errors();
		
		if ( $this->isCorrectCallBack( $function , $params, $errors ) === false )
		// if we had some errors
		{
			return $errors;
		}

		if ( ! IsSet ( $this->{$callBackName} ) || ! IsSet ( $this->{$callBackName.'Params'} ) )
		{
			$errors->Add ( new ApplicationError ( ApplicationError::CALLBACK_NOT_EXISTS, 'You tried to set up a callback that doesn\'t exists.') );
			
			return $errors;
		}
		
		// association
		$this->{$callBackName} = $function;
		$this->{$callBackName.'Params'} = $params;
		
		unset ( $errors );
		
		return null;
	} //----- End of setCallBack
	
	/**
	 * Launch CallBack function that names $callBackName.
	 * 
	 * @param $callBackName the name of the call back to be called
	 *
	 * @return an object of Errors' type in case of Error(s)
	 * @return null instead
	 *
	 */
	protected function launchCallBack ( $callBackName )
	{
		// launch start call_back function if set
		if ( @$this->{ $callBackName } !== -1 )
		{
			call_user_func_array ( $this->{ $callBackName }, $this->{ $callBackName.'Params' } );
			
			return null;
		}
		else
		{
			$errors = new Errors();
			$errors->Add ( new ApplicationError ( ApplicationError::CALLBACK_NOT_SET, 'You are trying to launch an unset callback function.') );
			
			return $errors;
		}
	} //----- End of launchCallBack

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
	
	// call-backs
	
	/** the function to call back on Application start */
	protected $onApplicationStart;
	/** the parameters of the function to call back on application start */
	protected $onApplicationStartParams;
	
	/** the function to call back on Application end */
	protected $onApplicationEnd;
	/**
	 * false parameters of the function to call back on application end
	 * The true parameters are generated from system configuration.
	 *
	 */
	protected $onApplicationEndParams;
	
	/** contains the configuration of the Application */
	protected $configuration;
}

//----------------------------------------------------- Others definitions

?>