<?php


/*************************************************************************
                           |AbstractIterator.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Interface <AbstractIterator> (file AbstractIterator.php) --------------
/*if (defined('ABSTRACTITERATOR_H'))
{
    return;
}
else
{

}
define('ABSTRACTITERATOR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for ESP's Iterator.
 */
//------------------------------------------------------------------------ 

interface AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
    
    /*
	 * Adds a BDDRecord to the Iterator.
     *
     * @param $item the BDDRecord to add
     *
     */
    //public function Add( AbstractClass $item );

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( );

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( );
    
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |AbstractClass.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <AbstractClass> (file AbstractClass.php) --------------
/*if (defined('ABSTRACTCLASS_H'))
{
    return;
}
else
{

}
define('ABSTRACTCLASS_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for all classes possible
 */
//------------------------------------------------------------------------ 

abstract class AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

//-------------------------------------------- Constructeurs - destructeur
    /**
	 * Initialises object
     */
    public function __construct()
	{
	} //---- End of constructor
	
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{
        /*$vars = get_object_vars($this);
        
        foreach($vars as $key => $var)
        {
          //  unset($this->{$key});
        }
        
        unset($vars);   */    
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods

    /**
	 * Returns a printable version of object for debugging.
	 */
    public function __ToString ( )
    {
        return (string)var_export($this);
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |AbstractSingleton.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <AbstractSingleton> (file AbstractSingleton.php) --------------
/*if (defined('ABSTRACTSINGLETON_H'))
{
    return;
}
else
{

}
define('ABSTRACTSINGLETON_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for singleton classes.
 * A singleton class can only have 1 instance running at a time.
 */
//------------------------------------------------------------------------ 

abstract class AbstractSingleton
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
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
	abstract public static function GetInstance ( );
	//{
	//	return parent::getThis ( __CLASS__ );
	//}

//-------------------------------------------- Constructeurs - destructeur
	/**
	 * instanciates an AbstractSingleton (for overwriting only).
	 *
	 */
    protected function __construct()
    {
    } //---- End of __construct
	 
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{
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
		return parrent::__ToString();
    } //----- End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods
	
	/**
	 * Gets a unique instance of class $class.
	 * Create it if it doesn't exist.
	 *
	 * @param $class the name of the class to be instancied or gotten
	 *
	 * @return unique instance of class $class
	 *
	 */
    protected static function getThis ( $class )
	{
		if ( !IsSet ( self::$instance ) || ! IsSet ( self::$instance[ $class ] ) )
		// instance creation
		{
			self::$instance[ $class ] = new $class(); 
		}

		return self::$instance[ $class ];
	} //----- End of getThis


//------------------------------------------------------ protected members
	/** Array of handlers indexed by classname */
	protected static $instance;
}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |Error.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Error> (file Error.php) --------------
/*if (defined('ERROR_H'))
{
    return;
}
else
{

}
define('ERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides Error management. An error is composed by an error code and a
 * message.
 */
//------------------------------------------------------------------------ 

class Error extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
    
	/**
	 * Gets message associated to the error.
	 *
	 * @return The message associated to the error
	 *
     */
    public function GetMessage( )
    {
        return $this->erreurString;
    }
    
	/**
	 * Gets code associated to the error.
	 *
	 * @return The code associated to the error
	 *
     */
    public function GetCode( )
    {
        return $this->erreurCode;
    }

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises an Error object from a $code and a message $str.
	 *
	 * @param $code The error code
	 * @param $str The message associated to the error
	 *
     */
    public function __construct( $code, $str )
    {
		parent::__construct();
	
        $this->erreurCode = $code;
        $this->erreurString = $str;
    } //---- End of constructor
	
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
        return $this->erreurString;
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	/** the code of the error */
    protected $erreurCode;
	
	/** the message of the error */
    protected $erreurString;
}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |Errors.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Errors> (file Errors.php) --------------
/*if (defined('ERRORS_H'))
{
    return;
}
else
{

}
define('ERRORS_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Manages a list of Error-s (or children objects).
 * Provides basic methods for this management.
 */
//------------------------------------------------------------------------ 

class Errors extends AbstractClass implements Iterator, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
    /**
	 * Adds an Error to the Sites if it is different than NULL.
	 * Error-s are indexed by their code.
     *
     * @param $item the Error to add 
     *
     */
    public function Add( Error $item )
    {
		if ( $item == NULL ) return;
		
        $this->errors[ $item->getCode( ) ] = $item;
    } //---- End of Add

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset($this->errors);
        
        $this->errors = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $this->errors );
    } //---- End of GetCount
    
//--------------------------------------------- Iterator's implementation
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->errors );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $this->errors );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return $this->current( )->getCode( );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->errors );
    } //---- End of Next
    
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    public function Valid( )
    {
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises Errors.
	 *
     */
    public function __construct( )
    {
		parent::__construct();
	
    	$this->errors = array( );
    } //---- End of constructor


	/**
	 * Destructs ressources allocated
	 */
    public function __destruct ( )
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    function __ToString ( )
    {
        $str = '';
        
        foreach( $this as $code => $error )
        {
            $str .= $code . ' ' . $error->getMessage() . chr (10);
        }
        
        return $str;
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	
	/** Array of Error-s indexed by Error's code */
	protected $errors;

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |ApplicationError.php|
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <ApplicationError>  (file ApplicationError.php) -----------------
/*if (defined('APPLICATIONERROR_H'))
{
    return;
}
else
{

}
define('APPLICATIONERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Application's Errors.
 */
//------------------------------------------------------------------------ 

class ApplicationError extends Error
{
//----------------------------------------------------------------- PUBLIC

	/**
	 * The given function does not have suffisant scope to be called
	 * or does not exists
	 */
	const FUNCTION_NOT_CALLABLE = 'FUNCTION_NOT_CALLABLE';
	
	/** Parameters of function must be an array */
	const FUNCTION_PARAM_NOT_ARRAY = 'FUNCTION_PARAM_NOT_ARRAY';
	
	/** The given callback does not exists and cannot be set */
	const CALLBACK_NOT_EXISTS = 'CALLBACK_NOT_EXISTS';

	/** Callback has not been set and cannot be launched */
	const CALLBACK_NOT_SET = 'CALLBACK_NOT_SET';
	
	/** Application has already been started */
	const ALREADY_STARTED = 'ALREADY_STARTED';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



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
    public function OnApplicationStart ( $function, $params )
	{
		return $this->setCallBack ( 'onApplicationStart', $function, $params ) ;
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



/*************************************************************************
                           |WebApplication.php|
                             -------------------
    start                : |02.06.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <WebApplication> (file WebApplication.php) ------------
/*if (defined('WEBAPPLICATION_H'))
{
    return;
}
else
{

}
define('WEBAPPLICATION_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Web extension of an Application. Implements global variables manage-
 * ment : $_POST, $_GET, $_FILE.
 * 
 */
//------------------------------------------------------------------------ 

class WebApplication extends Application
{
//----------------------------------------------------------------- PUBLIC

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
		// variables
	
    /**
	 * Gets the array of POST Variables
	 *
	 * @return - array of POST Variables
	 *
	 */
    public function GetPOSTVariables ( )
	{
		return $this->var_post;
	} //---- End of GetPOSTVariables
	
    /**
	 * Gets the array of GET Variables
	 *
	 * @return - array of GET Variables
	 *
	 */
    public function GetGETVariables ( )
	{
		return $this->var_post;
	} //----- End of GetGETVariables
	
    /**
	 * Gets the array of GLOBALS Variables
	 *
	 * @return - array of GLOBALS Variables
	 *
	 */
    public function GetVariables ( )
	{
		return $this->var_globals;
	} //----- End of GetVariables
	
    /**
	 * Gets the array of FILES Variables
	 *
	 * @return - array of FILES Variables
	 *
	 */
    public function GetFILES ( )
	{
		return $this->var_files;
	} //----- End of GetFILES
	
	// end of variables
//---------------------------------------------- Constructors - destructor
	/**
	 * Initialises systems vars, configuration and default call backs.
	 */
    protected function __construct()
    {
		parent::__construct();
		
		$this->var_globals = & $GLOBALS;
		$this->var_post = & $_POST;
		$this->var_get = & $_GET;
		$this->var_files = & $_FILES;
    	
    } //---- End of __construct


	/**
	 * Destructs ressources allocated
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
		return parent::_ToString();
    } //---- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

	
	// globals
	/** represents $_GET */
	protected $var_get;
	/** represents $_POST */
	protected $var_post;
	/** represents $_GLOBALS */
	protected $var_global;
	/** represents $_FILES */
	protected $var_files;
}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |AbstractSitePageError.php|
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <AbstractSitePageError> (file AbstractSitePageError.php) -----------------
/*if (defined('ABSTRACTSITEPAGEERROR_H'))
{
    return;
}
else
{

}
define('ABSTRACTSITEPAGEERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for AbstractSitePage's Errors.
 */
//------------------------------------------------------------------------ 

class AbstractSitePageError extends Error
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |AbstractSitePage.php|
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <AbstractSitePage> (file AbstractSitePage.php) -----------------
/*if (defined('ABSTRACTSITEPAGE_H'))
{
    return;
}
else
{

}
define('ABSTRACTSITEPAGE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for SitePages for WebApplications.
 * It is a "call back" class that auto sets itself into WebApplication unique
 * instance.
 *
 * It sets ApplicationStart /ApplicationEnd with respectively OnLoad / 
 * OnUnLoad and Launch Process()
 *
 * All the processing of children will be in Process() method.
 *
 */
//------------------------------------------------------------------------ 

abstract class AbstractSitePage extends AbstractSingleton
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- Public Methods

	/**
	 * Gets the current web application
	 *	 
	 * @return unique instance of a WebApplication object
	 */
	public function GetApplication()
	{
		return $this->application;
	} //---- End of GetApplication
	
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
	 * callback function to be called by WebApplication on ApplicationStart
	 *
	 * @see Application class
	 *
	 */
    abstract public function OnLoad ( );
	
	
	/**
	 * Function called after OnLoad and before OnUnLoad.
	 * Here is all the process of the page.
	 *
	 */
    abstract public function Process ( );
	
	/**
	 * callback function to be called by WebApplication on ApplicationEnd
	 *
	 * @param $applicationVars arguments passed by Application on function
	 * call - see Application class
	 *
	 * @see Application class
	 *
	 */
    abstract public function OnUnLoad ( $applicationVars );

//---------------------------------------------- Constructors - destructor
	/**
	 * instanciates an AbstractSitePage (for overwriting only).
	 *
	 * ALL children MUST call parent::__construct()
	 *
	 * It initialises application for running as Web application on the base
	 * of this class child.
	 */
    protected function __construct()
    {
		parent::__construct();
		
		$this->application = WebApplication::GetInstance ();

		$this->application->OnApplicationStart ( array ( & $this, 'OnLoad' ), array() );
		$this->application->OnApplicationEnd ( array ( & $this, 'OnUnLoad' ), array() );

		$this->application->Start();
		
		$this->Process();
    } //---- End of __construct
	 
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
		return parrent::__ToString();
    } //----- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	
	/** application object linked to SitePage */
	protected $application;

}

//------------------------------------------------------ other definitions




/*************************************************************************
                           |SessionError.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Classe <SessionError> (file SessionError.php) --------------
/*if (defined('SESSIONERROR_H'))
{
    return;
}
else
{

}
define('SESSIONERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Session's Errors.
 */
//------------------------------------------------------------------------ 

class SessionError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
	/** This session_variable has not been set and cannot be read */
    const SESSION_VARIABLE_NOT_SET = 'SESSION_VARIABLE_NOT_SET';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |SessionInterface.php|
                             -------------------
    début                : |28.07.2006|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//----- Interface <SessionInterface> (file SessionInterface.php) ---------
/*if (defined('SESSION_H'))
{
    return;
}
else
{

}
define('SESSION_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides basic methods for all sessions management
 */
//------------------------------------------------------------------------ 

interface SessionInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    /** 
	 * Destructs the sessions and all informations relatives to this session
	 */
    public function Destruct( );
	
	/**
	 * Gets the session id.
	 *
	 * @return The id of the session
	 */
    public function GetId( );
   
	/**
	 * Sets the session id.
	 *
	 * This function must be call before the first call of GetInstance().
	 *
	 * @param $id the id to be set.
	 *
	 */
    public static function SetId( $id );
	
	/**
	 * Checks whether the varaiable named $name exists or not.
	 *
	 * @param $name The name of the variable to check for
	 *
	 * @return - True if a variable named $name exists
	 * @return - False otherwise
	 */
    public function IsSetVariable( $name );
	
	/**
	 * Unsets the variable named $name.
	 *
	 * @param $name The name of the variable to be unsetted
	 *
	 * @return - an object of type Errors in case of error(s)
	 * @return - NULL if operation was successful
	 */
    public function UnSetVariable( $name );
    
	/**
	 * Sets the variable named $name with the value $value.
	 * If a variable named $name already exists, it is replaced.
	 *
	 * $name must NOT be only numéric or it will not be saved (due to
	 * a bug in PHP's API).
	 *
	 * @param $name The name of the variable to be set.
	 * @param $value The value to be associated to variable named $name
	 *
	 */
    public function SetVariable(  $name, $value );

	/**
	 * Gets the value associated to variable named $name.
	 *
	 * @param $name The name of the variable to be get.
	 *
	 * @return - an object of type Errors in case of error(s)
	 * @return - the content of the variable named $name
	 *
	 */
    public function GetVariable( $name );
	
}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |Session.php|
                             -------------------
    début                : |09.02.2006|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Class <Session> (file Session.php) --------------
/*if (defined('SESSION_H'))
{
    return;
}
else
{

}
define('SESSION_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides an abstraction for basic PHP's sessions management.
 */
//------------------------------------------------------------------------ 

class Session extends AbstractSingleton implements Iterator, SessionInterface//, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	

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
	} //---- End of GetInstance
   
    /** 
	 * Destructs the sessions and all informations relatives to this session
	 */
    public function Destruct( )
    {
		session_destroy ( );
		
		unset ( $_SESSION );
		$_SESSION = array();
    } //---- End of Destruct 
	
	/**
	 * Gets the session id.
	 *
	 * @return The id of the session
	 */
    public function GetId( )
    {
		return session_id ( );
    } //---- End of GetId 
   
	/**
	 * Sets the session id.
	 *
	 * This function must be call before the first call of GetInstance().
	 *
	 * @param $id the id to be set.
	 *
	 */
    public static function SetId( $id )
    {
		session_id ( $id );
    } //---- End of SetId

	/**
	 * Checks whether the varaiable named $name exists or not.
	 *
	 * @param $name The name of the variable to check for
	 *
	 * @return - True if a variable named $name exists
	 * @return - False otherwise
	 */
    public function IsSetVariable( $name )
    {
		return isset( $_SESSION [ $name ] );
    } //---- End of IsSetVariable 
	
	/**
	 * Unsets the variable named $name.
	 *
	 * @param $name The name of the variable to be unsetted
	 *
	 * @return - an object of type Errors in case of error(s)
	 * @return - NULL if operation was successful
	 */
    public function UnSetVariable( $name )
    {
		if ( ! $this->IsSetVariable ( $name ) )
		{
			$errors = new Errors();
			$errors->Add ( new SessionError ( SessionError::SESSION_VARIABLE_NOT_SET, 'Impossible de détruire une variable non mise en place.' ) ) ;
			
			return $errors;
		}
		else
		{
			unset ( $_SESSION [ $name ] );
			
			return NULL;
		}
    } //---- End of UnSetVariable 

    
	/**
	 * Sets the variable named $name with the value $value.
	 * If a variable named $name already exists, it is replaced.
	 *
	 * $name must NOT be only numéric or it will not be saved (due to
	 * a bug in PHP's API).
	 *
	 * @param $name The name of the variable to be set.
	 * @param $value The value to be associated to variable named $name
	 *
	 */
    public function SetVariable(  $name, $value )
    {	
		$_SESSION [ $name ] = $value;
    } //---- End of SetVariable

	/**
	 * Gets the value associated to variable named $name.
	 *
	 * @param $name The name of the variable to be get.
	 *
	 * @return - an object of type Errors in case of error(s)
	 * @return - the content of the variable named $name
	 *
	 */
    public function GetVariable( $name )
    {
		if ( ! $this->IsSetVariable ( $name ) )
		{
			$errors = new Errors();
			$errors->Add ( new SessionError ( SessionError::SESSION_VARIABLE_NOT_SET, 'Impossible d\'obtenir une variable non mise en place.' ) ) ;
			
			return $errors;
		}
		else
		{
			return ( $_SESSION [ $name ] );
		}
    } //---- End of GetVariable

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset( $_SESSION );
        
        $_SESSION = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $_SESSION );
    } //---- End of GetCount
    
//--------------------------------------------- Iterator's Implémentation
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $_SESSION );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $_SESSION );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return Key ( $_SESSION );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $_SESSION );
    } //---- End of Next
    
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    public function Valid( )
    {
        return Session::current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implémentation

//-------------------------------------------- Constructeurs - destructeur
	/**
	 * Instanciates a Session object.
	 *
	 * Instianciation must happen before any print out to the screen.
	 *
	 * It will try to determine if a session is active and will work with
	 * if found.
	 *
	 * If no active session has ben found, a new session will be created
	 * with an unique id.
	 *
	 * @see http://fr.php.net/manual/en/function.session-start.php
	 *
	 */
    protected function __construct( $sessId = '', $sessName = '' )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Session.
	//Si $sessId est fourni, celui-ci servira d'identifiant de session
	//Dans le cas contraire, l'identifiant sera celui récupéré via Cookie, 
	//Get ou Post.
	//Enfin, si aucun n'est récupéré, celui-ci sera généré.
	//
	//Si $sessName est fournit, celui est modifie le nom de la session.
	//
    // Contrat :
    //- l'instanciation doit s'effectuer avant toute sortie à l'écran aEnd of 
	//que les entetes cookie soient correctement envoyées.
	//- $sessName doit etre alphanumerique sinon le nom ne sera pas changé
    {
		// nom de session
		if ( ereg ( '[a-zA-Z0-9]+', $sessName ) )
		{
			session_name ( $sessName );
		}

		// start session
    	session_start( );
    } //---- End of constructeur

	/**
	 * Destructs ressources allocated
	 *
	 * Does not destruct the session, just the Session object.
	 */
    public function __destruct ( )
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    function __ToString ( )
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |BDDError.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <BDDError> (file BDDError.php) --------------
/*if (defined('BDDERROR_H'))
{
    return;
}
else
{

}
define('BDDERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Database's Errors.
 */
//------------------------------------------------------------------------ 

class BDDError extends Error
{
//----------------------------------------------------------------- PUBLIC
	/** Connection is currently not closed */
    const CONNECTION_NOT_CLOSED = 'CONNECTION_NOT_CLOSED';
	
	/** Connection is currently closed */
    const CONNECTION_CLOSED = 'CONNECTION_CLOSED';
	
	/** Connection is already opened */
    const CONNECTION_ALREADY_OPENED = 'CONNECTION_ALREADY_OPENED';
	
	/** Connection cannot be made */
    const CONNECTION_CANNOT_OPEN = 'CONNECTION_CANNOT_OPEN';
	
	/** Database cannot be changed for current connection */
    const CONNECTION_CANNOT_CHANGE_DB = 'CONNECTION_CANNOT_CHANGE_DB';
	
	/** Query failed */
    const CONNECTION_QUERY_FAILED = 'CONNECTION_QUERY_FAILED';
	
	/** Requested table does not exists in database */
    const CONNECTION_TABLE_INEXISTANT = 'CONNECTION_TABLE_INEXISTANT';
	
	/** Requested field does not exists in table */
    const CONNECTION_COLUMN_INEXISTANT = 'CONNECTION_COLUMN_INEXISTANT';
	
	/**
	 * TableClass given does not implement valid interface or does not
	 * herit from BDDTable
	*/
	const TABLE_CLASS_INCORRECT = 'TABLE_CLASS_INCORRECT';
	
	/** BDDRecord is not valid */
	const RECORD_NOT_VALID = 'RECORD_NOT_VALID';
	
	/** Cannot update an inexistant record */
	const RECORD_UPDATE_DOESNT_EXIST = 'RECORD_UPDATE_DOESNT_EXIST';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |BDDRecord.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <BDDRecord> (file BDDRecord.php) --------------
/*if (defined('BDDRECORD_H'))
{
    return;
}
else
{

}
define('BDDRECORD_H',1);*/


//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * This class is a generic BDD Row and it provides basic methods to act on
 * it.
 */
//------------------------------------------------------------------------ 

class BDDRecord extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    /**
	 * Checks if the BDDRecord is ready to be saved into DataBase.
	 * Uses the method Validate() to make the racord valid.
     *
     * @return - true if record is ready to be saved
	 * @return - false otherwise
     *
     */
    public function IsValid (  )
	{
		return true;
	} //----- End of IsValid
	
    /**
	 * Tries to validate the BDDRecord in order to save it into DataBase.
     *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s)
     *
     */
    public function Validate (  )
    {
		$this->isValid = true;
	
		return NULL;
	} //----- End of Validate
	
    /**
	 * Checks if the property $propertyName exists into the BDDRecord.
     *
	 * @param $propertyName the property name to check
	 *
     * @return - true if the property exists
	 * @return - false otherwise
     *
     */
    public function PropertyExists( $propertyName )
    {
		return ( isset ( $this->row[ $propertyName ] ) );
    } //----- End of PropertyExists
	
    /**
	 * Returns the value associated to property $propertyName.
     *
	 * @param $propertyName the property name to get value
	 *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s) :
	 * @return 		BDDError::CONNECTION_COLUMN_INEXISTANT if property doesn't exist.
     *
     */
    public function GetProperty( $propertyName )
    {
		if ( $this->PropertyExists( $propertyName ) )
		{
			return $this->row [ $propertyName ];
		}
		else
		{
			$errs = new Errors ( );
			
			$errs->Add ( new BDDError ( BDDError::CONNECTION_COLUMN_INEXISTANT , 'Property '.$propertyName.' does not exist.' ) );
			
			return $errs;
		}
    } //----- End of GetProperty
	
    /**
	 * Sets the property named $propertyName with value $propertyValue.
	 * If property doesn't exists, it is created.
     *
	 * @param $propertyName the property name to set value
	 * @param $propertyValue value to associate to property
     *
     */
    public function SetProperty( $propertyName , $propertyValue )
    {
		$this->row [ $propertyName ] = $propertyValue;
		
		$this->isValid = false;
    } //----- End of SetProperty
	
    /**
	 * Gets the number of properties of the object.
     *
	 * @return the number of properties of the object
     *
     */
	public function GetPropertyCount ( )
	{
			return count ( $this->row );
	} //----- End of GetPropertyCount
	
//------------------------------------------- Implementation's of Iterator
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->row );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $this->row );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return key( $this->row );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->row );
    } //---- End of Next
    
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    public function Valid( )
    {
        return $this->current( ) !== false;
    } //---- End of Valid
//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises BDDRecord from an array $row.
	 * Sets IsValid to false.
	 *
	 * @param $row a database row array
	 *
     */
    function __construct( $row = NULL )
    {
		parent::__construct();
		
		if ( is_array( $row ) )
		{
			$this->row = $row;
		}
		else
		{
			$this->row = array();
		}
		
		$this->isValid = false;
    } //---- End of constructor
	
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
    function __ToString ( )	 
    {
        return (String)var_export( $this->row );
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	/** Array of data : database row */
    protected $row;
	
	/**
	 * validation flag : contains true of false whether it has been 
	 * validated or not.
	 */
	protected $isValid;
}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |BDDRecordSet.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <BDDRecordSet> (file BDDRecordSet.php) --------------
/*if (defined('BDDRECORDSET_H'))
{
    return;
}
else
{

}
define('BDDRECORDSET_H',1);*/


//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Basic Iterator for BDDRecord-s
 */
//------------------------------------------------------------------------ 

class BDDRecordSet extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    /**
	 * Adds a BDDRecord to the Iterator.
     *
     * @param $item the BDDRecord to add
     *
     */
    public function Add( BDDRecord & $item )
    {
        $this->items[ ] = $item;
    } //---- End of Add

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset($this->items);
        
        $this->items = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $this->items );
    } //---- End of GetCount
    
//---------------------------------------------- Iterator's Implementation
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->items );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return @current( $this->items );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return key( $this->items );
    } //---- End of  Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->items );
    } //---- End of  Next
    
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    public function Valid( )
    {
        return $this->current( ) !== false;
    } //---- End of  Valid
//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises BDDRecordSet.
	 *
     */
    function __construct( )
    {
		parent::__construct();
		
		$this->items = array();
    } //---- End of constructor
	
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
    function __ToString ( )
    {
        return $this->GetCount().' entrées'.var_dump($this->items);
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	/** Array of items : BDDRecord-s */
    protected $items;
}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |BDDConnectionInterface.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Interface <MySQLConnection> (file BDDConnectionInterface.php) --------------
/*if (defined('BDDCONNECTIONINTERFACE_H'))
{
    return;
}
else
{

}
define('BDDCONNECTIONINTERFACE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides basic methods for connection/queries on an abstract database
 */
//------------------------------------------------------------------------ 

interface BDDConnectionInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
    
    /**
	 * Searchs for table named $table in database.
	 * Connection may be opened.
	 *
	 * @param $table the tablename to be checked
     *
     * @return - true if table exists
	 * @return - an Errors object in case of error(s)
     *
     */
	public function TableExists ( $table );
    
	/**
	 * Gets the description of the table named $table
	 *
	 * @param $table the name of the table to be describe
	 *
     * @return - a BDDRecordSet if table exists wich BDDRecord s describe a field of the table
	 * @return - an Errors object in case of error(s)
	 */
	public function TableDescription ( $table );
    
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
    public function SetServer ( $server );
    
    /**
     * Gets host address for connection.
     *
     * @return the host address
     *
     */
    public function GetServer ( );
    
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
    public function SetUsername ( $username );
    
    /**
     * Gets the login used for connection.
     *
     * @return the login used
     *
     */
    public function GetUsername ( );
    
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
    public function SetPassword ( $password );
    
    /**
     * Gets the password associated to the login used for connection.
     *
     * @return the password used
     *
     */
    public function GetPassword ( );
    
	/**
	 * Try to open connection.
	 *
	 * @param $isPersistent specifies if connection may be persistent or not = { CONNECTION_PERSISTENT | CONNECTION_NOT_PERSISTENT }
	 *
	 *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
	 *
	 */
    public function Open( $isPersistent );
    
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
    public function SetDatabase( $database );
    
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
    public function Query( $query );
    
    /**
     * Gets the number of queries that has been successfully sent.
     *
     * @return the number of queries sent from the creation of the object
     *
     */
    public function GetQueriesCount ( );
    
    /**
     * Tries to close the connection
     *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
     *
     */
    public function Close( );
    
    /**
     * Checks whether connection is opened or closed
     *
     * @return - true if connection is active
     * @return - false if connection is closed
     *
     */
    public function isConnected ( );
    
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |BDDTableInterface.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Interface <BDDTableInterface> (file BDDTableInterface.php) --------------
/*if (defined('BDDTABLEINTERFACE_H'))
{
    return;
}
else
{

}
define('BDDTABLEINTERFACE_H',1);*/


//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Interface that provides generic methods for Database Tables
 */
//------------------------------------------------------------------------ 

interface BDDTableInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
    
	/**
	 * Computes a selection of $fields on entries that correspond to 
	 * $options
     *
     * @param $fields array of string that reprensents fields' name to select
	 * @param $options string that contains various select options like 
	 * "where", "order", "limit", ...
     *
	 * @return - a BDDRecordSet that contains BDDRecord-s ( Database entries)
	 * if select was successful
	 * @return - an Errors object in case of error(s) : see BDDConnectionInterface::Query 
	 *
     */
    abstract public function Select ( $fields, $options );
	
	/**
	 * Tries to insert the given $record into database
	 *
	 * @param $record BDDRecord to be inserted
	 *
	 * @return - see BDDConnectionInterface::Query 
	 *
     */
    abstract public function Insert ( BDDRecord $record );
	
	/**
	 * Tries to update with the given $updatedRec into database in function
	 * of $clause parameter.
	 *
	 * @param $updatedRec the BDDRecord updated
	 * @param $clause clause constructed in Data Manipulation Language (eg. SQL)
	 * to determine which record has to be updated
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    abstract public function Update ( BDDRecord $updatedRec, $clause );
	
	/**
	 * Tries to delete entries that correpond to $clauses
	 *
	 * @param $clauses clauses constructed in Data Manipulation Language (eg. SQL)
	 * to determine which records have to be deleted
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    abstract public function Delete ( $clauses );
	
	/**
	 * Tries to delete all entries of the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    abstract public function Clear (  );
	
	/**
	 * Tries to drop the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    abstract public function Drop (  );

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



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
		return parrent::__ToString();
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



/*************************************************************************
                           |BDDTable.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <BDDTable> (file BDDTable.php) --------------
/*if (defined('BDDTABLE_H'))
{
    return;
}
else
{

}
define('BDDTABLE_H',1);*/


//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Abstract class that provides generic methods for Database Tables
 */
//------------------------------------------------------------------------ 

abstract class BDDTable extends AbstractClass implements BDDTableInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
    
	/*
	 * Computes a selection of $fields on entries that correspond to 
	 * $options
     *
     * @param $fields array of string that reprensents fields' name to select
	 * @param $options string that contains various select options like 
	 * "where", "order", "limit", ...
     *
	 * @return - a BDDRecordSet that contains BDDRecord-s ( Database entries)
	 * if select was successful
	 * @return - an Errors object in case of error(s) : see BDDConnectionInterface::Query 
	 *
     */
    //public function Select ( $fields, $options );

	
	/*
	 * Tries to insert the given $record into database
	 *
	 * @param $record BDDRecord to be inserted
	 *
	 * @return - see BDDConnectionInterface::Query 
	 *
     */
    //public function Insert ( BDDRecord $record );
	
	/*
	 * Tries to update with the given $updatedRec into database in function
	 * of $clause parameter.
	 *
	 * @param $updatedRec the BDDRecord updated
	 * @param $clause clause constructed in Data Manipulation Language (eg. SQL)
	 * to determine which record has to be updated
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    //public function Update ( BDDRecord $updatedRec, $clause );
	
	/*
	 * Tries to delete entries that correpond to $clauses
	 *
	 * @param $clauses clauses constructed in Data Manipulation Language (eg. SQL)
	 * to determine which records have to be deleted
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    //public function Delete ( $clauses );
	
	/*
	 * Tries to delete all entries of the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    //public function Clear (  );
	
	/*
	 * Tries to drop the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
     */
    //public function Drop (  );
	
	/**
	 * Escape the given $value for a secured insert/update into database.
	 *
	 * @param $value The value to be escaped
	 *
	 * @return the escaped string
	 *
     */
    abstract public function EscapeValue ( $value );

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises BDDTable for the table named $table on the given 
	 * $connection.
	 *
	 * @param $table name of the table
	 * @param $connection BDDConnection for all table operations. This must
	 * be a valid and connected BDDConnection unless it will cause an Error.
	 * @param $errors reference to an Errors object. It will be set if an
	 * error occurs during instanciation. If operation was successful, it
	 * equals NULL
	 *
     */
    public function __construct( $table, BDDConnection $connection, & $errors )
    {
		parent::__construct();
	
		$errors = NULL;
		
    	if ( ! $connection->isConnected ( ) )
		{
			$errors = new Errors();
			$errors->Add( new BDDError( BDDError::CONNECTION_CLOSED, 'Connexion close, impossible d\'instancier une Table.') );
			
			return;
		}
		
		if ( ($tabex = $connection->TableExists ( $table ) ) instanceOf Errors )
		{
			$errors = $tabex;
			
			return;
		}
		unset ( $tabex );
		
		
		$this->structure = & $connection->TableDescription ( $table );
		$this->bDDConnection = $connection;
		$this->tableName = $table;
    } //---- End of constructor
	
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
		return parrent::__ToString();
    }

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	/** Name of the current table */
	protected $tableName;
	
	/** BDDConnection object for database connection */
	protected $bDDConnection;
	
	/** contains table structure */
	protected $structure;
}

//------------------------------------------------------ other definitions



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
		return parrent::__ToString();
    }

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |MySQLTable.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <MySQLTable> (file MySQLTable.php) --------------
/*if (defined('MYSQLTABLE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides Methods and constants for operations on MySQL Tables
 */
//------------------------------------------------------------------------ 

class MySQLTable extends BDDTable
{
//----------------------------------------------------------------- PUBLIC

	/** represents the whole list of columns */
	const TABLE_COLUMN_ALL = '*';
	
	/** MySQL 'where' clause */
	const MYSQL_CLAUSE_WHERE = ' WHERE ';
	
	/** MySQL 'limit' clause */
	const MYSQL_CLAUSE_LIMIT = ' LIMIT ';
	
	/** MySQL 'and' operator */
	const MYSQL_CLAUSE_AND = ' AND ';
	
	/** MySQL 'or' operator */
	const MYSQL_CLAUSE_OR = ' OR ';
	
	/** MySQL 'order' clause */
	const MYSQL_CLAUSE_ORDER = ' ORDER BY ';
	
		/** MySQL 'order' parameter for ascending sort */
		const MYSQL_CLAUSE_ORDER_ASCENDANT = ' ASC ';
		
		/** MySQL 'order' parameter for descending sort */
		const MYSQL_CLAUSE_ORDER_DESCENDANT = ' DESC ';
	
	/** MySQL 'group by' clause */
	const MYSQL_CLAUSE_GROUP = ' GROUP BY ';
	
	/** MySQL 'having' clause */
	const MYSQL_CLAUSE_HAVING = ' HAVING ';
	
	/** MySQL regex operator */
	const MYSQL_SEEK_REGEX = ' LIKE ';
	
		/** Magic char for multichars replacement */
		const MYSQL_SEEK_MULTICHARS = '%';
		
		/** Magic char for unique char replacement */
		const MYSQL_SEEK_ANYCHAR = '_';
	
	/** MySQL equals operator */
	const MYSQL_SEEK_STRICT = ' = ';
	
	/** MySQL not equals operator */
	const MYSQL_SEEK_STRICT = ' <> ';
	
	/** MySQL separator operator */
	const MYSQL_SEEK_SEPARATOR = '"';
	
	/** MySQL field name for fields' name in table description */
	const MYSQL_STRUCTURE_FIELD_NAME = 'Field';

//--------------------------------------------------------- public methods
	
	/**
	 * Computes a selection of $fields on entries that correspond to 
	 * $options
     *
     * @param $fields array of string that reprensents fields' name to select
	 * @param $options string that contains various select options like 
	 * "where", "order", "limit", ...
     *
	 * @return - a BDDRecordSet that contains BDDRecord-s ( Database entries)
	 * if select was successful
	 * @return - an Errors object in case of error(s) : see BDDConnectionInterface::Query 
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/select.html
	 *
     */
    public function Select ( $fields, $options )
	{
		$selectQuery = 'SELECT ';
		
		if ( is_array( $fields ) ) 
		{
			foreach( $fields as $field ) 
			{
				$selectQuery .= $field;
			}
			
			$selectQuery = substr( $selectQuery, 0, -1 ) ;
		}
		else
		{
			$selectQuery .= $fields;
		}
		
		$selectQuery .= ' FROM `'.$this->tableName.'` '.$options;
		
		return $this->bDDConnection->Query ( $selectQuery ) ;
	} //---- End of Select
	
	/**
	 * Tries to insert the given $record into database
	 *
	 * @param $record BDDRecord to be inserted
	 *
	 * @return - see BDDConnectionInterface::Query 
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/insert.html
	 *
     */
    public function Insert ( BDDRecord $record )
	{
		$newRecord = $this->bDDRecordToTableRecord ( $record );
		unset( $record );
		
		$insertQuery  = 'INSERT INTO `'.$this->tableName.'` SET ';
		
		foreach ( $newRecord as $champ  => $value )
		{
			$insertQuery .= $champ.' = "'. $this->EscapeValue( $value ) .'", ';
		}
		
		$insertQuery = substr ( $insertQuery , 0 , -2 );
		
		return $this->bDDConnection->Query ( $insertQuery ) ;
	} //---- End of Insert
	
	/**
	 * Tries to update with the given $updatedRec into database in function
	 * of $clause parameter.
	 *
	 * @param $updatedRec the BDDRecord updated
	 * @param $clause clause constructed in Data Manipulation Language (eg. SQL)
	 * to determine which record has to be updated
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/update.html
	 *
     */
    public function Update ( BDDRecord $updatedRec, $clause )
	{
		$newRecord = $this->bDDRecordToTableRecord ( $updatedRec );
		unset( $updatedRec );
		
		$updateQuery  = 'UPDATE `'.$this->tableName.'` SET ';
		
		foreach ( $newRecord as $champ  => $value )
		{
			$updateQuery .= $champ.' = "'. $this->EscapeValue( $value ) .'", ';
		}
		
		$updateQuery = substr ( $updateQuery , 0 , -2 ) . $clause;
		
		return $this->bDDConnection->Query ( $updateQuery ) ;
	
	} //---- End of Update
	
	/**
	 * Tries to delete entries that correpond to $clauses
	 *
	 * @param $clauses clauses constructed in Data Manipulation Language (eg. SQL)
	 * to determine which records have to be deleted
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/delete.html
	 *
     */
    public function Delete ( $clauses )
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'` WHERE '.$clause );
	} //---- End of Delete

	/**
	 * Tries to delete all entries of the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/delete.html
	 *
     */
    public function Clear (  )
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'`' );
	} //---- End of Clear
	
	/**
	 * Tries to drop the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/drop-table.html
	 *
     */
    public function Drop (  )
	{
		return $this->bDDConnection->Query ( 'DROP TABLE `'.$this->tableName.'`' );
	} //---- End of Drop
	
	/**
	 * Escape the given $value for a secured insert/update into database.
	 *
	 * @param $value The value to be escaped
	 *
	 * @return the escaped string
	 *
     */
    public function EscapeValue ( $value )
	{
		return mysql_escape_string( $value );
	}
    
//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises MySQLTable for the table named $table on the given 
	 * $connection.
	 *
	 * @param $table name of the table
	 * @param $connection BDDConnection for all table operations. This must
	 * be a valid and connected BDDConnection unless it will cause an Error.
	 * @param $errors reference to an Errors object. It will be set if an
	 * error occurs during instanciation. If operation was successful, it
	 * equals NULL
	 *
     */
    public function __construct( $table, MySQLConnection $connection, & $errors )
	{
		parent::__construct ( $table, $connection, $errors );
	} //---- End of constructor
	
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{
		parent::__destruct();
	} //----- End of Destructor
	
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

	/**
	 * Checks into table description if the property named $property
	 * exists as a field in table
	 *
	 * @return true if property exists
	 * @return false otherwise
	 *
     */
	protected function isValidProperty ( $property )
	{
		foreach ( $this->structure as $champ )
		{
			if ( $champ->getProperty( MySQLTable::MYSQL_STRUCTURE_FIELD_NAME ) == $property )
			{
				return true;
			}
		}
		
		return false;
	} //----- End of isValidProperty
	
	/**
	 * Computes conversion from a standard BDDRecord to a safe BDDRecord
	 * for MySQL queries. It also computes an intersection between 
	 * table fields and BDDRecord properties.
	 *
	 * @return a BDDRecord ready to be saved/updated into table
	 *
     */
	protected function bDDRecordToTableRecord ( BDDRecord $record )
	{
		$tableRecord = new BDDRecord();
		
		foreach ( $record as $champ => $value ) 
		{
			if ( $this->isValidProperty( $champ ) )
			{
				$tableRecord->SetProperty ( $champ , mysql_real_escape_string ( $value, $this->bDDConnection ) );
			}
		}
		
		return $tableRecord;
	} //----- End of bDDRecordToTableRecord
//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |TemplateError.php|
                             -------------------
    start                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- class <TemplateError> (file TemplateError.php) -----------------
/*if (defined('TEMPLATEERROR_H'))
{
    return;
}
else
{

}
define('TEMPLATEERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Template's Errors.
 */
//------------------------------------------------------------------------ 

class TemplateError extends Error
{
//----------------------------------------------------------------- PUBLIC
	/** Tag does not exists */
    const TEMPLATE_TAG_INEXISTANT = 'TEMPLATE_TAG_INEXISTANT';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |Template.php|
                             -------------------
    start                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <Template> (file Template.php) -----------------
/*if (defined('TEMPLATE_H'))
{
    return;
}
else
{

}
define('TEMPLATE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * A template is an object that refers to child objects, templates also.
 * It uses a skeleton to place subTemplates.
 * By recurrent generation of content, it lets us create many documents
 * like WebPages.
 *
 * This class implements basic methods and constants for Template-s.
 */
//------------------------------------------------------------------------ 

class Template extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

	/** Char for opening Tags */
	const TAG_OPEN = '[';
	
	/** Char for closing Tags */
	const TAG_CLOSE = ']';
	
	/** new line char */
	const NEWLINE = "\n";

//--------------------------------------------------------- Public Methods

    /**
     * builds a Tag from TAG_OPEN, $tagName and TAG_CLOSE
     *
	 * @param $tagName the name of the tag to be generated
	 *
     * @return the valid tag built for $tagName with TAG_OPEN and TAG_CLOSE chars
	 */
    public static function BuildTag ( $tagName )
    {
        return self::TAG_OPEN. $tagName. self::TAG_CLOSE;
    } //----- End of BuildTag
    
    /**
     * Sets page skeleton to $skeleton.
     * the skeleton may has the [TAG] you'll set.
	 *
	 * @param $skeleton the skeleton to be set
	 *
	 */
    public function SetSkeleton ( $skeleton )
    {
        $this->skeleton = $skeleton;
    } //----- End of SetSkeleton
    
    /*public function GetSkeleton ( )
    // User's manual :
    //get the skeleton of the page.
    //
    // Returns :
    //the current skeleton of the page.
	//
    // Contrat :
    {
        return $this->skeleton;
    } //----- End of SetSkeleton*/
    
    /**
     * Assigns sub-Template $value to the tag named $tagName.
     * The skeleton you've set may contain the tag named $tag
	 *
	 * @param $tagName the name of the tag to be set
	 * @param $value the sub-Template to assign to tag
	 *
	 */
    public function SetTag ( $tagName , Template & $value )
    {
        $this->tags[ $this->BuildTag ( $tagName ) ] = $value;
    } //----- End of SetTag
    
    /**
     * Gets sub-Template assigned to tag named $tagName.
     * The skeleton you've set may contain the tag named $tag.
	 *
	 * @param $tagName the name of the tag to be gotten
	 *
	 * @return The Template object assigned to the tag named $tagName if it exists.
	 * @return TemplateError::TEMPLATE_TAG_INEXISTANT if tag named $tagName
	 * doesn't exist.
	 *
	 */
    public function GetTag ( $tagName )
    {
        if ( $this->TagExists( $tagName ) )
        {
            return $this->tags[  $this->BuildTag ( $tagName ) ];
        }
        else
        {
            $errs = new Errors ( );
            
            $errs->Add( new TemplateError( TemplateError::TEMPLATE_TAG_INEXISTANT , 'The tag named '. $tag  . ' doesn\'t exist.' ) );
            
            return $errs;
        }
    } //----- End of GetTag
    
    /**
     * Adds $value to the Template's skeleton associated to the tag named $tagName
     * The skeleton you've set may contain the tag named $tag.
	 *
	 * @param $tagName the name of the tag to be gotten for update
	 * @param $value the string to be added to skeleton of Template associated to tag
	 * named $tagName
	 *
	 * @return NULL if operation was successful
	 * @return TemplateError::TEMPLATE_TAG_INEXISTANT if tag named $tagName
	 * doesn't exist.
	 *
	 */
    public function AddToTag ( $tagName, $value )
    {
        if ( $this->TagExists( $tagName ) )
        {
			$this->GetTag ( $tagName )->skeleton .= $value;

			return null;
        }
        else
        {
            $errs = new Errors ( );
            
            $errs->Add( new TemplateError( TemplateError::TEMPLATE_TAG_INEXISTANT , 'The tag named '. $tag . ' doesn\'t exist.' ) );
            
            return $errs;
        }
    } //----- End of AddToTag
    
    /**
     * Checks if the tag named $tagName exist or not.
	 *
	 * @param $tagName the name of the tag to be checked
	 *
	 * @return true if tag exists
	 * @return false otherwise
	 *
	 */
    public function TagExists ( $tagName )
    {
        return isset ( $this->tags[ Template::BuildTag( $tagName ) ] );
    } //----- End of TagExists
    
    /**
     * Generates a printable version of object for final print out.
	 * It replaces each tag by it's Template Generated value.
	 * So it generate final document by hierarchy.
	 *
	 * @param $cached boolean that should always be false. It enables caching
	 * of generated values for future call. Due to internal generation by hierarchy,
	 * the function always call herself with $cached as true
	 *
	 * @return printable version of document
	 *
	 */
    public function Generate( $cached = false )
    {
		if ( $cached && ! empty ( $this->lastGenerated ) )
		{
			return $this->lastGenerated;
		}
	
		$generated = $this->skeleton;
		$lastGenerated = '';

		while ( $generated != $lastGenerated )
		{
			$lastGenerated = $generated;
			
			foreach ( $this->tags as $tag => $value )
			// replace tags by value, generated by subtemplates...
			{
				// generation by hierarchy
				$val = $value->Generate( true );
				$generated = str_replace ( $tag, $val, $generated );
			}
		}

		$this->lastGenerated = $generated;
		
        return $generated;
    } //----- End of Generate
    
//-------------------------------------------- Constructors - destructors
	/**
	 * instanciates a Template.
	 *
	 */
    public function __construct( )
    {
		parent::__construct();
	
        $this->tags = array();
    } //---- End of __construct
	 
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{	
		parent::__destruct();
	} //----- End of Destructor
  
//---------------------------------------------------------- Magic Methods
    /**
	 * Returns a printable version of object for final print out.
	 *
	 * @return String printable on screen
	 *
	 * @see Template::Generate()
	 * 
	 */
	public function __ToString ()
	{
		return $this->Generate ( );
	} // End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

	/** Skeleton of the page, places sub-Template-s by [tags-name] */
    protected $skeleton;
	
	/** Array of Template-s indexed by tag name */
    protected $tags;
	
	/** Template generation cache, see Generate() */
	private $lastGenerated;
}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |XHTMLTemplate.php|
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <XHTMLTemplate>  (file XHTMLTemplate.php) -----------------
/*if (defined('XHTMLTemplate_H'))
{
    return;
}
else
{

}
define('XHTMLTemplate_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Basic XHTMLTemplate.
 */
//------------------------------------------------------------------------ 

class XHTMLTemplate extends Template
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- Public Methods

//---------------------------------------------- Constructors - destructor
	/**
	 * instanciates a Template.
	 *
	 */
    public function __construct( )
    {
		parent::__construct();
    } //---- End of __construct
	 
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{	
		parent::__destruct();
	} //----- End of Destructor
  
//---------------------------------------------------------- Magic Methods
    /**
	 * Returns a printable version of object for final print out.
	 *
	 * @return String printable on screen
	 *
	 * @see Template::Generate()
	 * 
	 */
	public function __ToString ()
	{
		return $this->Generate ( );
	} // End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |XHTMLBodyTemplate.php|
                             -------------------
    start                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <XHTMLBodyTemplate> (file XHTMLBodyTemplate.php) -----------------
/*if (defined('XHTMLBODYTEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLBODYTEMPLATE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * XHTMLTemplate extention. Representents the Body tag of an XHTMLPage
 * with its contents and its parameters.
 */
//------------------------------------------------------------------------ 

class XHTMLBodyTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	/** Page Content Tag Name */
	const TAG_CONTENT = 'CONTENT';
	
	/** Param Page Body Tag Name */
	const TAG_PARAMS = 'PARAMS';

//--------------------------------------------------------- Public Methods
	
    /**
     * Adds raw XHTML $content to the current content of the body.
	 * Content of the page is value associated to the tag named TAG_CONTENT.
	 *
	 * Raw XHML $content may be valid.
     *
	 * @param $content the raw XHTML to be added
	 *
	 */
    public function AddContent ( $content )
    {
		$this->AddToTag ( self::TAG_CONTENT, $content );
    } //----- End of AddContent
	
    /**
     * Sets raw XHTML $content as the current content of the body.
	 * Content of the page is value associated to the tag named TAG_CONTENT.
	 *
	 * Raw XHML $content may be valid.
     *
	 * @param $content the raw XHTML to be set
	 *
	 */
    public function SetContent ( $content )
    {
		$temp = new Template ();
		$temp->SetSkeleton ( $content );
		
        $this->SetTag ( self::TAG_CONTENT, $temp );
    } //----- End of SetContent
	
    /**
     * Adds raw XHTML $params to the current parameters of the body XHTML tag.
	 * Parameters of the body tag is value associated to the tag named TAG_PARAMS.
	 *
	 * Raw XHML $params may be valid.
     *
	 * @param $params the raw XHTML to be added
	 *
	 */
    public function AddParams ( $params )
    {
		$this->AddToTag ( self::TAG_PARAMS, $params );
    } //----- End of AddParams
	
    /**
     * Sets raw XHTML $params as the current parameters of the body XHTML tag.
	 * Parameters of the body tag is value associated to the tag named TAG_PARAMS.
	 *
	 * Raw XHML $params may be valid.
     *
	 * @param $params the raw XHTML to be set
	 *
	 */
    public function SetParams ( $params )
    {
		$temp = new Template ();
		$temp->SetSkeleton ( $content );
		
        $this->SetTag ( self::TAG_PARAMS, $temp );
    } //----- End of SetParams

//---------------------------------------------- Constructors - destructor
	/**
	 * instanciates a XHTMLBodyTemplate.
	 * Sets a default skeleton and initialises XHTMLTemplates for tags
	 * named TAG_CONTENT and TAG_PARAMS
	 *
	 */
	function __construct () 
	{
		parent::__construct();
		
		$this->SetSkeleton(
'<body '. Template::BuildTag( self::TAG_PARAMS ) .'>
'. Template::BuildTag( self::TAG_CONTENT ).'
</body>');

		$this->SetTag ( self::TAG_CONTENT, new XHTMLTemplate() ); 
		$this->SetTag ( self::TAG_PARAMS, new XHTMLTemplate() ); 

	} //---- End of __construct
	 
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{	
		parent::__destruct();
	} //----- End of Destructor
  
//---------------------------------------------------------- Magic Methods
    /**
	 * Returns a printable version of object for final print out.
	 *
	 * @return String printable on screen
	 *
	 * @see Template::Generate()
	 * 
	 */
	public function __ToString ()
	{
		return $this->Generate ( );
	} // End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |XHTMLTemplate.php|
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <XHTMLTemplate>  (file XHTMLTemplate.php) -----------------
/*if (defined('XHTMLTemplate_H'))
{
    return;
}
else
{

}
define('XHTMLTemplate_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Basic XHTMLHeaderTemplate.
 */
//------------------------------------------------------------------------ 

class XHTMLHeaderTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- Public Methods

//---------------------------------------------- Constructors - destructor
    public function __construct( )
	/**
	 * instanciates a Template.
	 *
	 */
    {
		parent::__construct();
    } //---- End of __construct
	 
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{	
		parent::__destruct();
	} //----- End of Destructor
  
//---------------------------------------------------------- Magic Methods
	public function __ToString ()
    /**
	 * Returns a printable version of object for final print out.
	 *
	 * @return String printable on screen
	 *
	 * @see Template::Generate()
	 * 
	 */
	{
		return $this->Generate ( );
	} // End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |XHTMLHeadersTemplate.php|
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <XHTMLHeadersTemplate> (file XHTMLHeadersTemplate.php) -----------------
/*if (defined('XHTMLHEADERSTEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLHEADERSTEMPLATE_H',1);*/

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * XHTMLTemplate extention. Representents the Headers tag of an XHTMLPage.
 * Headers are managed with raw XHTML for more simplicity.
 */
//------------------------------------------------------------------------ 

class XHTMLHeadersTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	/** Headers Content Tag Name */
	const TAG_HEADERS = 'HEADERS';

//--------------------------------------------------------- Public Methods
	
	/**
     * Adds XHTML $header to the current headers.
	 * Headers of the heads is value associated to the tag TAG_HEADERS.
	 *
	 * It automatiquely adds a NEWLINE to the $headers.
	 *
	 * Be careful that added headers are not modifiable cause this function
	 * calls its Generate() member!
	 *
	 * @param $header The XHTML header to be added.
	 */
    public function AddHeader ( XHTMLHeaderTemplate $header )
    {
		$this->AddToTag ( self::TAG_HEADERS, $header->Generate() . self::NEWLINE );
    } //----- End of AddHeaders
	
	/**
     * Adds raw XHTML $headers to the current headers.
	 * Headers of the heads is value associated to the tag TAG_HEADERS.
	 *
	 * It automatiquely adds a NEWLINE to the $headers.
	 *
	 * Raw XHTML may be correct.
	 *
	 * @param $headers The raw XHTML header(s) to be added.
	 */
    public function AddRawHeaders ( $headers )
    {
		$this->AddToTag ( self::TAG_HEADERS, $headers . self::NEWLINE );
    } //----- End of AddHeaders
	
	/**
     * Sets raw XHTML $headers as the current headers.
	 * Headers of the heads is value associated to the tag TAG_HEADERS.
	 *
	 * Raw XHTML may be correct.
	 *
	 * @param $headers The raw XHTML header(s) to be set.
	 */
    public function SetRawHeaders ( $headers )
    {
		$temp = new Template ();
		$temp->SetSkeleton ( $headers );
		
        $this->SetTag ( self::TAG_HEADERS, $temp );
    } //----- End of SetHeaders

//-------------------------------------------- Constructeurs - destructeur
	/**
	 * instanciates a XHTMLHeadersTemplate.
	 * Sets a default skeleton for head tag.
	 * Initialises XHTMLTemplate for the raw headers.
	 *
	 */
	function __construct () 
	{
		parent::__construct();
		
		$this->SetSkeleton ( 
'<head>

'. Template::BuildTag( self::TAG_HEADERS ) .'
</head>'	);

		$this->SetTag ( self::TAG_HEADERS, new XHTMLTemplate() ); 

	} //---- End of __construct
	 
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{	
		parent::__destruct();
	} //----- End of Destructor
  
//---------------------------------------------------------- Magic Methods
    /**
	 * Returns a printable version of object for final print out.
	 *
	 * @return String printable on screen
	 *
	 * @see Template::Generate()
	 * 
	 */
	public function __ToString ()
	{
		return $this->Generate ( );
	} // End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |XHTMLPageTemplate.php|
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <XHTMLPageTemplate> (file XHTMLPageTemplate.php) -----------------
/*if (defined('XHTMLPAGETEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLPAGETEMPLATE_H',1);*/

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * XHTMLTemplate extention. Representents a XHTML Page with its body and
 * its headers.
 */
//------------------------------------------------------------------------ 

class XHTMLPageTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	
	/** Page Body Tag Name */
	const TAG_BODY = 'BODY';
	
	/** Page Headers Tag Name */
	const TAG_HEADERS = 'HEAD';

//--------------------------------------------------------- Public Methods
    
    /**
     * Converts $source string into valid SGML string char by char.
	 *
	 * @param $source The source string to be converted
	 *
	 * @return the valid SGML string that correspond to $source string
	 *
	 */
    public static function ConvertIntoSGML( $source )
    {
        $newString = '';
        
        for($i = 0; $i < strlen($source); $i++) {
            $o = ord($source{$i});
            
            $newString .= (($o > 127)?'&#'.$o.';':$source{$i});
        }
        
        return $newString;
    } //----- End of ConvertIntoSGML
	
    /**
     * Gets the XHTMLHeadersTemplate that corresponds to body tag named 
	 * TAG_BODY.
	 *
	 * @return the XHTMLHeadersTemplate object that corresponds to head 
	 * tag named TAG_HEADERS.
	 *
	 */
    public function GetBody ( )
    {
        return $this->GetTag ( self::TAG_BODY );
    } //----- End of GetBody
	
    /**
     * Gets the XHTMLHeadersTemplate that corresponds to TAG_HEADERS tag of the page.
	 *
	 * @return the XHTMLHeadersTemplate object that corresponds to TAG_HEADERS tag of the page.
	 *
	 */
    public function GetHeaders ( )
    {
        return $this->GetTag ( self::TAG_HEADERS );
    } //----- End of GetHeaders

	
    /**
     * Generates a printable version of object for final print out.
	 * It replaces each tag by it's Template Generated value.
	 * So it generate final document by hierarchy.
	 *
	 * The final document's characters are converted into valid SGML ones.
	 *
	 * @return printable version of document with valid SGML characters.
	 *
	 * @see Template::Generate()
	 * @see XHTMLPageTemplate::ConvertIntoSGML();
	 *
	 */
	public function Generate ( )
	{
		return self::ConvertIntoSGML ( parent::Generate() );
	} //------ End of Generate

//-------------------------------------------- Constructeurs - destructeur
	/**
	 * instanciates a XHTMLPageTemplate.
	 * Sets a default skeleton for valid XHTML1.1.
	 * Initialises XHTMLBodyTemplate for the body tag named TAG_BODY
	 * Initialises XHTMLHeadersTemplate for the head tag named TAG_HEADERS
	 *
	 */
	function __construct () 
	{
		parent::__construct();

		//default skeleton for XHTML1.1
		$this->SetSkeleton ( 
'<?xml version="1.1" encoding="iso-8859-1" standalone="no" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	
<!-- Start of XHTML Page -->
<html>

<!-- Start of Headers -->
'. Template::BuildTag( self::TAG_HEADERS ) .'
<!-- End of Headers -->

<!-- Start of Body -->
'. Template::BuildTag( self::TAG_BODY ) .'
<!-- End of Body -->

</html>
<!-- End of XHTML Page -->' );
		
		
		$this->SetTag ( self::TAG_BODY, new XHTMLBodyTemplate() );
		$this->SetTag ( self::TAG_HEADERS, new XHTMLHeadersTemplate() );
	} //---- End of __construct
	 
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{	
		parent::__destruct();
	} //----- End of Destructor
  
//---------------------------------------------------------- Magic Methods
    /**
	 * Returns a printable version of object for final print out.
	 *
	 * @return String printable on screen
	 *
	 * @see Template::Generate()
	 * 
	 */
	public function __ToString ()
	{
		return $this->Generate ( );
	} // End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |XHTMLSitePage.php|
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <XHTMLSitePage> (file XHTMLSitePage.php) -----------------
/*if (defined('XHTMLSITEPAGE_H'))
{
    return;
}
else
{

}
define('XHTMLSITEPAGE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * XHTML extension of AbstractSitePage. Provides context for XHTML Web 
 * Pages.
 */
//------------------------------------------------------------------------ 

class XHTMLSitePage extends AbstractSitePage
{
//----------------------------------------------------------------- PUBLIC
	/**
	 * Page Execution Tag Name : the name of tag which will display
	 * the Page's execution time.
	 */
	const TAG_EXECUTION_TIME = 'EXECTIME';

//--------------------------------------------------------- Public Methods
	
	/**
	 * Gets the Template object of the class
	 *	 
	 * @return the main Template object of the class
	 */
	public function GetTemplate()
	{
		return $this->pageTemplate; /* comming from parent class */
	} //---- End of GetTemplate

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
	 * callback function to be called by Application on ApplicationStart.
	 * Initializes the page with an XHTMLPageTemplate.
	 *
	 * @see Application class
	 *
	 */
    public function OnLoad ( )
	{
		$this->pageTemplate = new XHTMLPageTemplate () ;	
	} //---- End of OnLoad
	
	/**
	 * Function called after OnLoad and before OnUnLoad.
	 * Here is all the process of the page.
	 *
	 */
    public function Process ( )
	{
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
		$exectime = new Template();
		$exectime->SetSkeleton ( round( microtime(true) - $applicationVars[ Application::SYSTEM_START_TIME ], 4 ) );

		$this->pageTemplate->GetBody()->SetTag( self::TAG_EXECUTION_TIME, $exectime );
			
		echo $this->pageTemplate;
	} //---- End of OnUnLoad

//---------------------------------------------- Constructors - destructor
	/**
	 * instanciates an XHTMLSitePage.
	 *
	 */
    protected function __construct()
    {
		parent::__construct();
    } //---- End of __construct
	 
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
		return parrent::__ToString();
    } //----- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties
	/** The XHTMLPageTemplate */
	protected $pageTemplate;
}

//----------------------------------------------------- Others definitions



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
		return parrent::__ToString();
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



/*************************************************************************
                           |GroupError.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <GroupError> (file GroupError.php) --------------
/*if (defined('GROUPERROR_H'))
{
    return;
}
else
{

}
define('GROUPERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Group's Errors.
 */
//------------------------------------------------------------------------ 

class GroupError extends Error
{
//----------------------------------------------------------------- PUBLIC
	/**
	 * Requested Group has not been loaded from database or does not
	 * exist
	 */
    const GROUP_NOT_LOADED = 'GROUP_NOT_LOADED';

	/** Requested Group has a non valid idSite referrent */
    const GROUP_IDSITE_INEXISTANT = 'GROUP_IDSITE_INEXISTANT';
	
	/** The Group has a an empty name */
	const GROUP_NAME_EMPTY = 'GROUP_NAME_EMPTY';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |TableGroupInterface.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Interface <TableGroupInterface> (file TableGroupInterface.php) --------------
/*if (defined('TABLEGROUPINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEGROUPINTERFACE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for TableGroup management for any databases.
 */
//------------------------------------------------------------------------ 

interface TableGroupInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

	/**
	 * Updates validated items in $groups in function of its idGroup.
	 * If idGroup doesn't exist, item is inserted.
	 * If an item of $groups hasn't been validate, it is skipped.
	 *
	 * @param $groups a Groups of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
    public function SaveGroups ( Groups $groups );
	/**
	 * Selects all the Group-s from Table.
     *
     * @return - a list of Group-s in a Groups object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectGroups (); 
	
	/**
	 * Selects the Group from table which TableGroup::TABLE_COLUMN_IDGROUP
	 * equals to $idGroup.
     *
	 * @param $idGroup the id of the Group to select
	 *
     * @return - the Group which TableGroup::TABLE_COLUMN_IDGROUP equals to
	 * $idGroup in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectGroupByIdGroup ( $idGroup );
	

	/**
	 * Selects the Group-s from table which TableGroup::TABLE_COLUMN_IDSITE
	 * equals to $idSite. In other words : Group-s that belong to the site of 
	 * id $idSite
     *
	 * @param $idSite the id of the Site the Group may belong
	 *
     * @return - A Groups of Group-s which TableGroup::TABLE_COLUMN_IDSITE 
	 * equals to $idSite in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectGroupsByIdSite ( $idSite );
	 
	/**
	 * Selects the Group-s from table which TableGroup::TABLE_COLUMN_NAME
	 * looks like $groupName.
     *
	 * @param $groupName the name of the Group to select. It can contain
	 * magic chars like BDD_SEEK_MULTICHARS and BDD_SEEK_ANYCHAR where BDD
	 * represent your database type. Please refer to your database documentation.
	 *
     * @return - a Groups object : the Group-s which 
	 * TableGroup::TABLE_COLUMN_NAME looks like $groupName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function FindGroupsByName ( $groupName );
	
	/**
	 * Tries to update the given group $updatedGroup in function of its
	 * property TableGroup::TABLE_COLUMN_IDGROUP.
	 *
	 * @param $updatedGroup The Group to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */	
	public function UpdateGroupByIdGroup ( Group $updatedGroup );
	
	
	/**
	 * Inserts the given Group $group into the table.
	 *
	 * @param $group The Group to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertGroup ( Group $group );
	
	/**
	 * Checks whether the Group of id $idGroup exists or not.
	 *
	 * @param $idGroup The TableGroup::TABLE_COLUMN_IDGROUP of the group 
	 * to be checked.
	 *
	 * @return - true if group exists
	 * @return - false otherwise
     *
     */
	public function IdGroupExists ( $idGroup );
    
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |Group.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Classe <Group> (file Group.php) --------------
/*if (defined('GROUP_H'))
{
    return;
}
else
{

}
define('GROUP_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Group table entries
 */
//------------------------------------------------------------------------ 

class Group extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    /**
	 * Tries to validate the Site in order to save it into DataBase.
     *
	 * @param $siteTable a BDDTableSite object (where BDD should be
	 * replaced by your current Database : eg. MySQLTableSite). A valid 
	 * BDDTableSite implements TableSiteInterface
	 *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return GroupError::GROUP_NAME_EMPTY if property 
	 * TableGroup::TABLE_COLUMN_NAME is empty
	 *
	 * @return BDDError::TABLE_CLASS_INCORRECT if $groupTable is not a 
	 * valid instance
     *
	 * @return GroupError::GROUP_IDSITE_INEXISTANT if property 
	 * TableSite::TABLE_COLUMN_IDSITE refers to a non existant site
	 *
     */
    public function Validate ( $siteTable )
	{
		$errors = new Errors ();
	
		// login
			if ( empty( $this->row[ TableGroup::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new GroupError ( GroupError::GROUP_NAME_EMPTY, 'Please fill in group name.') );
			}
	
		// referent IdSite
			if ( ! @in_array( 'TableSiteInterface', class_implements ( $siteTable ) ) )
			{
				$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Parameter is not a valid instance of BDDTableSite' ) );
			} 
			else
			{
				if ( ! $siteTable->IdSiteExists( $this->row[ TableSite::TABLE_COLUMN_IDSITE ]  ) )
				{
					$errors->Add ( new GroupError ( GroupError::GROUP_IDSITE_INEXISTANT, 'Group does not refer to any site.') );
				}
			}
			
		// result
		if ( $errors->GetCount() == 0 )
		{
			$this->isValid = true;
			return NULL;		
		}
		
		
		$this->isValid = false;
		return $errors;
	} //----- End of Validate

//---------------------------------------------- Constructors - destructor

    /**
	 * Initialises Site from the BDDRecord $newRec.
	 * If $newRec is NULL, Group is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
    function __construct( BDDRecord $newRec )
    {
		parent::__construct( NULL );
	
		// initialization
		$this->SetProperty ( TableGroup::TABLE_COLUMN_IDGROUP , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_NAME , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_OVERRIDE , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_IDSITE , '' );

		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] );
			// php hack to access protected property $newRec->row
		}
		
		$this->isValid = false;
    } //---- End of constructor
	
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
	 */
    function __ToString ( )
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |Groups.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Groups> (file Groups.php) --------------
/*if (defined('GROUPS_H'))
{
    return;
}
else
{

}
define('GROUPS_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Iterator of Group-s
 */
//------------------------------------------------------------------------ 

class Groups extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
    /**
	 * Gets the Group which property TableGroup::TABLE_COLUMN_IDGROUP
	 * has the value $idGroup
     *
     * @param $idGroup the id of the Group to be looked for
	 *
     * @return - the Group object which property
	 * TableGroup::TABLE_COLUMN_IDGROUP has the value $idGroup
     * @return - an Errors object in case of error(s) :
	 *
	 * @return GroupError::GROUP_NOT_LOADED if Group has not been loaded
	 * from the database or doesn't exist
     *
     */
	public function GetGroupByIdGroup ( $idGroup )
	{
		if ( isset ( $this->groups [ $idGroup ] ) )
		{
			return $this->groups [ $idGroup ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new GroupError ( GroupError::GROUP_NOT_LOADED, 'Group not loaded from database or not existant.' ) );
			
			return $errors;
		}
	} //---- End of GetGroupByIdGroup
	
    /**
	 * Gets the Group which property TableGroup::TABLE_COLUMN_NAME
	 * has the value $nameGroup
     *
     * @param $nameGroup the name of the Group to be looked for
	 *
     * @return - the Group object which property TableGroup::TABLE_COLUMN_NAME
	 * has the value $nameGroup
     * @return - an Errors object in case of error(s) :
	 *
	 * @return GroupError::GROUP_NOT_LOADED if Group has not been loaded
	 * from the database or doesn't exist
     *
     */
	public function GetGroupByName ( $nameGroup )
	{
		foreach ( $this->groups as $group ) 
		{
			if ( $group->GetProperty ( TableGroup::TABLE_COLUMN_NAME ) == $nameGroup )
			{
				return $group;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new GroupError ( GroupError::GROUP_NOT_LOADED, 'Group not loaded from database or not existant.' ) );
			
		return $errors;
	} //---- End of GetGroupByName
	
    /**
	 * Adds a Group to the Groups if it is different than NULL.
	 * Alias of Groups::Add()
     *
     * @param $group the Group to add
     *
     */
	public function SetGroup ( Group $group )
	{

		$this->Add ( $group );

	} //---- End of SetGroup
	
//---------------------------------------------- Iterator's Implementation

    /**
	 * Adds a Group to the Groups if it is different than NULL.
	 * Group-s are indexed by TableGroup::TABLE_COLUMN_IDGROUP if possible.
     *
     * @param $item the Group to add
     *
     */
    public function Add( Group $item )
    {
		if ( $item == NULL ) return;
	
		$key = $item->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP );
	
		if ( empty ( $key ) )
		{
			$this->groups [] = $item;		
		}
		else
		{
			$this->groups [ $key ] = $item;
		}
    } //---- End of Add

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset($this->groups);
        
        $this->groups = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $this->groups );
    } //---- End of GetCount
    
//---------------------------------------------- Iterator's Implementation
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->groups );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $this->groups );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return Key ( $this->groups );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->groups );
    } //---- End of Next
    
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    public function Valid( )
    {
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises Groups from a BDDRecordSet.
	 *
     */
    public function __construct( BDDRecordSet $groups )
    {
		parent::__construct();
	
		$this->groups = array();
		
		foreach ( $groups as $group )
		{
			$this->Add( new Group ( $group ) );
		}		
    } //---- End of constructor


	/**
	 * Destructs ressources allocated
	 */
    public function __destruct ( )
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    function __ToString ( )
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	
	/** 
	 * Array of Group-s indexed by TableGroup::TABLE_COLUMN_IDGROUP if 
	 * possible
	 */
	protected $groups;

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |MySQLTableGroup.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <MySQLTableGroup> (file MySQLTableGroup.php) --------------
/*if (defined('MYSQLTABLEGROUP_H'))
{
    return;
}
else
{

}
define('MYSQLTABLEGROUP_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for operations on Group Table for MySQL 
 * Database.
 */
//------------------------------------------------------------------------ 

class MySQLTableGroup extends MySQLTable implements TableGroupInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

	/**
	 * Updates validated items in $groups in function of its idGroup.
	 * If idGroup doesn't exist, item is inserted.
	 * If an item of $groups hasn't been validate, it is skipped.
	 *
	 * @param $groups a Groups of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
    public function SaveGroups ( Groups $groups )
	{		
		foreach ( $groups as $group )
		{
			if ( $group->IsValid() )
			{
				if ( $this->IdGroupExists ( $group->GetProperty( TableGroup::TABLE_COLUMN_IDGROUP ) ) )
				{
					if ( ( $errs = $this->UpdateGroupByIdGroup ( $group )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->InsertGroup( $group) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- End of SaveGroups

	/**
	 * Selects all the Group-s from Table.
     *
     * @return - a list of Group-s in a Groups object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectGroups ()
	{
		$result = $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , '' );
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of SelectGroups
	
	
	/**
	 * Selects the Group from table which TableGroup::TABLE_COLUMN_IDGROUP
	 * equals to $idGroup.
     *
	 * @param $idGroup the id of the Group to select
	 *
     * @return - the Group which TableGroup::TABLE_COLUMN_IDGROUP equals to
	 * $idGroup in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectGroupByIdGroup ( $idGroup )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableGroup::TABLE_COLUMN_IDGROUP . MySQLTABLE::MYSQL_SEEK_STRICT . intval($idGroup)
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of SelectGroupByIdGroup
	
	
	/**
	 * Selects the Group-s from table which TableGroup::TABLE_COLUMN_IDSITE
	 * equals to $idSite. In other words : Group-s that belong to the site of 
	 * id $idSite
     *
	 * @param $idSite the id of the Site the Group may belong
	 *
     * @return - A Groups of Group-s which TableGroup::TABLE_COLUMN_IDSITE 
	 * equals to $idSite in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectGroupsByIdSite ( $idSite )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableGroup::TABLE_COLUMN_IDSITE . MySQLTABLE::MYSQL_SEEK_STRICT . intval ( $idSite )
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of SelectGroupsByIdSite
	
	/**
	 * Selects the Group-s from table which TableGroup::TABLE_COLUMN_NAME
	 * looks like $groupName.
     *
	 * @param $groupName the name of the Group to select. It can contain
	 * magic chars like MYSQL_SEEK_MULTICHARS and MYSQL_SEEK_MULTICHARS. 
	 * Please refer to your database documentation.
	 *
     * @return - a Groups object : the Group-s which 
	 * TableGroup::TABLE_COLUMN_NAME looks like $groupName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function FindGroupsByName ( $groupName )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableGroup::TABLE_COLUMN_NAME . MySQLTABLE::MYSQL_SEEK_REGEX . MySQLTABLE::MYSQL_SEEK_SEPARATOR . addslashes( $groupName ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR		
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of FindGroupsByName
	
	/**
	 * Tries to update the given group $updatedGroup in function of its
	 * property TableGroup::TABLE_COLUMN_IDGROUP.
	 *
	 * @param $updatedGroup The Group to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */	
	public function UpdateGroupByIdGroup ( Group $updatedGroup )
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Group non validé, merci de le valider avant de lancer une mise à jour') ) ;
			
			return $errors;
		}

		/* record validated, checks for existence => update */
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableGroup::TABLE_COLUMN_IDGROUP . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP ) );
		
		if ( ! ($res = $this->IdGroupExists( intval ($new->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre à jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- End of UpdateGroupByIdGroup
	
	/**
	 * Inserts the given Group $group into the table.
	 *
	 * @param $group The Group to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertGroup ( Group $group )
	{
		return $this->Insert ( $group );
	} //---- End of InsertGroup
	
	/**
	 * Checks whether the Group of id $idGroup exists or not.
	 *
	 * @param $idGroup The TableGroup::TABLE_COLUMN_IDGROUP of the group 
	 * to be checked.
	 *
	 * @return - true if group exists
	 * @return - false otherwise
     *
     */
	public function IdGroupExists ( $idGroup )
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableGroup::TABLE_COLUMN_IDGROUP . MySQLTable::MYSQL_SEEK_STRICT . intval( $idGroup );
		
		$res = $this->Select( TableGroup::TABLE_COLUMN_IDGROUP, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	} //---- End of IdGroupExists
	
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |TableGroup.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <TableGroup> (file TableGroup.php) --------------
/*if (defined('TABLEGROUP_H'))
{
    return;
}
else
{

}
define('TABLEGROUP_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides constants for Group table fields name
 */
//------------------------------------------------------------------------ 

class TableGroup
{
//----------------------------------------------------------------- PUBLIC

	/** Primary key field of the Group table */
	const TABLE_COLUMN_IDGROUP = 'idgroup';
	
	/** Group name field */
	const TABLE_COLUMN_NAME = 'name';
	
	/** Group accesses field  : is this Group the most powerful ? */
	const TABLE_COLUMN_OVERRIDE = 'override';
	
	/** Foreign key that refers to Site Table */
	const TABLE_COLUMN_IDSITE = 'idsite';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |UserError.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <UserError> (file UserError.php) --------------
/*if (defined('USERERROR_H'))
{
    return;
}
else
{

}
define('USERERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for User's Errors.
 */
//------------------------------------------------------------------------ 

class UserError extends Error
{
//----------------------------------------------------------------- PUBLIC
	/**
	 * Requested User has not been loaded from database or does not
	 * exist
	 */
    const USER_NOT_LOADED = 'USER_NOT_LOADED';

	/** Requested Group has a non valid idGroup referrent */
    const USER_IDGROUP_INEXISTANT = 'USER_IDGROUP_INEXISTANT';
	
	/** The User has a an empty name/login */
	const USER_LOGIN_EMPTY = 'USER_LOGIN_EMPTY';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |TableUserInterface.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <TableUserInterface> (file TableUserInterface.php) --------------
/*if (defined('TABLEUSERINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEUSERINTERFACE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for TableUser management for any databases.
 */
//------------------------------------------------------------------------ 

interface TableUserInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

	/**
	 * Updates validated items in $users in function of its idUser.
	 * If idUser doesn't exist, item is inserted.
	 * If an item of $users hasn't been validate, it is skipped.
	 *
	 * @param $users a Users of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
    public function SaveUsers ( Users $users );
	 
	/**
	 * Selects all the User-s from Table.
     *
     * @return - a list of User-s in a Users object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectUsers ();
	
	/**
	 * Selects the Site from table which TableUser::TABLE_COLUMN_IDUSER
	 * equals to $idUser.
     *
	 * @param $idUser the id of the User to select
	 *
     * @return - the User which TableUser::TABLE_COLUMN_IDUSER equals to
	 * $idUser in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectUserByIdUser ( $idUser );
	
	/**
	 * Selects the User-s from table which TableUser::TABLE_COLUMN_IDGROUP
	 * equals to $idGroup. In other words : User-s that belong to the group of 
	 * id $idGroup
     *
	 * @param $idGroup the id of the Group the User may belong
	 *
     * @return - A Users of User-s which TableUser::TABLE_COLUMN_IDGROUP 
	 * equals to $idGroup in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectUsersByIdGroup ( $idGroup );	
	
	/**
	 * Selects the User-s from table which TableUser::TABLE_COLUMN_NAME
	 * looks like $userName.
     *
	 * @param $userName the name of the User to select. It can contain
	 * magic chars like MYSQL_SEEK_MULTICHARS and MYSQL_SEEK_ANYCHAR. 
	 * Please refer to your database documentation.
	 *
     * @return - a Users object : the User-s which 
	 * TableUser::TABLE_COLUMN_NAME looks like $userName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function FindUsersByName ( $userName );
	
	/**
	 * Tries to update the given site $updatedUser in function of its
	 * property TableUser::TABLE_COLUMN_IDUSER.
	 *
	 * @param $updatedUser The User to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */	
	public function UpdateUserByIdUser ( User $updatedUser );
	
	/**
	 * Inserts the given User $user into the table.
	 *
	 * @param $user The User to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertUser ( User $user );
	
	/**
	 * Checks whether the User of id $idUser exists or not.
	 *
	 * @param $idUser The TableUser::TABLE_COLUMN_IDUSER of the user 
	 * to be checked.
	 *
	 * @return - true if user exists
	 * @return - false otherwise
     *
     */
	public function IdUserExists ( $idUser );
    
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |User.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Classe <User> (file User.php) --------------
/*if (defined('USER_H'))
{
    return;
}
else
{

}
define('USER_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for User table  entries
 */
//------------------------------------------------------------------------ 

class User extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    public function Validate ( $groupTable )
    /**
	 * Tries to validate the User in order to save it into DataBase.
     *
	 * @param $groupTable a BDDTableGroup object (where BDD should be
	 * replaced by your current Database : eg. MySQLTableGroup). A valid 
	 * BDDTableGroup implements TableGroupInterface
	 *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return UserError::USER_LOGIN_EMPTY if property 
	 * TableUser::TABLE_COLUMN_NAME is empty
	 *
	 * @return BDDError::TABLE_CLASS_INCORRECT if $groupTable is not a 
	 * valid instance
	 *
	 * @return UserError::USER_IDGROUP_INEXISTANT if User's group (property 
	 * TableGroup::TABLE_COLUMN_IDGROUP) doesn't exists
     *
     */
	{
		$errors = new Errors ();
	
		// login
			if ( empty( $this->row[ TableUser::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new UserError ( UserError::USER_LOGIN_EMPTY, 'Please fill in login.') );
			}
	
		// referent IdGroup
			if ( ! @in_array( 'TableGroupInterface', class_implements ( $groupTable ) ) )
			{
				$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Parameter is not a good instance of BDDTableGroup.' ) );
			} 
			else
			{
				if ( ! $groupTable->IdGroupExists( $this->row[ TableGroup::TABLE_COLUMN_IDGROUP ]  ) )
				{
					$errors->Add ( new GroupError ( UserError::USER_IDGROUP_INEXISTANT, 'User does not refer to any a group.') );
				}
			}
			
		// result
		if ( $errors->GetCount() == 0 )
		{
			$this->isValid = true;
			return NULL;		
		}
		
		
		$this->isValid = false;
		return $errors;
	} //----- End of Validate

//---------------------------------------------- Constructors - destructor

    /**
	 * Initialises User from the BDDRecord $newRec.
	 * If $newRec is NULL, User is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
    function __construct( BDDRecord $newRec )
    {
		parent::__construct( NULL );
		
		// initialization		
		$this->SetProperty ( TableUser::TABLE_COLUMN_IDUSER , '' );
		$this->SetProperty ( TableUser::TABLE_COLUMN_NAME , '' );
		$this->SetProperty ( TableUser::TABLE_COLUMN_PASSWORD , '' );
		$this->SetProperty ( TableUser::TABLE_COLUMN_IDGROUP , '' );

		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] );
			// php hack to access protected property $newRec->row
		}
    } //---- End of constructor
	
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
	 */
    function __ToString ( )
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |Users.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Users> (file Users.php) --------------
/*if (defined('USERS_H'))
{
    return;
}
else
{

}
define('USERS_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Iterator of User-s
 */
//------------------------------------------------------------------------ 

class Users extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
    /**
	 * Gets the User which property TableUser::TABLE_COLUMN_IDUSER
	 * has the value $idUser
     *
     * @param $idUser the id of the User to be looked for
	 *
     * @return - the User object which property
	 * TableUser::TABLE_COLUMN_IDUSER has the value $idUser
     * @return - an Errors object in case of error(s) :
	 *
	 * @return UserError::USER_NOT_LOADED if User has not been loaded
	 * from the database or doesn't exist
     *
     */
	public function GetUserByIdUser ( $idUser )
	{
		if ( isset ( $this->users [ $idUser ] ) )
		{
			return $this->users [ $idUser ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new UserError ( UserError::USER_NOT_LOADED, 'User not loaded from database or not existant.' ) );
			
			return $errors;
		}
	} //---- End of GetUserByIdUser
	
    /**
	 * Gets the User which property TableUser::TABLE_COLUMN_NAME
	 * has the value $nameUser
     *
     * @param $nameUser the name of the User to be looked for
	 *
     * @return - the User object which property TableUser::TABLE_COLUMN_NAME
	 * has the value $nameUser
     * @return - an Errors object in case of error(s) :
	 *
	 * @return UserError::USER_NOT_LOADED if User has not been loaded
	 * from the database or doesn't exist
     *
     */
	public function GetUserByName ( $nameUser )
	{
		foreach ( $this->users as $user ) 
		{
			if ( $user->GetProperty ( TableUser::TABLE_COLUMN_NAME ) == $nameUser )
			{
				return $user;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new UserError ( UserError::USER_NOT_LOADED, 'User not loaded from database or not existant.' ) );
			
		return $errors;
	} //---- End of GetUserByName
	
    /**
	 * Adds a User to the Users if it is different than NULL.
	 * Alias of User::Add()
     *
     * @param $user the User to add
     *
     */
	public function SetUser ( User $user )
	{

		$this->Add ( $user );

	} //---- End of SetUser
	
//------------------------------------------- Implémentation de MyIterator

    /**
	 * Adds a User to the Users if it is different than NULL.
	 * User-s are indexed by TableUser::TABLE_COLUMN_IDUSER if possible.
     *
     * @param $item the User to add
     *
     */
    public function Add( User $item )
    {
		if ( $item == NULL ) return;
		
		$key = $item->GetProperty ( TableUser::TABLE_COLUMN_IDUSER );
	
		if ( empty ( $key ) )
		{
			$this->users [] = $item;		
		}
		else
		{
			$this->users [ $key ] = $item;
		}
    } //---- End of Add

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset($this->users);
        
        $this->users = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $this->users );
    } //---- End of GetCount
    
//-----------------------------------------------Implémentation Iterator
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->users );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $this->users );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return Key ( $this->users );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->users );
    } //---- End of Next
    
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    public function Valid( )
    {
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises Users from a BDDRecordSet.
	 *
     */
    public function __construct( BDDRecordSet $users )
    {
		parent::__construct();
		
		$this->users = array();
		
		foreach ( $users as $user )
		{
			$this->Add( new User ( $user ) );
		}		
    } //---- End of constructor


	/**
	 * Destructs ressources allocated
	 */
    public function __destruct ( )
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    function __ToString ( )
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	
	/** 
	 * Array of User-s indexed by TableUser::TABLE_COLUMN_IDUSER if 
	 * possible
	 */
	protected $users;

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |MySQLTableUser.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <MySQLTableUser> (file MySQLTableUser.php) --------------
/*if (defined('MYSQLTABLEUSER_H'))
{
    return;
}
else
{

}
define('MYSQLTABLEUSER_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for operations on User Table for MySQL 
 * Database.
 */
//------------------------------------------------------------------------ 

class MySQLTableUser extends MySQLTable implements TableUserInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

	/**
	 * Updates validated items in $users in function of its idUser.
	 * If idUser doesn't exist, item is inserted.
	 * If an item of $users hasn't been validate, it is skipped.
	 *
	 * @param $users a Users of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
    public function SaveUsers ( Users $users )
	{		
		foreach ( $users as $user )
		{
			if ( $user->IsValid() )
			{
				if ( $this->IdUserExists ( $user->GetProperty( TableUser::TABLE_COLUMN_IDUSER ) ) )
				{
					if ( ( $errs = $this->UpdateUserByIdUser ( $user )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->InsertUser( $user) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- End of SaveUsers

	/**
	 * Selects all the User-s from Table.
     *
     * @return - a list of User-s in a Users object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectUsers ()
	{
		$result = $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , '' );
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}
	} //---- End of SelectUsers
	
	
	/**
	 * Selects the Site from table which TableUser::TABLE_COLUMN_IDUSER
	 * equals to $idUser.
     *
	 * @param $idUser the id of the User to select
	 *
     * @return - the User which TableUser::TABLE_COLUMN_IDUSER equals to
	 * $idUser in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectUserByIdUser ( $idUser )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_IDUSER.MySQLTABLE::MYSQL_SEEK_STRICT.intval($idUser)
				);
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}	
	} //---- End of SelectUserByIdUser
	
	/**
	 * Selects the User-s from table which TableUser::TABLE_COLUMN_IDGROUP
	 * equals to $idGroup. In other words : User-s that belong to the group of 
	 * id $idGroup
     *
	 * @param $idGroup the id of the Group the User may belong
	 *
     * @return - A Users of User-s which TableUser::TABLE_COLUMN_IDGROUP 
	 * equals to $idGroup in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectUsersByIdGroup ( $idGroup )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_IDGROUP.MySQLTABLE::MYSQL_SEEK_STRICT.intval($idGroup)
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}
	} //---- End of SelectUsersByIdGroup
	
	/**
	 * Selects the User-s from table which TableUser::TABLE_COLUMN_NAME
	 * looks like $userName.
     *
	 * @param $userName the name of the User to select. It can contain
	 * magic chars like MYSQL_SEEK_MULTICHARS and MYSQL_SEEK_ANYCHAR. 
	 * Please refer to your database documentation.
	 *
     * @return - a Users object : the User-s which 
	 * TableUser::TABLE_COLUMN_NAME looks like $userName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function FindUsersByName ( $userName )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR. addslashes($userName).MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}
	} //---- End of FindUsersByName
	
	/**
	 * Tries to update the given site $updatedUser in function of its
	 * property TableUser::TABLE_COLUMN_IDUSER.
	 *
	 * @param $updatedUser The User to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */	
	public function UpdateUserByIdUser ( User $updatedUser )
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de User non validé, merci de le valider avant de lancer une mise à jour') ) ;
			
			return $errors;
		}

		// record validé, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableUser::TABLE_COLUMN_IDUSER . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableUser::TABLE_COLUMN_IDUSER ) );
		
		if ( ! ($res = $this->IdUserExists( intval ($new->GetProperty ( TableUser::TABLE_COLUMN_IDUSER ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre à jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- End of UpdateUserByIdUser
	
	/**
	 * Inserts the given User $user into the table.
	 *
	 * @param $user The User to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertUser ( User $user )
	{
		return $this->Insert ( $user );
	} //---- End of InsertUser
	
	/**
	 * Checks whether the User of id $idUser exists or not.
	 *
	 * @param $idUser The TableUser::TABLE_COLUMN_IDUSER of the user 
	 * to be checked.
	 *
	 * @return - true if user exists
	 * @return - false otherwise
     *
     */
	public function IdUserExists ( $idUser )
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableUser::TABLE_COLUMN_IDUSER . MySQLTable::MYSQL_SEEK_STRICT . intval( $idUser );
		
		$res = $this->Select( TableUser::TABLE_COLUMN_IDUSER, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	} //---- End of IdUserExists
	
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |TableUser.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <TableUser> (file TableUser.php) --------------
/*if (defined('TABLEUSER_H'))
{
    return;
}
else
{

}
define('TABLEUSER_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides constants for User table fields name
 */
//------------------------------------------------------------------------ 

class TableUser
{
//----------------------------------------------------------------- PUBLIC

	/** Primary key field of the User table */
	const TABLE_COLUMN_IDUSER = 'iduser';
	
	/** User name/login field */
	const TABLE_COLUMN_NAME = 'name';
	
	/** User password field */
	const TABLE_COLUMN_PASSWORD = 'pass';
	
	/** Foreign key that refers to Group Table */
	const TABLE_COLUMN_IDGROUP = 'idgroup';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |VariableError.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <VariableError> (file VariableError.php) --------------
/*if (defined('VARIABLEERROR_H'))
{
    return;
}
else
{

}
define('VARIABLEERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Variable's Errors.
 */
//------------------------------------------------------------------------ 

class VariableError extends Error
{
//----------------------------------------------------------------- PUBLIC
	/**
	 * Requested Variable has not been loaded from database or does not
	 * exist
	 */
    const VARIABLE_NOT_LOADED = 'VARIABLE_NOT_LOADED';
	
	/** The Variable has a an empty name */
    const VARIABLE_NAME_EMPTY = 'VARIABLE_NAME_EMPTY';
	
	/** The scope of the variable is not valid */
    const VARIABLE_SCOPE_INCORRECT = 'VARIABLE_SCOPE_INCORRECT';
	
	/** The access of the variable is not valid */
    const VARIABLE_ACCESS_INCORRECT = 'VARIABLE_ACCESS_INCORRECT';
	
	/** Requested Group has a non valid idSite referrent */
    const VARIABLE_IDSITE_INEXISTANT = 'VARIABLE_IDSITE_INEXISTANT';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |TableVariableInterface.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <TableVariableInterface> (file TableVariableInterface.php) --------------
/*if (defined('TABLEVARIABLEINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEVARIABLEINTERFACE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for VariableTable management for any databases.
 */
//------------------------------------------------------------------------ 

interface TableVariableInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

	/**
	 * Updates validated items in $variables in function of its idVariable.
	 * If idVariable doesn't exist, item is inserted.
	 * If an item of $variables hasn't been validate, it is skipped.
	 *
	 * @param $variables a Variables of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
    public function SaveVariables ( Variables $variables );
	
	/**
	 * Selects all the Variable-s from Table which scope is Server.
     *
     * @return - a list of Variable-s in a Variables object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectServerVariables ();
	
	/**
	 * Selects all the Variable-s from Table which is Site and refers to
	 * site of id $idSites.
     *
	 * @param $idSite The id of the Site the variable-s returned refers to.
	 *
     * @return - a list of Variable-s in a Variabless object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectSiteVariables ( $idSite );
	
	/**
	 * Selects the Variable-s from table which TableVariable::TABLE_COLUMN_NAME
	 * looks like $varName.
     *
	 * @param $varName the name of the Variable to select. It can contain
	 * magic chars like BDD_SEEK_MULTICHARS and BDD_SEEK_ANYCHAR where BDD
	 * represent your database type. Please refer to your database documentation.
	 *
     * @return - a Variables object : the Variable-s which 
	 * TableVariable::TABLE_COLUMN_NAME looks like $varName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectVariablesByName ( $varName );
	
	/**
	 * Tries to update the given Variable $updatedVariable in function of its
	 * property TableVariable::TABLE_COLUMN_IDVARIABLE.
	 *
	 * @param $updatedVariable The Variable to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function UpdateVariableByIdVariable ( Variable $updatedVariable );
	
	/**
	 * Inserts the given Variable $variable into the table.
	 *
	 * @param $variable The Variable to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertVariable ( Variable $variable );
	
	/**
	 * Checks whether the Variable of id $idVariable exists or not.
	 *
	 * @param $idVariable The TableVariable::TABLE_COLUMN_IDVARIABLE of the variable 
	 * to be checked.
	 *
	 * @return - true if variable exists
	 * @return - false otherwise
     *
     */
	public function IdVariableExists ( $idVariable );
	
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |Variable.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Variable> (file Variable.php) --------------
/*if (defined('VARIABLE_H'))
{
    return;
}
else
{

}
define('VARIABLE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Variable table entries
 */
//------------------------------------------------------------------------ 

class Variable extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
    /**
	 * Tries to validate the Variable in order to save it into DataBase.
     *
	 * @param $siteTable a BDDTableSite object (where BDD should be
	 * replaced by your current Database : eg. MySQLTableSite). A valid 
	 * BDDTableSite implements TableSiteInterface
	 *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return VariableError::VARIABLE_NAME_EMPTY if property 
	 * TableVariable::TABLE_COLUMN_NAME is empty
	 *
	 * @return BDDError::TABLE_CLASS_INCORRECT if $groupTable is not a 
	 * valid instance
	 *
	 * @return VariableError::VARIABLE_SCOPE_INCORRECT if property
	 * TableVariable::TABLE_COLUMN_SCOPE is incorrect
	 *
	 * @return VariableError::VARIABLE_ACCESS_INCORRECT if property
	 * TableVariable::TABLE_COLUMN_ACCESS is incorrect
     *
	 * @return VariableError::VARIABLE_IDSITE_INEXISTANT if property 
	 * TableVariable::TABLE_COLUMN_IDSITE refers to a non existant site
     */
    public function Validate ( $siteTable )
	{
		$errors = new Errors ();
	
		// variable name
			if ( empty( $this->row[ TableVariable::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_NAME_EMPTY, 'Please fill in variable name.') );
			}
	
		// scope
			if ( $this->row[ TableVariable::TABLE_COLUMN_SCOPE ] != TableVariable::TABLE_COLUMN_SCOPE_SERVER && $this->row[ TableVariable::TABLE_COLUMN_SCOPE ] != TableVariable::TABLE_COLUMN_SCOPE_SITE  )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_SCOPE_INCORRECT, 'Variable scope is incorrect.') );
			}
		
		// access
			if ( $this->row[ TableVariable::TABLE_COLUMN_ACCESS ] != TableVariable::TABLE_COLUMN_ACCESS_ROOT && $this->row[ TableVariable::TABLE_COLUMN_ACCESS ] != TableVariable::TABLE_COLUMN_ACCESS_ADMIN )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_ACCESS_INCORRECT, 'Variable access are not correctly defined.') );
			}
		
		// referent IdSite
			if ( ! @in_array( 'TableSiteInterface', class_implements ( $siteTable ) ) )
			{
				$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Parameter is not a good instance of BDDTableSite.' ) );
			} 
			else
			{	
				if ( ! $siteTable->IdSiteExists( $this->row[ TableVariable::TABLE_COLUMN_IDSITE ]  ) )
				{
					$errors->Add ( new VariableError ( VariableError::VARIABLE_IDSITE_INEXISTANT, 'Variable does not refer to any site.') );
				}
			}
		
		// result
		if ( $errors->GetCount() == 0 )
		{
			$this->isValid = true;
			return NULL;		
		}
		
		
		$this->isValid = false;
		return $errors;
	} //---- End of Validate
	

//---------------------------------------------- Constructors - destructor

    /**
	 * Initialises Variable from the BDDRecord $newRec.
	 * If $newRec is NULL, Variable is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
    function __construct( BDDRecord $newRec )
    {
		parent::__construct( NULL );
		
		// initialization
		$this->SetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_NAME , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_DATA , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_SCOPE , TableVariable::TABLE_COLUMN_SCOPE_SITE );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_ACCESS , TableVariable::TABLE_COLUMN_ACCESS_ADMIN );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_IDSITE , NULL );
	
			
		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] );
			// php hack to access protected property $newRec->row
		}
    } //---- End of constructor
	
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
	 */
    function __ToString ( )
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |Variables.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Variables> (file Variables.php) --------------
/*if (defined('VARIABLES_H'))
{
    return;
}
else
{

}
define('VARIABLES_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Iterator of Variable-s
 */
//------------------------------------------------------------------------ 

class Variables extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
    /**
	 * Gets the Variable which property TableVariable::TABLE_COLUMN_NAME
	 * has the value $varName
     *
     * @param $varName the name of the Group to be looked for
	 *
     * @return - the Group object which property TableVariable::TABLE_COLUMN_NAME
	 * has the value $varName
     * @return - an Errors object in case of error(s) :
	 *
	 * @return VariableError::VARIABLE_NOT_LOADED if Variable has not been loaded
	 * from the database or doesn't exist
     *
     */
	public function GetVariableByName ( $varName )
	{
		if ( isset ( $this->variables [ $varName ] ) )
		{
			return $this->variables [ $varName ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new VariableError ( VariableError::VARIABLE_NOT_LOADED, 'Variable not loaded from database not existant.' ) );
			
			return $errors;
		}
	} //---- End of GetVariableByName
	
    /**
	 * Adds a Variable to the Variables if it is different than NULL.
	 * Alias of Variables::Add()
     *
     * @param $variable the Variable to add
     *
     */
	public function SetVariable ( Variable $variable )
	{
		$this->Add ( $variable );
	} //---- End of SetVariable
	
//------------------------------------------- Implémentation de MyIterator

    /**
	 * Adds a Variable to the Variables if it is different than NULL.
	 * Variable-s are indexed by TableVariable::TABLE_COLUMN_NAME if possible.
     *
     * @param $item the Variable to add
     *
     */
    public function Add( Variable $item )
    {
		if ( $item == NULL ) return;
		
		$key = $item->GetProperty ( TableVariable::TABLE_COLUMN_NAME );
	
		if ( empty ( $key ) )
		{
			$this->variables [] = $item;		
		}
		else
		{
			$this->variables [ $key ] = $item;
		}
    } //---- End of Add

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset($this->variables);
        
        $this->variables = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $this->variables );
    } //---- End of GetCount
    
//---------------------------------------------- Iterator's Implementation
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->variables );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $this->variables );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return Key ( $this->variables );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->variables );
    } //---- End of Next
    
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    public function Valid( )
    {
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises Variables from a BDDRecordSet.
	 *
     */
    public function __construct( BDDRecordSet $variables )
    {
		parent::__construct();
		
		$this->variables = array();
		
		foreach ( $variables as $variable )
		{
			$this->Add( new Variable ( $variable ) );
		}		
    } //---- End of constructor


	/**
	 * Destructs ressources allocated
	 */
    public function __destruct ( )
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    function __ToString ( )
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	
	/** 
	 * Array of Variable-s indexed by TableVariable::TABLE_COLUMN_NAME if 
	 * possible
	 */
	protected $variables;

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |MySQLTableVariable.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <MySQLTableVariable> (file MySQLTableVariable.php) --------------
/*if (defined('MYSQLTABLEVARIABLE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLEVARIABLE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for operations on Variable Table for MySQL 
 * Database.
 */
//------------------------------------------------------------------------ 

class MySQLTableVariable extends MySQLTable implements TableVariableInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

	/**
	 * Updates validated items in $variables in function of its idVariable.
	 * If idVariable doesn't exist, item is inserted.
	 * If an item of $variables hasn't been validate, it is skipped.
	 *
	 * @param $variables a Variables of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
    public function SaveVariables ( Variables $variables )
	{		
		foreach ( $variables as $variable )
		{
			if ( $variable->IsValid() )
			{
				if ( $this->IdVariableExists ( $variable->GetProperty( TableVariable::TABLE_COLUMN_IDVARIABLE ) ) )
				{
					if ( ( $errs = $this->UpdateVariable( $variable )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->InsertVariable( $variable) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- End of SaveVariables
	
	/**
	 * Selects all the Variable-s from Table which scope is Server.
     *
     * @return - a list of Variable-s in a Variables object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectServerVariables ()
	{
		$result = $this->Select (	MySQLTABLE::TABLE_COLUMN_ALL , 
									MySQLTABLE::MYSQL_CLAUSE_WHERE .
										TableVariable::TABLE_COLUMN_SCOPE . MySQLTABLE::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR . TableVariable::TABLE_COLUMN_SCOPE_SERVER .MySQLTABLE::MYSQL_SEEK_SEPARATOR
					);
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Variables ( $result );
		}
	} //---- End of SelectServerVariable
	
	/**
	 * Selects all the Variable-s from Table which is Site and refers to
	 * site of id $idSites.
     *
	 * @param $idSite The id of the Site the variable-s returned refers to.
	 *
     * @return - a list of Variable-s in a Variabless object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectSiteVariables ( $idSite )
	{
		$result = $this->Select (	MySQLTABLE::TABLE_COLUMN_ALL ,
									MySQLTABLE::MYSQL_CLAUSE_WHERE.
											TableVariable::TABLE_COLUMN_SCOPE.MySQLTABLE::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR.TableVariable::TABLE_COLUMN_SCOPE_SITE . MySQLTABLE::MYSQL_SEEK_SEPARATOR .
									MySQLTABLE::MYSQL_CLAUSE_AND.
											TableVariable::TABLE_COLUMN_IDSITE.MySQLTABLE::MYSQL_SEEK_STRICT.MySQLTABLE::MYSQL_SEEK_SEPARATOR.$idSite.MySQLTABLE::MYSQL_SEEK_SEPARATOR
					);
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Variables ( $result );
		}
	} //---- End of SelectSiteVariable
	
	/**
	 * Selects the Group-s from table which TableVariable::TABLE_COLUMN_NAME
	 * looks like $varName.
     *
	 * @param $varName the name of the Variable to select. It can contain
	 * magic chars like MYSQL_SEEK_MULTICHARS and MYSQL_SEEK_MULTICHARS. 
	 * Please refer to your database documentation.
	 *
     * @return - a Variables object : the Variable-s which 
	 * TableVariable::TABLE_COLUMN_NAME looks like $varName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectVariablesByName ( $varName )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableVariable::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR.$varName.MySQLTABLE::MYSQL_SEEK_SEPARATOR		
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Variables ( $result );
		}
	} //---- End of SelectVariablesByName
	
	/**
	 * Tries to update the given Variable $updatedVariable in function of its
	 * property TableVariable::TABLE_COLUMN_IDVARIABLE.
	 *
	 * @param $updatedVariable The Variable to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function UpdateVariableByIdVariable ( Variable $updatedVariable )
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Variable non validé, merci de le valider avant de lancer une mise à jour') ) ;
			
			return $errors;
		}

		// record validé, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableVariable::TABLE_COLUMN_IDVARIABLE . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE ) );
		
		if ( ! ($res = $this->IdVariableExists( intval ($new->GetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre à jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- End of UpdateVariableByIdVariable
	
	/**
	 * Inserts the given Variable $variable into the table.
	 *
	 * @param $variable The Variable to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertVariable ( Variable $variable )
	{
		return $this->Insert ( $variable );
	} //---- End of InsertVariable
	
	/**
	 * Checks whether the Variable of id $idVariable exists or not.
	 *
	 * @param $idVariable The TableVariable::TABLE_COLUMN_IDVARIABLE of the variable 
	 * to be checked.
	 *
	 * @return - true if variable exists
	 * @return - false otherwise
     *
     */
	public function IdVariableExists ( $idVariable )
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableVariable::TABLE_COLUMN_IDVARIABLE . MySQLTABLE::MYSQL_SEEK_SEPARATOR . MySQLTable::MYSQL_SEEK_STRICT . intval( $idVariable ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR;
		
		$res = $this->Select( TableVariable::TABLE_COLUMN_IDVARIABLE, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	} //---- End of IdVariableExists
	
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |TableVariable.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <TableVariable> (file TableVariable.php) --------------
/*if (defined('TABLEVARIABLE_H'))
{
    return;
}
else
{

}
define('TABLEVARIABLE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides constants for Variable table fields name
 */
//------------------------------------------------------------------------ 

class TableVariable
{
//----------------------------------------------------------------- PUBLIC

	/** Primary key field of the Variable table */
	const TABLE_COLUMN_IDVARIABLE = 'idvariable';
	
	/** Variable scope field */
	const TABLE_COLUMN_SCOPE = 'scope';
	
	// TABLE_COLUMN_SCOPE's enum
	
		/** The variable just concerns current site */
		const TABLE_COLUMN_SCOPE_SITE = 'SITE';
		
		/** The variable concerns all sites */
		const TABLE_COLUMN_SCOPE_SERVER = 'SERVER';
		
	// end of TABLE_COLUMN_SCOPE's enum
	
	/** Variable Accesses field : defines who can modify it */
	const TABLE_COLUMN_ACCESS = 'access';

	// TABLE_COLUMN_ACCESS's enum
	
		/** The variable can only be modified by Global Admins */
		const TABLE_COLUMN_ACCESS_ROOT = 'ROOT';
		
		/** The variable can be modified by Site Admins (or globals)*/
		const TABLE_COLUMN_ACCESS_ADMIN = 'ADMIN';
		
	// end of TABLE_COLUMN_ACCESS's enum
	
	/** Variable Name field */
	const TABLE_COLUMN_NAME = 'name';
	
	/** Variable Data field */
	const TABLE_COLUMN_DATA = 'data';
	
	/** Foreign key that refers to Site Table */
	const TABLE_COLUMN_IDSITE = 'idsite';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |SiteError.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <SiteError> (file SiteError.php) --------------
/*if (defined('SITEERROR_H'))
{
    return;
}
else
{

}
define('SITEERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific constants for Site's Errors.
 */
//------------------------------------------------------------------------ 

class SiteError extends Error
{
//----------------------------------------------------------------- PUBLIC
	/**
	 * Requested Site has not been loaded from database or does not
	 * exist
	 */
	const SITE_NOT_LOADED = 'SITE_NOT_LOADED';
	
	/** The Site has a an empty name */
    const SITE_NAME_EMPTY = 'SITE_NAME_EMPTY';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |TableSiteInterface.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Classe <TableSiteInterface> (file TableSiteInterface.php) --------------
/*if (defined('TABLESITEINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLESITEINTERFACE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for TableSite management for any databases.
 */
//------------------------------------------------------------------------ 

interface TableSiteInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

	/**
	 * Updates validated items in $sites in function of its idSite.
	 * If idSite doesn't exist, item is inserted.
	 * If an item of $sites hasn't been validate, it is skipped.
	 *
	 * @param $sites a Sites of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
    public function SaveSites ( Sites $sites );
	 
	/**
	 * Selects all the Site-s from Table.
     *
     * @return - a list of Group-s in a Sites object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectSites ();
	
	/**
	 * Selects the Site from table which TableSite::TABLE_COLUMN_IDSITE
	 * equals to $idSite.
     *
	 * @param $idSite the id of the Site to select
	 *
     * @return - the Site which TableSite::TABLE_COLUMN_IDSITE equals to
	 * $idSite in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectSiteByIdSite ( $idSite );
	
	/**
	 * Selects the Site-s from table which TableSite::TABLE_COLUMN_NAME
	 * looks like $siteName.
     *
	 * @param $siteName the name of the Site to select. It can contain
	 * magic chars like BDD_SEEK_MULTICHARS and BDD_SEEK_ANYCHAR where BDD
	 * represent your database type. Please refer to your database documentation.
	 *
     * @return - a Sites object : the Site-s which 
	 * TableSite::TABLE_COLUMN_NAME looks like $siteName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function FindSitesByName ( $siteName );
	
	/**
	 * Tries to update the given site $updatedSite in function of its
	 * property TableSite::TABLE_COLUMN_IDSITE.
	 *
	 * @param $updatedSite The Site to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */	
	public function UpdateSiteByIdSite ( Site $updatedSite );
	
	/**
	 * Inserts the given Site $site into the table.
	 *
	 * @param $site The Site to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertSite ( Site $site );
	
	/**
	 * Checks whether the Site of id $idSite exists or not.
	 *
	 * @param $idSite The TableSite::TABLE_COLUMN_IDSITE of the site 
	 * to be checked.
	 *
	 * @return - true if site exists
	 * @return - false otherwise
     *
     */
	public function IdSiteExists ( $idSite );
    
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |Site.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Site> (file Site.php) --------------
/*if (defined('SITE_H'))
{
    return;
}
else
{

}
define('SITE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Site table entries
 */
//------------------------------------------------------------------------ 

class Site extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    /**
	 * Tries to validate the Site in order to save it into DataBase.
	 *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return SiteError::SITE_NAME_EMPTY if property 
	 * TableSite::TABLE_COLUMN_NAME is empty
     */
    public function Validate (  )
	{
		$errors = new Errors ();
	
		// variable name
			if ( empty( $this->row[ TableSite::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new VariableError ( SiteError::SITE_NAME_EMPTY, 'Please fill in site name.') );
			}
		
		// result
		if ( $errors->GetCount() == 0 )
		{
			$this->isValid = true;
			return NULL;		
		}
		
		
		$this->isValid = false;
		return $errors;
	} //----- End of Validate

//---------------------------------------------- Constructors - destructor

    /**
	 * Initialises Site from the BDDRecord $newRec.
	 * If $newRec is NULL, Variable is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
    function __construct( BDDRecord $newRec )
    {
		parent::__construct( NULL );
	
		// initialization
		$this->SetProperty ( TableSite::TABLE_COLUMN_IDSITE , '' );
		$this->SetProperty ( TableSite::TABLE_COLUMN_NAME , '' );

		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] );
			// php hack to access protected property $newRec->row
		}
    } //---- End of constructor
	
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
	 */
    function __ToString ( )
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |Sites.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Classe <Sites> (file Sites.php) --------------
/*if (defined('SITES_H'))
{
    return;
}
else
{

}
define('SITES_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Iterator of Site-s
 */
//------------------------------------------------------------------------ 

class Sites extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
    /**
	 * Gets the Site which property TableSite::TABLE_COLUMN_IDSITE
	 * has the value $idSite
     *
     * @param $idSite the id of the Site to be looked for
	 *
     * @return - the Site object which property
	 * TableSite::TABLE_COLUMN_IDSITE has the value $idSite
     * @return - an Errors object in case of error(s) :
	 *
	 * @return SiteError::SITE_NOT_LOADED if Site has not been loaded
	 * from the database or doesn't exist
     *
     */
	public function GetSiteByIdSite ( $idSite )
	{
		if ( isset ( $this->sites [ $idSite ] ) )
		{
			return $this->sites [ $idSite ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new SiteError ( SiteError::SITE_NOT_LOADED, 'Site not loaded from database or not existant.' ) );
			
			return $errors;
		}
	} //---- End of GetSiteByIdSite
	
    /**
	 * Gets the Site which property TableSite::TABLE_COLUMN_NAME
	 * has the value $nameSite
     *
     * @param $nameSite the name of the Site to be looked for
	 *
     * @return - the Site object which property TableSite::TABLE_COLUMN_NAME
	 * has the value $nameSite
     * @return - an Errors object in case of error(s) :
	 *
	 * @return SiteError::USER_NOT_LOADED if Site has not been loaded
	 * from the database or doesn't exist
     *
     */
	public function GetSiteByName ( $nameSite )
	{
		foreach ( $this->sites as $site ) 
		{
			if ( $site->GetProperty ( TableSite::TABLE_COLUMN_NAME ) == $nameSite )
			{
				return $site;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new SiteError ( SiteError::SITE_NOT_LOADED, 'Site not loaded from database or not existant.' ) );
			
		return $errors;
	} //---- End of GetSiteByName
	
    /**
	 * Adds a Site to the Sites if it is different than NULL.
	 * Alias of Site::Add()
     *
     * @param $site the Site to add
     *
     */
	public function SetSite ( Site $site )
	{
		$this->Add ( $site );
	} //---- End of SetSite
	
//------------------------------------------- Implémentation de MyIterator

    /**
	 * Adds a Site to the Sites if it is different than NULL.
	 * Site-s are indexed by TableSite::TABLE_COLUMN_IDSITE if possible.
     *
     * @param $item the Site to add
     *
     */
    public function Add( Site $item )
    {
		$key = $item->GetProperty ( TableSite::TABLE_COLUMN_IDSITE );
	
		if ( empty ( $key ) )
		{
			$this->sites [] = $item;		
		}
		else
		{
			$this->sites [ $key ] = $item;
		}
    } //---- End of Add

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset($this->sites);
        
        $this->sites = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $this->sites );
    } //---- End of GetCount
    
//----------------------------------------------- Iterator's implementation
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->sites );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $this->sites );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return Key ( $this->sites );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->sites );
    } //---- End of Next
    
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    public function Valid( )
    {
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises Sites from a BDDRecordSet.
	 *
     */
    public function __construct( BDDRecordSet $sites )
    {
		parent::__construct();
	
		$this->sites = array();
		
		foreach ( $sites as $site )
		{
			$this->Add( new Site ( $site ) );
		}		
    } //---- End of constructor


	/**
	 * Destructs ressources allocated
	 */
    public function __destruct ( )
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    function __ToString ( )
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	
	/** 
	 * Array of Site-s indexed by TableSite::TABLE_COLUMN_IDSITE if 
	 * possible
	 */
	protected $sites;

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |MySQLTableSite.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <MySQLTableSite> (file MySQLTableSite.php) --------------
/*if (defined('MYSQLTABLESITE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLESITE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for operations on Site Table for MySQL 
 * Database.
 */
//------------------------------------------------------------------------ 

class MySQLTableSite extends MySQLTable implements TableSiteInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

	/**
	 * Updates validated items in $sites in function of its idSite.
	 * If idSite doesn't exist, item is inserted.
	 * If an item of $sites hasn't been validate, it is skipped.
	 *
	 * @param $sites a Sites of items to be updated/inserted
	 *
     * @return - NULL in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
	 *
	 */
    public function SaveSites ( Sites $sites )
	{		
		foreach ( $sites as $site )
		{
			if ( $site->IsValid() )
			{
				if ( $this->IdSiteExists ( $site->GetProperty( TableSite::TABLE_COLUMN_IDSITE ) ) )
				{
					if ( ( $errs = $this->UpdateSiteByIdSite ( $site )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->InsertSite( $site) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- End of SaveSites

	/**
	 * Selects all the Site-s from Table.
     *
     * @return - a list of Site-s in a Sites object in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectSites ()
	{
		$result = $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , '' );
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of SelectSites
	
	
	/**
	 * Selects the Site from table which TableSite::TABLE_COLUMN_IDSITE
	 * equals to $idSite.
     *
	 * @param $idSite the id of the Site to select
	 *
     * @return - the Site which TableSite::TABLE_COLUMN_IDSITE equals to
	 * $idSite in case of success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function SelectSiteByIdSite ( $idSite )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableSite::TABLE_COLUMN_IDSITE . MySQLTABLE::MYSQL_SEEK_STRICT. intval( $idSite )
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of SelectSiteByIdSite
	
	/**
	 * Selects the Site-s from table which TableSite::TABLE_COLUMN_NAME
	 * looks like $siteName.
     *
	 * @param $siteName the name of the Site to select. It can contain
	 * magic chars like MYSQL_SEEK_MULTICHARS and MYSQL_SEEK_ANYCHAR. 
	 * Please refer to your database documentation.
	 *
     * @return - a Sites object : the Site-s which 
	 * TableSite::TABLE_COLUMN_NAME looks like $siteName in case of 
	 * success
	 * @return - an Errors object in case of error(s) : see
	 * BDDConnection::Query
     *
     */
	public function FindSitesByName ( $siteName )
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableSite::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR. addslashes( $siteName ).MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Sites ( $result );
		}
	} //---- End of FindSitesByName
	
	/**
	 * Tries to update the given site $updatedSite in function of its
	 * property TableSite::TABLE_COLUMN_IDSITE.
	 *
	 * @param $updatedSite The Site to be updated
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */	
	public function UpdateSiteByIdSite ( Site $updatedSite )
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Site non validé, merci de le valider avant de lancer une mise à jour') ) ;
			
			return $errors;
		}

		/* record validated, checks for existence => update */
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableSite::TABLE_COLUMN_IDSITE . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableSite::TABLE_COLUMN_IDSITE ) );
		
		if ( ! ($res = $this->IdSiteExists( intval ($new->GetProperty ( TableSite::TABLE_COLUMN_IDSITE ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre à jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- End of UpdateSite
	
	/**
	 * Inserts the given Site $site into the table.
	 *
	 * @param $site The Site to be inserted
	 *
	 * @return - NULL if operation was successful
	 * @return - an Errors object in case of Error-s see
	 * BDDConnection::Query
     *
     */
	public function InsertSite ( Site $site )
	{
		return $this->Insert ( $site );
	} //---- End of InsertSite
	
	/**
	 * Checks whether the Site of id $idSite exists or not.
	 *
	 * @param $idSite The TableSite::TABLE_COLUMN_IDSITE of the site 
	 * to be checked.
	 *
	 * @return - true if site exists
	 * @return - false otherwise
     *
     */
	public function IdSiteExists ( $idSite )
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableSite::TABLE_COLUMN_IDSITE . MySQLTable::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR . intval( $idSite ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR;
		
		$res = $this->Select( TableSite::TABLE_COLUMN_IDSITE, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	} //---- End of IdSiteExists
	
//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions



/*************************************************************************
                           |TableSite.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <TableSite> (file TableSite.php) --------------
/*if (defined('TABLESITE_H'))
{
    return;
}
else
{

}
define('TABLESITE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides constants for Site table fields name
 */
//------------------------------------------------------------------------ 

class TableSite
{
//----------------------------------------------------------------- PUBLIC

	/** Primary key field of the Site table */
	const TABLE_COLUMN_IDSITE = 'idsite';
	
	/** Site name field */
	const TABLE_COLUMN_NAME = 'name';

//--------------------------------------------------------- public methods

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions


?>