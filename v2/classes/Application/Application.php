<?php

/*************************************************************************
                           |Application.php|  -  description
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Interface of <Application> class (file Application.php) -----------------
if (defined('APPLICATION_H'))
{
    return;
}
else
{

}
define('APPLICATION_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Role of <Application> class
//
//
//------------------------------------------------------------------------ 

class Application
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
	
    public static function Application ( )
    // User's manual :
    //Getter of the unique instance. Create this if doesn't exist
	//
    // Contract :
    //
	{	
		if ( ! IsSet ( self::$instance ) )
		// instance creation
		{
			self::$instance = new self();
		}
		
		return self::$instance;
	} // End of Application
	
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
	
	
    public function Start ( )
    // User's manual :
    //Start the application
	//Call the call back function set up by OnApplicationStart
	//
    // Contract :
    //
	{
		// get launchTime in microseconds
		$this->launchTime = microtime ( true );
		
		$this->launchCallBack ( 'onApplicationStart' );
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
	
    public function OnApplicationEnd ( $function, $params )
    // User's manual :
    //Set up call_back function for Application End.
	//The $function will be called when Script will be stopped
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
		$errors = $this->setCallBack ( 'onApplicationEnd', $function, $params ) ;
		
		if ( $errors InstanceOf Errors )
		{
			return $errors;
		}
		
		// build register_shutdown_function params
		$reg_params = '';
		foreach ( $params as $value )
		{
			// replace ' by \', don't use addslashes that parses also "...
			$reg_params .= ', \''.str_replace ( '\'', '\\\'', $value ) .'\'';
		}
		echo $reg_params;
		eval ( 'register_shutdown_function ( \''.$function.'\' '.$reg_params.' );');
		
		unset ( $reg_params );
		
		return null;
	}

//---------------------------------------------- Constructors - destructor
    private function __construct()
    // User's manual :
    //Internal constructor that disable instanciation
    // Contract :
    //
    {
		$this->configuration = new Variables ( null, $err);
	
		$this->onApplicationStart = -1;
		$this->onApplicationStartParams = -1;
		
		$this->onApplicationEnd = -1;
		$this->onApplicationEndParams = -1;
    	
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
			@ call_user_func_array ( $this->{ $callBackName }, $this->{ $callBackName.'Params' } );
		}		
	} // End of launchCallBack

//--------------------------------------------------- protected properties
	protected static $instance;
	protected $launchTime; // Unix Time of Application start
	
	// call-backs
	protected $onApplicationStart;
	protected $onApplicationStartParams;
	
	protected $onApplicationEnd;
	protected $onApplicationEndParams;
	
	//configuration of the Application
	protected $configuration;
}

//----------------------------------------------------- Others definitions

?>