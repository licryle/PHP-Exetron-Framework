<?php

/*************************************************************************
                           |Application.php|
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <Application> (file Application.php) -----------------
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
 *
 */
//------------------------------------------------------------------------ 

class Application extends AbstractSingleton
{
//----------------------------------------------------------------- PUBLIC
	//Unix Time of Application start
	const SYSTEM_START_TIME = 'SYSTEM_START_TIME';

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
	
    public function GetConfiguration ( )
    // User's manual :
    //Get the object of type Variables that correspond
	//to the configuration of Application
	//
	// Returns :
	//- the configuration of the application
	//
    // Contract :
    //- You must not unset the configuration or change it's type
	//
	{
		return $this->configuration;
	} // End of GetConfiguration
	
    public function SetConfiguration ( Variables $configuration )
    // User's manual :
    //Set the Application Configuration to the one given by $configuration
	//
	// Returns :
	//
    // Contract :
    //- You must not unset the configuration or change it's type
    //- $configuration must be not null
	//
	{
		$this->configuration = $configuration;
	} // End of SetConfiguration
	
	// variables
	
    public function GetPOSTVariables ( )
    // User's manual :
    //Get the array of POST Variables
	//
	// Returns :
	//- array of POST Variables
	//
	{
		return $this->var_post;
	} // End of GetPOSTVariables
	
    public function GetGETVariables ( )
    // User's manual :
    //Get the array of GET Variables
	//
	// Returns :
	//- array of GET Variables
	//
	{
		return $this->var_post;
	} // End of GetGETVariables
	
    public function GetVariables ( )
    // User's manual :
    //Get the array of GLOBALS Variables
	//
	// Returns :
	//- array of GLOBALS Variables
	//
	{
		return $this->var_globals;
	} // End of GetVariables
	
    public function GetFILES ( )
    // User's manual :
    //Get the array of FILES Variables
	//
	// Returns :
	//- array of FILES Variables
	//
	{
		return $this->var_globals;
	} // End of GetFILES
	
	// end of variables
	
	
    public function Start ( )
    // User's manual :
    //Start the application
	//Call the call back function set up by OnApplicationStart
	//
	// Returns :
	//- null if application successfully started
	//- an object of type Errors in case of error(s)
	//
    // Contract :
    //
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
	} // End of Start
	
    public function OnApplicationStart ( $function, $params )
    // User's manual :
    //Set up call_back function for Application Start.
	//The $function will be called when Start() will
	//
	//$function is the name of the function to be called
	//$params must be an array of parameters for the function
	//
	//For calling method of a class, use array (& $obj, 'method_name')
	//
	// Returns :
	//- return an object of Errors' type in case of Error(s)
	//- null instead
	//
	//
	// Errors may be composed by :
	// - ApplicationError::FUNCTION_NOT_CALLABLE;
	// - ApplicationError::FUNCTION_PARAM_NOT_ARRAY;
	// - ApplicationError::CALLBACK_NOT_EXISTS;
	//
    // Contract :
    //
	{
		return $this->setCallBack ( 'onApplicationStart', $function, $params ) ;
	}
	
    public function OnApplicationEnd ( $function )
    // User's manual :
    //Set up call_back function for Application End.
	//The $function will be called when Script will be stopped
	//
	//$function is the name of the function to be called
	//$function may accept 1 argument. This argument will be an array of system variables
	//Please look at the definition of systemVars
	//
	//For calling method of a class, use array (& $obj, 'method_name')
	//
	// Returns :
	//- return an object of Errors' type in case of Error(s)
	//- null instead
	//
	//
	// Errors may be composed by :
	// - ApplicationError::FUNCTION_NOT_CALLABLE;
	// - ApplicationError::FUNCTION_PARAM_NOT_ARRAY;
	// - ApplicationError::CALLBACK_NOT_EXISTS;
	//
    // Contract :
    //
	{
		$falseArray = array();
			$errors = $this->setCallBack ( 'onApplicationEnd', $function, $falseArray ) ;
		unset( $falseArray );
		
		if ( $errors InstanceOf Errors )
		{
			return $errors;
		}

		return null;
	}

//---------------------------------------------- Constructors - destructor
    protected function __construct()
    // User's manual :
    //Internal constructor that disable instanciation
    // Contract :
    //
    {
		$this->configuration = new Variables ( new BDDRecordSet() );
		$this->started = false;
		
		$this->systemVars = array( );
	
		$this->onApplicationStart = -1;
		$this->onApplicationStartParams = -1;
		
		$this->onApplicationEnd = -1;
		$this->onApplicationEndParams = -1;
		
		$this->var_globals = & $GLOBALS;
		$this->var_post = & $_POST;
		$this->var_get = & $_GET;
		$this->var_files = & $_FILES;
    	
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
	
	protected function isCorrectCallBack ( & $function, & $params, Errors $errors )
	// User's manual :
	//Let us know if a $function and it's $params are good to form a 
	//call back function
	//
	// Returns :
	//- true if the function can be set as CallBack
	//- false instead
	//
	// Contract :
	//$errors must be not null
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
	} // End of isCorrectCallBack
	
	protected function setCallBack ( $callBackName, & $function, & $params )
	// User's manual :
	//Let us know if a $function and its $params are good to form a 
	//call back function
	//
	// Returns :
	//- return an object of Errors' type in case of Error(s)
	//- null instead
	//
	//
	// Errors may be composed by :
	// - ApplicationError::FUNCTION_NOT_CALLABLE;
	// - ApplicationError::FUNCTION_PARAM_NOT_ARRAY
	// - ApplicationError::CALLBACK_NOT_EXISTS
	//
	// Contract :
	//
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
	} // End of setCallBack
	
	protected function launchCallBack ( $callBackName )
	// User's manual :
	//Launch CallBack function that names $callBackName
	//
	// Returns :
	//- return an object of Errors' type in case of Error(s)
	//- null instead
	//
	//
	// Errors may be composed by :
	//
	// Contract :
	//
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
	} // End of launchCallBack

//--------------------------------------------------- protected properties
	protected $started; // check if the application has already been started

	protected $systemVars; 
	// Contains Application Vars :
	//- SYSTEM_START_TIME : Unix Time of Application start
	
	// call-backs
	protected $onApplicationStart;
	protected $onApplicationStartParams;
	
	protected $onApplicationEnd;
	protected $onApplicationEndParams; // false params for ending call_back
	
	// globals
	protected $var_get;
	protected $var_post;
	protected $var_global;
	protected $var_files;
	
	//configuration of the Application
	protected $configuration;
}

//----------------------------------------------------- Others definitions

?>