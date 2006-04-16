<?php


/*************************************************************************
                           |AbstractIterator.php|
                             -------------------
    d�but                : |DATE|
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
    public function __construct()
    /**
	 * Initialises object
     */
	{
	} //---- End of constructor
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
        /*$vars = get_object_vars($this);
        
        foreach($vars as $key => $var)
        {
          //  unset($this->{$key});
        }
        
        unset($vars);   */    
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods

    public function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 */
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
    d�but                : |DATE|
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
    protected function __construct()
	/**
	 * instanciates an AbstractSingleton (for overwriting only).
	 *
	 */
    {
    } //---- End of __construct
	 
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
	} //----- End of Destructor

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
    }

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods
	
    protected static function getThis ( $class )
	/**
	 * Gets a unique instance of class $class.
	 * Create it if it doesn't exist.
	 *
	 * @param $class the name of the class to be instancied or gotten
	 *
	 * @return unique instance of class $class
	 *
	 */
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
    
    public function GetMessage( )
	/**
	 * Gets message associated to the error.
	 *
	 * @return The message associated to the error
	 *
     */
    {
        return $this->erreurString;
    }
    
    public function GetCode( )
	/**
	 * Gets code associated to the error.
	 *
	 * @return The code associated to the error
	 *
     */
    {
        return $this->erreurCode;
    }

//---------------------------------------------- Constructors - destructor
    public function __construct( $code, $str )
    /**
	 * Initialises an Error object from a $code and a message $str.
	 *
	 * @param $code The error code
	 * @param $str The message associated to the error
	 *
     */
    {
		parent::__construct();
	
        $this->erreurCode = $code;
        $this->erreurString = $str;
    } //---- End of constructor
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods
    public function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
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
    d�but                : |DATE|
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
    public function Add( Error $item )
    /**
	 * Adds an Error to the Sites if it is different than NULL.
	 * Error-s are indexed by their code.
     *
     * @param $item the Error to add 
     *
     */
    {
		if ( $item == NULL ) return;
		
        $this->errors[ $item->getCode( ) ] = $item;
    } //---- End of Add

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset($this->errors);
        
        $this->errors = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $this->errors );
    } //---- End of GetCount
    
//--------------------------------------------- Iterator's implementation
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->errors );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $this->errors );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return $this->current( )->getCode( );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->errors );
    } //---- End of Next
    
    public function Valid( )
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    {
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    public function __construct( )
    /**
	 * Initialises Errors.
	 *
     */
    {
		parent::__construct();
	
    	$this->errors = array( );
    } //---- End of constructor


    public function __destruct ( )
	/**
	 * Destructs ressources allocated
	 */
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
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
 *
 */
//------------------------------------------------------------------------ 

class Application extends AbstractSingleton
{
//----------------------------------------------------------------- PUBLIC
	//Unix Time of Application start
	const SYSTEM_START_TIME = 'SYSTEM_START_TIME';

//--------------------------------------------------------- Public Methods
    // public function M�thode ( )
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
    // protected type M�thode ( );
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
 * It is a "call back" class that auto sets itself into Application unique
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
	
	
	/**
	 * callback function to be called by Application on ApplicationStart
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
	 * callback function to be called by Application on ApplicationEnd
	 *
	 * @param $applicationVars arguments passed by Application on function
	 * call - see Application class
	 *
	 * @see Application class
	 *
	 */
    abstract public function OnUnLoad ( $applicationVars );

//---------------------------------------------- Constructors - destructor
    protected function __construct()
	/**
	 * instanciates an AbstractSitePage (for overwriting only).
	 *
	 * ALL children MUST call parent::__construct()
	 *
	 * It initialises application for running as Web application on the base
	 * of this class child.
	 */
    {
		parent::__construct();
		
		$appl = Application::GetInstance ();

		$appl->OnApplicationStart ( array ( & $this, 'OnLoad' ), array() );
		$appl->OnApplicationEnd ( array ( & $this, 'OnUnLoad' ), array() );

		$appl->Start();

		unset ( $appl );
		
		$this->Process();
    } //---- End of __construct
	 
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{	
		parent::__destruct();
	} //----- End of Destructor

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
    }

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions




/*************************************************************************
                           |SessionError.php|
                             -------------------
    d�but                : |DATE|
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
                           |Session.php|  -  description
                             -------------------
    d�but                : |09.02.2006|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Session> (fichier Session.php) --------------
if (defined('SESSION_H'))
{
    return;
}
else
{

}
define('SESSION_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <Session>
//fournir une abstraction pour la gestion de session bas� sur le
//syst�me de gestion de session PHP.
//
//------------------------------------------------------------------------ 

class Session extends AbstractSingleton implements Iterator//, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
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
   
    public function Destruct( )
    // Mode d'emploi :
    //D�truit la session.
	//
    {
		session_destroy ( );
		
		unset ( $_SESSION );
		$_SESSION = array();
    } //---- Fin de Destruct 
	
    public function GetId( )
    // Mode d'emploi :
    //Permet de connaitre l'identifiant de la session.
	//
	// Retourne :
	//- l'identifiant de la session
	//
    {
		return session_id ( );
    } //---- Fin de GetId 
   
    public function SetId( $id )
    // Mode d'emploi :
    //Permet de mettre � jour l'identifiant de la session
	//
    {
		session_id ( $id );
    } //---- Fin de SetId

    public function IsSetVariable( $name )
    // Mode d'emploi :
    //Permet de connaitre si une variable de session existe ou non
    //
	// Retourne :
	//- vrai si la variable de session existe
	//- faux sinon
    {
		return isset( $_SESSION [ $name ] );
    } //---- Fin de IsSetVariable 
	
    public function UnSetVariable( $name )
    // Mode d'emploi :
    //Permet de connaitre si une variable de session existe ou non
    //
	// Retourne :
	//- un objet de type Errors en cas d'erreur
	//- true sinon
    {
		if ( ! $this->IsSetVariable ( $name ) )
		{
			$errors = new Errors();
			$errors->Add ( new SessionError ( SessionError::SESSION_VARIABLE_NOT_SET, 'Impossible de d�truire une variable non mise en place.' ) ) ;
			
			return $errors;
		}
		else
		{
			unset ( $_SESSION [ $name ] );
			
			return true;
		}
    } //---- Fin de UnSetVariable 

    
    public function SetVariable(  $name, $value )
    // Mode d'emploi :
    //Met � jour le contenu de la variable de session de nom $name avec le
	//contenu $value
	//
	// Contrat :
	//- $name ne peut etre uniquement num�rique ni un objet ni une ressource
    //
    {	
		$_SESSION [ $name ] = $value;
    } //---- Fin de SetVariable

    public function GetVariable( $name )
    // Mode d'emploi :
    //R�cup�re le contenu de la variable de session $name
	//
	// Retourne :
    //- un objet de type Errors en cas d'erreur
	//- le contenu de la variable de nom $name
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
    } //---- Fin de GetVariable

    public function DelAll( )
    // Mode d'emploi :
    //Remet � zero la liste des variables
    //
    {
        unset( $_SESSION );
        
        $_SESSION = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre de variables contenues dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $_SESSION );
    } //---- Fin de GetCount
    
//-----------------------------------------------Impl�mentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au d�but de la liste
    //
    {
        reset( $_SESSION );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'�l�ment actuel de la liste
    //
    {
        return current( $_SESSION );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le nom de la variable point�e par la liste
    //
    {
        return Key ( $_SESSION );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel �l�ment point�
    //
    {
        return next( $_SESSION );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'�l�ment est valide
    //
    {
        return Session::current( ) !== false;
    } //---- Fin de Valid

//------------------------------------ Fin de l'impl�mentation de Iterator

//-------------------------------------------- Constructeurs - destructeur
    protected function __construct( $sessId = '', $sessName = '' )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Session.
	//Si $sessId est fourni, celui-ci servira d'identifiant de session
	//Dans le cas contraire, l'identifiant sera celui r�cup�r� via Cookie, 
	//Get ou Post.
	//Enfin, si aucun n'est r�cup�r�, celui-ci sera g�n�r�.
	//
	//Si $sessName est fournit, celui est modifie le nom de la session.
	//
    // Contrat :
    //- l'instanciation doit s'effectuer avant toute sortie � l'�cran afin de 
	//que les entetes cookie soient correctement envoy�es.
	//- $sessName doit etre alphanumerique sinon le nom ne sera pas chang�
    {
		// nom de session
		if ( ereg ( '[a-zA-Z0-9]+', $sessName ) )
		{
			session_name ( $sessName );
		}
		
		// id de session
		if ( !empty( $sessId ) )
		{
			session_id( $sessId );
		}

		// start session
    	session_start( );
    } //---- Fin du constructeur

/*
    public function __destruct ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    } //---- Fin du destructeur*/

//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <Session>



/*************************************************************************
                           |BDDError.php|
                             -------------------
    d�but                : |DATE|
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

    public function IsValid (  )
    /**
	 * Checks if the BDDRecord is ready to be saved into DataBase.
	 * Uses the method Validate() to make the racord valid.
     *
     * @return - true if record is ready to be saved
	 * @return - false otherwise
     *
     */
	{
		return true;
	} //----- End of IsValid
	
    public function Validate (  )
    /**
	 * Tries to validate the BDDRecord in order to save it into DataBase.
     *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s)
     *
     */
    {
		$this->isValid = true;
	
		return NULL;
	} //----- End of Validate
	
    public function PropertyExists( $propertyName )
    /**
	 * Checks if the property $propertyName exists into the BDDRecord.
     *
	 * @param $propertyName the property name to check
	 *
     * @return - true if the property exists
	 * @return - false otherwise
     *
     */
    {
		return ( isset ( $this->row[ $propertyName ] ) );
    } //----- End of PropertyExists
	
    public function GetProperty( $propertyName )
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
	
    public function SetProperty( $propertyName , $propertyValue )
    /**
	 * Sets the property named $propertyName with value $propertyValue.
	 * If property doesn't exists, it is created.
     *
	 * @param $propertyName the property name to set value
	 * @param $propertyValue value to associate to property
     *
     */
    {
		$this->row [ $propertyName ] = $propertyValue;
		
		$this->isValid = false;
    } //----- End of SetProperty
	
	public function GetPropertyCount ( )
    /**
	 * Gets the number of properties of the object.
     *
	 * @return the number of properties of the object
     *
     */
	{
			return count ( $this->row );
	} //----- End of GetPropertyCount
	
//------------------------------------------- Implementation's of Iterator
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->row );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $this->row );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return key( $this->row );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->row );
    } //---- End of Next
    
    public function Valid( )
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    {
        return $this->current( ) !== false;
    } //---- End of Valid
//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    function __construct( $row = NULL )
    /**
	 * Initialises BDDRecord from an array $row.
	 * Sets IsValid to false.
	 *
	 * @param $row a database row array
	 *
     */
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
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods
    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
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

    public function Add( BDDRecord & $item )
    /**
	 * Adds a BDDRecord to the Iterator.
     *
     * @param $item the BDDRecord to add
     *
     */
    {
        $this->items[ ] = $item;
    } //---- End of Add

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset($this->items);
        
        $this->items = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $this->items );
    } //---- End of GetCount
    
//---------------------------------------------- Iterator's Implementation
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->items );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return @current( $this->items );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return key( $this->items );
    } //---- End of  Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->items );
    } //---- End of  Next
    
    public function Valid( )
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    {
        return $this->current( ) !== false;
    } //---- End of  Valid
//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    function __construct( )
    /**
	 * Initialises BDDRecordSet.
	 *
     */
    {
		parent::__construct();
		
		$this->items = array();
    } //---- End of constructor
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor

//---------------------------------------------------------- Magic Methods

    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    {
        return $this->GetCount().' entr�es'.var_dump($this->items);
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
    
	/*
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

    //public function TableExists ( $table );
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
    
	//public function TableDescription ( $table );
	/*
	 * Gets the description of the table named $table
	 *
	 * @param $table the name of the table to be describe
	 *
     * @return - a BDDRecordSet if table exists wich BDDRecord s describe a field of the table
	 * @return - an Errors object in case of error(s)
	 */
    
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
        if ( !$this->isConnected() )
        {
            $this->server = $server;
            
            return NULL;
        }
        else
        {
            // connexion non ferm�e
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'You cannot modify host address when connection is not closed.' ) );
                    
            return $errs;
        }
    } //----- End of SetServer
    
    public function GetServer ( )
    /**
     * Gets host address for connection.
     *
     * @return the host address
     *
     */
    {
        return $this->server;
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
        if ( !$this->isConnected() )
        {
            $this->username = $username;
            
            return NULL;
        }
        else
        {
            // connexion non ferm�e
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'You cannot modify username when connection is not closed.' ) );
            
            return $errs;
        }
    } //----- End of SetUsername
    
    public function GetUsername ( )
    /**
     * Gets the login used for connection.
     *
     * @return the login used
     *
     */
    {
        return $this->username;
    } //----- End of GetUsername
    
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
        if ( !$this->isConnected() )
        {
            $this->password = $password;
            
            return NULL;
        }
        else
        {
            // connexion non ferm�e
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'You cannot modify password when connection is not closed.' ) );
            
            return $errs;
        }
    } //----- End of SetPassword
    
    public function GetPassword ( )
    /**
     * Gets the password associated to the login used for connection.
     *
     * @return the password used
     *
     */
    {
        return $this->password;
    } //----- End of GetPassword
    
    //public function Open( $isPersistent );
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
    
    //public function SetDatabase( $database );
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
    
    //public function Query( $query );
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
    
    public function GetQueriesCount ( )
    /**
     * Gets the number of queries that has been successfully sent.
     *
     * @return the number of queries sent from the creation of the object
     *
     */
	{
		return $this->nombreRequetes;
	}
    
    //public function Close( );
    /**
     * Tries to close the connection
     *
     * @return - an Errors object in case of error(s)
     * @return - NULL if operation was successful
     *
     */
    
    //public function isConnected ( );
    /**
     * Checks whether connection is opened or closed
     *
     * @return - true if connection is active
     * @return - false if connection is closed
     *
     */
    
//---------------------------------------------- Constructors - destructor
    function __construct( $server = '' , $username = '' , $password = '' )
	/*
	 * initialises members of the object.
	 * interrupts script if DataBase is not supported.
	 *
	 * @param $server the host address
	 * @param $username the login to be used for connection
	 * @param $password the password associated to the login
	 *
	 */
	{
		parent::__construct( );	
            
		$this->connection = NULL;
		
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		
		$this->database = '';
		
		$this->nombreRequetes = 0;
	}
	 
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor
    
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

//---------------------------------------------- Constructors - destructor
    public function __construct( $table, BDDConnection $connection, & $errors )
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
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor
    
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
    
    public function TableExists ( $table )
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
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return BDDError::CONNECTION_NO_DB_SELECTED if No database is selected
	 * @return see MySQLConnection::Query
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
    
    public function SetDatabase( $database ) 
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
    
    public function Query( $query )
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
     * Tries to close the connection
     *
     * @return - NULL if operation was successful
     * @return - an Errors object in case of error(s) :
	 *
	 * @return BDDError::CONNECTION_CLOSED is connection is already closed
     *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/mysql-close.html
     */
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
    
    public function isConnected ( )
    /**
     * Checks whether connection is opened or closed
     *
     * @return - true if connection is active
     * @return - false if connection is closed
     *
     */
    {
        return ( $this->connection !== NULL && @mysql_stat ( $this->connection ) !== NULL );
    } //----- End of isConnected

//---------------------------------------------- Constructors - destructor
    public function __construct( $server = '' , $username = '' , $password = '' )
	/**
	 * initialises members of the object.
	 * interrupts script if DataBase is not supported.
	 *
	 * @param $server the host address
	 * @param $username the login to be used for connection
	 * @param $password the password associated to the login
	 *
	 */
    {
		parent::__construct( $server, $username, $password );

            if ( ! function_exists( 'mysql_connect' ) )
            {
                die('PHP does not support MySQL');
            }
    } //----- End of contructor
	 
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		$this->Close();
	
		parent::__destruct();
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic methods

    public function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
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
	
    public function Select ( $fields, $options )
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
	
    public function Insert ( BDDRecord $record )
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
	{
		$newRecord = $this->bDDRecordToTableRecord ( $record );
		unset( $record );
		
		$insertQuery  = 'INSERT INTO `'.$this->tableName.'` SET ';
		
		foreach ( $newRecord as $champ  => $value )
		{
			$insertQuery .= $champ.' = "'. $value .'", ';
		}
		
		$insertQuery = substr ( $insertQuery , 0 , -2 );
		
		return $this->bDDConnection->Query ( $insertQuery ) ;
	} //---- End of Insert
	
    public function Update ( BDDRecord $updatedRec, $clause )
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
	{
		$newRecord = $this->bDDRecordToTableRecord ( $updatedRec );
		unset( $updatedRec );
		
		$updateQuery  = 'UPDATE `'.$this->tableName.'` SET ';
		
		foreach ( $newRecord as $champ  => $value )
		{
			$updateQuery .= $champ.' = "'. $value .'", ';
		}
		
		$updateQuery = substr ( $updateQuery , 0 , -2 ) . $clause;
		
		return $this->bDDConnection->Query ( $updateQuery ) ;
	
	} //---- End of Update
	
    public function Delete ( $clauses )
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
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'` WHERE '.$clause );
	} //---- End of Delete

    public function Clear (  )
	/**
	 * Tries to delete all entries of the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/delete.html
	 *
     */
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'`' );
	} //---- End of Clear
	
    public function Drop (  )
	/**
	 * Tries to drop the table
	 *
	 * @return - see BDDConnectionInterface::Query
	 *
	 * @see http://dev.mysql.com/doc/refman/5.0/en/drop-table.html
	 *
     */
	{
		return $this->bDDConnection->Query ( 'DROP TABLE `'.$this->tableName.'`' );
	} //---- End of Drop
    
//---------------------------------------------- Constructors - destructor
    public function __construct( $table, MySQLConnection $connection, & $errors )
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
	{
		parent::__construct ( $table, $connection, $errors );
	} //---- End of constructor
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor
	
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

	protected function isValidProperty ( $property )
	/**
	 * Checks into table description if the property named $property
	 * exists as a field in table
	 *
	 * @return true if property exists
	 * @return false otherwise
	 *
     */
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
	
	protected function bDDRecordToTableRecord ( BDDRecord $record )
	/**
	 * Computes conversion from a standard BDDRecord to a safe BDDRecord
	 * for MySQL queries. It also computes an intersection between 
	 * table fields and BDDRecord properties.
	 *
	 * @return a BDDRecord ready to be saved/updated into table
	 *
     */
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

    public static function BuildTag ( $tagName )
    /**
     * builds a Tag from TAG_OPEN, $tagName and TAG_CLOSE
     *
	 * @param $tagName the name of the tag to be generated
	 *
     * @return the valid tag built for $tagName with TAG_OPEN and TAG_CLOSE chars
	 */
    {
        return self::TAG_OPEN. $tagName. self::TAG_CLOSE;
    } //----- End of BuildTag
    
    public function SetSkeleton ( $skeleton )
    /**
     * Sets page skeleton to $skeleton.
     * the skeleton may has the [TAG] you'll set.
	 *
	 * @param $skeleton the skeleton to be set
	 *
	 */
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
    
    public function SetTag ( $tagName , Template & $value )
    /**
     * Assigns sub-Template $value to the tag named $tagName.
     * The skeleton you've set may contain the tag named $tag
	 *
	 * @param $tagName the name of the tag to be set
	 * @param $value the sub-Template to assign to tag
	 *
	 */
    {
        $this->tags[ $this->BuildTag ( $tagName ) ] = $value;
    } //----- End of SetTag
    
    public function GetTag ( $tagName )
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
    
    public function AddToTag ( $tagName, $value )
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
    
    public function TagExists ( $tagName )
    /**
     * Checks if the tag named $tagName exist or not.
	 *
	 * @param $tagName the name of the tag to be checked
	 *
	 * @return true if tag exists
	 * @return false otherwise
	 *
	 */
    {
        return isset ( $this->tags[ Template::BuildTag( $tagName ) ] );
    } //----- End of TagExists
    
    public function Generate( )
    /**
     * Generates a printable version of object for final print out.
	 * It replaces each tag by it's Template Generated value.
	 * So it generate final document by hierarchy.
	 *
	 * @return printable version of document
	 *
	 */
    {
		$generated = $this->skeleton;

		foreach ( $this->tags as $tag => $value )
		// replace tags by value, generated by subtemplates...
		{
			// generation by hierarchy
			$generated = str_replace ( $tag, $value->Generate(), $generated );
		}
	
        return $generated;
    } //----- End of Generate
    
//-------------------------------------------- Constructors - destructors
    public function __construct( )
	/**
	 * instanciates a Template.
	 *
	 */
    {
		parent::__construct();
	
        $this->tags = array();
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

	/** Skeleton of the page, places sub-Template-s by [tags-name] */
    protected $skeleton;
	
	/** Array of Template-s indexed by tag name */
    protected $tags;
}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |XHTMLTemplate.php|
                             -------------------
    d�but                : |11.02.2006|
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
	
    public function AddContent ( $content )
    /**
     * Adds raw XHTML $content to the current content of the body.
	 * Content of the page is value associated to the tag named TAG_CONTENT.
	 *
	 * Raw XHML $content may be valid.
     *
	 * @param $content the raw XHTML to be added
	 *
	 */
    {
		$this->AddToTag ( self::TAG_CONTENT, $content );
    } //----- End of AddContent
	
    public function SetContent ( $content )
    /**
     * Sets raw XHTML $content as the current content of the body.
	 * Content of the page is value associated to the tag named TAG_CONTENT.
	 *
	 * Raw XHML $content may be valid.
     *
	 * @param $content the raw XHTML to be set
	 *
	 */
    {
		$temp = new Template ();
		$temp->SetSkeleton ( $content );
		
        $this->SetTag ( self::TAG_CONTENT, $temp );
    } //----- End of SetContent
	
    public function AddParams ( $params )
    /**
     * Adds raw XHTML $params to the current parameters of the body XHTML tag.
	 * Parameters of the body tag is value associated to the tag named TAG_PARAMS.
	 *
	 * Raw XHML $params may be valid.
     *
	 * @param $params the raw XHTML to be added
	 *
	 */
    {
		$this->AddToTag ( self::TAG_PARAMS, $params );
    } //----- End of AddParams
	
    public function SetParams ( $params )
    /**
     * Sets raw XHTML $params as the current parameters of the body XHTML tag.
	 * Parameters of the body tag is value associated to the tag named TAG_PARAMS.
	 *
	 * Raw XHML $params may be valid.
     *
	 * @param $params the raw XHTML to be set
	 *
	 */
    {
		$temp = new Template ();
		$temp->SetSkeleton ( $content );
		
        $this->SetTag ( self::TAG_PARAMS, $temp );
    } //----- End of SetParams

//---------------------------------------------- Constructors - destructor
	function __construct () 
	/**
	 * instanciates a XHTMLBodyTemplate.
	 * Sets a default skeleton and initialises XHTMLTemplates for tags
	 * named TAG_CONTENT and TAG_PARAMS
	 *
	 */
	{
		parent::__construct();
		
		$this->SetSkeleton(
'<body '. Template::BuildTag( self::TAG_PARAMS ) .'>
'. Template::BuildTag( self::TAG_CONTENT ).'
</body>');

		$this->SetTag ( self::TAG_CONTENT, new XHTMLTemplate() ); 
		$this->SetTag ( self::TAG_PARAMS, new XHTMLTemplate() ); 

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
    d�but                : |11.02.2006|
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
	
    public function AddHeaders ( $headers )
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
    {
		$this->AddToTag ( self::TAG_HEADERS, $headers . self::NEWLINE );
    } //----- End of AddHeaders
	
    public function SetHeaders ( $headers )
	/**
     * Sets raw XHTML $headers as the current headers.
	 * Headers of the heads is value associated to the tag TAG_HEADERS.
	 *
	 * Raw XHTML may be correct.
	 *
	 * @param $headers The raw XHTML header(s) to be set.
	 */
    {
		$temp = new Template ();
		$temp->SetSkeleton ( $headers );
		
        $this->SetTag ( self::TAG_HEADERS, $temp );
    } //----- End of SetHeaders

//-------------------------------------------- Constructeurs - destructeur
	function __construct () 
	/**
	 * instanciates a XHTMLHeadersTemplate.
	 * Sets a default skeleton for head tag.
	 * Initialises XHTMLTemplate for the raw headers.
	 *
	 */
	{
		parent::__construct();
		
		$this->SetSkeleton ( 
'<head>

'. Template::BuildTag( self::TAG_HEADERS ) .'
</head>'	);

		$this->SetTag ( self::TAG_HEADERS, new XHTMLTemplate() ); 

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
                           |XHTMLPageTemplate.php|
                             -------------------
    d�but                : |11.02.2006|
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
    
    public static function ConvertIntoSGML( $source )
    /**
     * Converts $source string into valid SGML string char by char.
	 *
	 * @param $source The source string to be converted
	 *
	 * @return the valid SGML string that correspond to $source string
	 *
	 */
    {
        $newString = '';
        
        for($i = 0; $i < strlen($source); $i++) {
            $o = ord($source{$i});
            
            $newString .= (($o > 127)?'&#'.$o.';':$source{$i});
        }
        
        return $newString;
    } //----- End of ConvertIntoSGML
	
    public function GetBody ( )
    /**
     * Gets the XHTMLHeadersTemplate that corresponds to body tag named 
	 * TAG_BODY.
	 *
	 * @return the XHTMLHeadersTemplate object that corresponds to head 
	 * tag named TAG_HEADERS.
	 *
	 */
    {
        return $this->GetTag ( self::TAG_BODY );
    } //----- End of GetBody
	
    public function GetHeaders ( )
    /**
     * Gets the XHTMLHeadersTemplate that corresponds to TAG_HEADERS tag of the page.
	 *
	 * @return the XHTMLHeadersTemplate object that corresponds to TAG_HEADERS tag of the page.
	 *
	 */
    {
        return $this->GetTag ( self::TAG_HEADERS );
    } //----- End of GetHeaders

	
	public function Generate ( )
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
	{
		return self::ConvertIntoSGML ( parent::Generate() );
	} //------ End of Generate

//-------------------------------------------- Constructeurs - destructeur
	function __construct () 
	/**
	 * instanciates a XHTMLPageTemplate.
	 * Sets a default skeleton for valid XHTML1.1.
	 * Initialises XHTMLBodyTemplate for the body tag named TAG_BODY
	 * Initialises XHTMLHeadersTemplate for the head tag named TAG_HEADERS
	 *
	 */
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
                           |XHTMLSitePage.php|  -  description
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Interface of <XHTMLSitePage> class (file XHTMLSitePage.php) -----------------
if (defined('XHTMLSITEPAGE_H'))
{
    return;
}
else
{

}
define('XHTMLSITEPAGE_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Role of <XHTMLSitePage> class
//
//
//------------------------------------------------------------------------ 

class XHTMLSitePage extends AbstractSitePage
{
//----------------------------------------------------------------- PUBLIC
	const TAG_EXECUTION_TIME = 'EXECTIME'; // tag for execution time disp.

//--------------------------------------------------------- Public Methods
    // public function M�thode ( )
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
		$this->pageTemplate = new XHTMLPageTemplate () ;	
	} //---- End of OnLoad
	
    public function Process ( )
    // User's manual :
    //all processes of the page.
	//called after ApplicationStart / OnStart.
	//
    // Contract :
    //
	{
	} //---- End of Process
	
    public function OnUnLoad ( $applicationVars )
    // User's manual :
    //function to be called on ApplicationEnd
	//
    // Contract :
    //
	{
		$exectime = new Template();
		$exectime->SetSkeleton ( round( microtime(true) - $applicationVars[ Application::SYSTEM_START_TIME ], 4 ) );

		$this->pageTemplate->GetBody()->SetTag( self::TAG_EXECUTION_TIME, $exectime );
			
		echo $this->pageTemplate;
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
		parent::__destruct();
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
    // protected type M�thode ( );
    // User's manual :
    //
    // Contract :
    //

//--------------------------------------------------- protected properties

	protected $pageTemplate; // XHTML Page Template
}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |WebSitePage.php|  -  description
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Interface of <WebSitePage> class (file WebSitePage.php) -----------------
if (defined('WEBSITEPAGE_H'))
{
    return;
}
else
{

}
define('WEBSITEPAGE_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Role of <WebSitePage> class
//
//
//------------------------------------------------------------------------ 

class WebSitePage extends XHTMLSitePage
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- Public Methods
    // public function M�thode ( )
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
		foreach ( $GLOBALS[ DB_ARRAY_INDEX ] as $key => $db )
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
		
		$className = $GLOBALS[ DB_ARRAY_INDEX ][ MYSQL_CONF_BASE ][ 'type' ].'TableVariable';
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
    // protected type M�thode ( );
    // User's manual :
    //
    // Contract :
    //

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |GroupError.php|
                             -------------------
    d�but                : |DATE|
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
                           |TableGroupInterface.php|  -  description
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableGroupInterface> (fichier TableGroupInterface.php) --------------
if (defined('TABLEGROUPINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEGROUPINTERFACE_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <TableGroupInterface>
//
//
//------------------------------------------------------------------------ 

interface TableGroupInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectGroups ();
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des groupes.
	//
    // Renvoie :
	//- l'ensemble des groupes sous forme d'objets Group dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectGroupByIdGroup ( $idGroup );
    // Mode d'emploi :
	//permet de s�lectionner le group d'id $idGroup.
	//
	// Renvoie :
    //- l'ensemble des groupes d'id $idGroup dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function FindGroupsByName ( $groupName );
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des groupes de nom $groupname.
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des groups de nom $groupName dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateGroupByIdGroup ( Group $new );
    // Mode d'emploi :
	//permet de mettre � jour une groupe en fonction de sa propri�t�
	// TABLE_COLUMN_IDGROUP
	//
	// Renvoie :
    //- NULL en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertGroup ( Group $group );
    // Mode d'emploi :
	//permet d'ajouter un nouveau groupe � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de r�ussite.
	//
	// Contrat :
	
	public function IdGroupExists ( $idGroup );
    // Mode d'emploi :
	//permet de connaitre si l'$idGroup existe dans la table
	//
	// Renvoie :
	//- true si $idGroup est pr�sent,
	//- false sinon.
	//
	// Contrat :
    

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <TableGroupInterface>



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

    public function Validate ( $siteTable )
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

    function __construct( BDDRecord $newRec )
    /**
	 * Initialises Site from the BDDRecord $newRec.
	 * If $newRec is NULL, Group is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
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
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods
    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 */
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
    d�but                : |DATE|
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
	
	public function GetGroupByIdGroup ( $idGroup )
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
	
	public function GetGroupByName ( $nameGroup )
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
	
	public function SetGroup ( Group $group )
    /**
	 * Adds a Group to the Groups if it is different than NULL.
	 * Alias of Groups::Add()
     *
     * @param $group the Group to add
     *
     */
	{

		$this->Add ( $group );

	} //---- End of SetGroup
	
//---------------------------------------------- Iterator's Implementation

    public function Add( Group $item )
    /**
	 * Adds a Group to the Groups if it is different than NULL.
	 * Group-s are indexed by TableGroup::TABLE_COLUMN_IDGROUP if possible.
     *
     * @param $item the Group to add
     *
     */
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

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset($this->groups);
        
        $this->groups = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $this->groups );
    } //---- End of GetCount
    
//---------------------------------------------- Iterator's Implementation
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->groups );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $this->groups );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return Key ( $this->groups );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->groups );
    } //---- End of Next
    
    public function Valid( )
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    {
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    public function __construct( BDDRecordSet $groups )
    /**
	 * Initialises Groups from a BDDRecordSet.
	 *
     */
    {
		parent::__construct();
	
		$this->groups = array();
		
		foreach ( $groups as $group )
		{
			$this->Add( new Group ( $group ) );
		}		
    } //---- End of constructor


    public function __destruct ( )
	/**
	 * Destructs ressources allocated
	 */
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
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

    public function SaveGroups ( Groups $groups )
    // Mode d'emploi :
    //met � jour les �l�ments Valides de la liste
	//les ajoute si l'IdGroup est inexistant
	//
	// Renvoie :
	//- NULL en cas de r�ussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un �l�ment n'est pas valid�
	//elle n'en tient simplement pas compte dans son traitement.
	//
    // Contrat :
    //
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

	public function SelectGroups ()
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des utilisateurs.
	//
    // Renvoie :
	//- l'ensemble des groupes sous forme d'objets Group dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
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
	
	
	public function SelectGroupByIdGroup ( $idGroup )
    // Mode d'emploi :
	//permet de s�lectionner le groupe d'id $idGroup.
	//
	// Renvoie :
    //- l'groups d'id $idGroup dans un objet de type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
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
	
	
	public function SelectGroupsByIdSite ( $idSite )
    // Mode d'emploi :
	//permet de s�lectionner les groupes appartenant au site d'id $idSite.
	//
	// Renvoie :
    //- le groupes d'idSite $idSite dans un objet de type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
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
	
	public function FindGroupsByName ( $groupName )
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des groupes de nom $groupName.
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des groupes de nom $groupname dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
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
	
	public function UpdateGroupByIdGroup ( Group $new )
    // Mode d'emploi :
	//permet de mettre � jour une group en fonction de sa propri�t�
	// TABLE_COLUMN_IDGROUP (clef primaire)
	//
	// Renvoie :
    //- NULL en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Group non valid�, merci de le valider avant de lancer une mise � jour') ) ;
			
			return $errors;
		}

		// record valid�, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableGroup::TABLE_COLUMN_IDGROUP . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP ) );
		
		if ( ! ($res = $this->IdGroupExists( intval ($new->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre � jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- End of UpdateGroupByIdGroup
	
	public function InsertGroup ( Group $group )
    // Mode d'emploi :
	//permet d'ajouter un nouvel group � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de r�ussite.
	//
	// Contrat :
	{
		return $this->Insert ( $group );
	} //---- End of InsertGroup
	
	public function IdGroupExists ( $idGroup )
    // Mode d'emploi :
	//permet de connaitre si l'$idGroup existe dans la table
	//
	// Renvoie :
	//- true si $idGroup est pr�sent,
	//- false sinon.
	//
	// Contrat :
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableGroup::TABLE_COLUMN_IDGROUP . MySQLTable::MYSQL_SEEK_STRICT . intval( $idGroup );
		
		$res = $this->Select( TableGroup::TABLE_COLUMN_IDGROUP, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	}
	
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
    d�but                : |DATE|
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
                           |TableUserInterface.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableUserInterface> (fichier TableUserInterface.php) --------------
if (defined('TABLEUSERINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEUSERINTERFACE_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <TableUserInterface>
//
//
//------------------------------------------------------------------------ 

interface TableUserInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectUsers ();
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des users.
	//
    // Renvoie :
	//- l'ensemble des users sous forme d'objets User dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectUserByIdUser ( $idUser );
    // Mode d'emploi :
	//permet de s�lectionner le user d'id $idUser.
	//
	// Renvoie :
    //- l'ensemble des users d'id $idUser dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function SelectUsersByIdGroup ( $idGroup );
    // Mode d'emploi :
	//permet de s�lectionner les utilisateurs appartenant au groupe d'id $idGroup.
	//
	// Renvoie :
    //- l'ensemble des utilisateurs appartenant au groupe d'id $idGroup dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	
	public function FindUsersByName ( $userName );
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des users de nom $username.
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des users de nom $username dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateUserByIdUser ( User $new );
    // Mode d'emploi :
	//permet de mettre � jour une user en fonction de sa propri�t�
	// TABLE_COLUMN_IDUSER
	//
	// Renvoie :
    //- NULL en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertUser ( User $user );
    // Mode d'emploi :
	//permet d'ajouter une nouvelle user � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de r�ussite.
	//
	// Contrat :
	
	public function IdUserExists ( $idUser );
    // Mode d'emploi :
	//permet de connaitre si l'$idUser existe dans la table
	//
	// Renvoie :
	//- true si $idUser est pr�sent,
	//- false sinon.
	//
	// Contrat :
    

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <TableUserInterface>



/*************************************************************************
                           |User.php|
                             -------------------
    d�but                : |DATE|
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

    function __construct( BDDRecord $newRec )
    /**
	 * Initialises User from the BDDRecord $newRec.
	 * If $newRec is NULL, User is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
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
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods
    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 */
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
	
	public function GetUserByIdUser ( $idUser )
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
	
	public function GetUserByName ( $nameUser )
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
	
	public function SetUser ( User $user )
    /**
	 * Adds a User to the Users if it is different than NULL.
	 * Alias of User::Add()
     *
     * @param $user the User to add
     *
     */
	{

		$this->Add ( $user );

	} //---- End of SetUser
	
//------------------------------------------- Impl�mentation de MyIterator

    public function Add( User $item )
    /**
	 * Adds a User to the Users if it is different than NULL.
	 * User-s are indexed by TableUser::TABLE_COLUMN_IDUSER if possible.
     *
     * @param $item the User to add
     *
     */
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

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset($this->users);
        
        $this->users = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $this->users );
    } //---- End of GetCount
    
//-----------------------------------------------Impl�mentation Iterator
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->users );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $this->users );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return Key ( $this->users );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->users );
    } //---- End of Next
    
    public function Valid( )
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    {
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    public function __construct( BDDRecordSet $users )
    /**
	 * Initialises Users from a BDDRecordSet.
	 *
     */
    {
		parent::__construct();
		
		$this->users = array();
		
		foreach ( $users as $user )
		{
			$this->Add( new User ( $user ) );
		}		
    } //---- End of constructor


    public function __destruct ( )
	/**
	 * Destructs ressources allocated
	 */
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
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
                           |MySQLTableUser.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLTableUser> (fichier MySQLTableUser.php) --------------
if (defined('MYSQLTABLEUSER_H'))
{
    return;
}
else
{

}
define('MYSQLTABLEUSER_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <MySQLTableUser>
//
//
//------------------------------------------------------------------------ 

class MySQLTableUser extends MySQLTable implements TableUserInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveUsers ( Users $users )
    // Mode d'emploi :
    //met � jour les �l�ments Valides de la liste
	//les ajoute si l'IdUser est inexistant
	//
	// Renvoie :
	//- NULL en cas de r�ussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un �l�ment n'est pas valid�
	//elle n'en tient simplement pas compte dans son traitement.
	//
    // Contrat :
    //
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
	} //---- Fin de SaveUsers

	public function SelectUsers ()
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des utilisateurs.
	//
    // Renvoie :
	//- l'ensemble des users sous forme d'objets User dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
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
	} //---- Fin de SelectUsers
	
	
	public function SelectUserByIdUser ( $idUser )
    // Mode d'emploi :
	//permet de s�lectionner l'utilisateur d'id $idUser.
	//
	// Renvoie :
    //- l'users d'id $idUser dans un objet de type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
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
	} //---- Fin de SelectUserByIdUser
	
	public function SelectUsersByIdGroup ( $idGroup )
    // Mode d'emploi :
	//permet de s�lectionner les utilisateurs appartenant au groupe d'id $idGroup.
	//
	// Renvoie :
    //- l'ensemble des utilisateurs appartenant au groupe d'id $idGroup dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
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
	} //---- Fin de SelectUsersByIdGroup
	
	public function FindUsersByName ( $userName )
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des users de nom $userName.
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des users de nom $username dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
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
	} //---- Fin de FindUsersByName
	
	public function UpdateUserByIdUser ( User $new )
    // Mode d'emploi :
	//permet de mettre � jour une user en fonction de sa propri�t�
	// TABLE_COLUMN_IDUSER (clef primaire)
	//
	// Renvoie :
    //- NULL en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de User non valid�, merci de le valider avant de lancer une mise � jour') ) ;
			
			return $errors;
		}

		// record valid�, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableUser::TABLE_COLUMN_IDUSER . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableUser::TABLE_COLUMN_IDUSER ) );
		
		if ( ! ($res = $this->IdUserExists( intval ($new->GetProperty ( TableUser::TABLE_COLUMN_IDUSER ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre � jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- Fin de UpdateUserByIdUser
	
	public function InsertUser ( User $user )
    // Mode d'emploi :
	//permet d'ajouter un nouvel user � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de r�ussite.
	//
	// Contrat :
	{
		return $this->Insert ( $user );
	} //---- Fin de InsertUser
	
	public function IdUserExists ( $idUser )
    // Mode d'emploi :
	//permet de connaitre si l'$idUser existe dans la table
	//
	// Renvoie :
	//- true si $idUser est pr�sent,
	//- false sinon.
	//
	// Contrat :
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableUser::TABLE_COLUMN_IDUSER . MySQLTable::MYSQL_SEEK_STRICT . intval( $idUser );
		
		$res = $this->Select( TableUser::TABLE_COLUMN_IDUSER, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	} //---- Fin de IdUserExists
	
//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <MySQLTableUser>



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
                           |TableVariableInterface.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableVariableInterface> (fichier TableVariableInterface.php) --------------
if (defined('TABLEVARIABLEINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEVARIABLEINTERFACE_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <TableVariableInterface>
//
//
//------------------------------------------------------------------------ 

interface TableVariableInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectServerVariables ();
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des variables de configuration li�es
	//au serveur.
	//
    // Renvoie :
	//- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SERVER
	//dans un objet de type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectSiteVariables ( $idsite );
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des variables de configuration li�es
	//� un site.
	//
	// Renvoie :
    //- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SITE
	//et de site n� $idsite en un objet de type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectVariablesByName ( $varName );
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des variables de nom $varname.
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des variables de nom $varname dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateVariableByIdVariable ( Variable $new );
    // Mode d'emploi :
	//permet de mettre � jour une variable en fonction de sa clef IdVariable
	//disponible en tant que propri�t� TABLE_COLUMN_IDVARIABLE
	//
	// Renvoie :
    //- NULL en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertVariable ( Variable $variable );
    // Mode d'emploi :
	//permet d'ajouter une nouvelle variable � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de r�ussite.
	//
	// Contrat :
	
	public function IdVariableExists ( $idVariable );
    // Mode d'emploi :
	//permet de connaitre si l'$idVariable existe dans la table
	//
	// Renvoie :
	//- true si $idVariable est pr�sent,
	//- false sinon.
	//
	// Contrat :
    

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <TableVariableInterface>



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
    public function Validate ( $siteTable )
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

    function __construct( BDDRecord $newRec )
    /**
	 * Initialises Variable from the BDDRecord $newRec.
	 * If $newRec is NULL, Variable is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
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
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods
    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 */
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
	
	public function GetVariableByName ( $varName )
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
	
	public function SetVariable ( Variable $variable )
    /**
	 * Adds a Variable to the Variables if it is different than NULL.
	 * Alias of Variables::Add()
     *
     * @param $variable the Variable to add
     *
     */
	{
		$this->Add ( $variable );
	} //---- End of SetVariable
	
//------------------------------------------- Impl�mentation de MyIterator

    public function Add( Variable $item )
    /**
	 * Adds a Variable to the Variables if it is different than NULL.
	 * Variable-s are indexed by TableVariable::TABLE_COLUMN_NAME if possible.
     *
     * @param $item the Variable to add
     *
     */
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

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset($this->variables);
        
        $this->variables = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $this->variables );
    } //---- End of GetCount
    
//---------------------------------------------- Iterator's Implementation
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->variables );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $this->variables );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return Key ( $this->variables );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->variables );
    } //---- End of Next
    
    public function Valid( )
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    {
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    public function __construct( BDDRecordSet $variables )
    /**
	 * Initialises Variables from a BDDRecordSet.
	 *
     */
    {
		parent::__construct();
		
		$this->variables = array();
		
		foreach ( $variables as $variable )
		{
			$this->Add( new Variable ( $variable ) );
		}		
    } //---- End of constructor


    public function __destruct ( )
	/**
	 * Destructs ressources allocated
	 */
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
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
                           |MySQLTableVariable.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLTableVariable> (fichier MySQLTableVariable.php) --------------
if (defined('MYSQLTABLEVARIABLE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLEVARIABLE_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <MySQLTableVariable>
//
//
//------------------------------------------------------------------------ 

class MySQLTableVariable extends MySQLTable implements TableVariableInterface
{
//----------------------------------------------------------------- PUBLIC	

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveVariables ( Variables $variables )
    // Mode d'emploi :
    //met � jour les �l�ments Valides de la liste
	//les ajoute si l'IdVariable est inexistant
	//
	// Renvoie :
	//- NULL en cas de r�ussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un �l�ment n'est pas valid�
	//elle n'en tient simplement pas compte dans son traitement.
	//
    // Contrat :
    //
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
	} //---- Fin de SaveVariables
	
	public function SelectServerVariables ()
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des variables de configuration li�es
	//au serveur.
	//
    // Renvoie :
	//- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SERVER
	//dans un objet de type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
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
	} //---- Fin de SelectServerVariable
	
	public function SelectSiteVariables ( $idsite )
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des variables de configuration li�es
	//� un site.
	//
	// Renvoie :
    //- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SITE
	//et de site n� $idsite en un objet de type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		$result = $this->Select (	MySQLTABLE::TABLE_COLUMN_ALL ,
									MySQLTABLE::MYSQL_CLAUSE_WHERE.
											TableVariable::TABLE_COLUMN_SCOPE.MySQLTABLE::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR.TableVariable::TABLE_COLUMN_SCOPE_SITE . MySQLTABLE::MYSQL_SEEK_SEPARATOR .
									MySQLTABLE::MYSQL_CLAUSE_AND.
											TableVariable::TABLE_COLUMN_IDSITE.MySQLTABLE::MYSQL_SEEK_STRICT.MySQLTABLE::MYSQL_SEEK_SEPARATOR.$idsite.MySQLTABLE::MYSQL_SEEK_SEPARATOR
					);
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Variables ( $result );
		}
	} //---- Fin de SelectSiteVariable
	
	public function SelectVariablesByName ( $varName )
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des variables de nom $varname.
	//Il est possible ici d'utiliser les caract�res magiques MYSQL_SEEK_MULTICHARS et MYSQL_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des variables de nom $varname dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
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
	} //---- Fin de SelectVariablesByName
	
	public function UpdateVariableByIdVariable ( Variable $new )
    // Mode d'emploi :
	//permet de mettre � jour une variable en fonction de sa clef IdVariable
	//disponible en tant que propri�t� TABLE_COLUMN_IDVARIABLE
	//
	// Renvoie :
    //- un objet de type BDDRecordSet en cas de r�ussite
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Variable non valid�, merci de le valider avant de lancer une mise � jour') ) ;
			
			return $errors;
		}

		// record valid�, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableVariable::TABLE_COLUMN_IDVARIABLE . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE ) );
		
		if ( ! ($res = $this->IdVariableExists( intval ($new->GetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre � jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- Fin de UpdateVariableByIdVariable
	
	public function InsertVariable ( Variable $variable )
    // Mode d'emploi :
	//permet d'ajouter une nouvelle variable � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- un objet de type BDDRecordSet en cas de r�ussite.
	//
	// Contrat :
	{
		return $this->Insert ( $variable );
	} //---- Fin de InsertVariable
	
	public function IdVariableExists ( $idVariable )
    // Mode d'emploi :
	//permet de connaitre si l'$idVariable existe dans la table
	//
	// Renvoie :
	//- true si $idVariable est pr�sent,
	//- false sinon.
	//
	// Contrat :
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableVariable::TABLE_COLUMN_IDVARIABLE . MySQLTABLE::MYSQL_SEEK_SEPARATOR . MySQLTable::MYSQL_SEEK_STRICT . intval( $idVariable ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR;
		
		$res = $this->Select( TableVariable::TABLE_COLUMN_IDVARIABLE, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	}
	
//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <MySQLTableVariable>



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
    d�but                : |DATE|
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
                           |TableSiteInterface.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableSiteInterface> (fichier TableSiteInterface.php) --------------
if (defined('TABLESITEINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLESITEINTERFACE_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <TableSiteInterface>
//
//
//------------------------------------------------------------------------ 

interface TableSiteInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectSites ();
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des sites.
	//
    // Renvoie :
	//- l'ensemble des sites sous forme d'objets Site dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectSiteByIdSite ( $idSite );
    // Mode d'emploi :
	//permet de s�lectionner le site d'id $idSite.
	//
	// Renvoie :
    //- l'ensemble des sites d'id $idSite dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function FindSitesByName ( $siteName );
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des sites de nom $sitename.
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des sites de nom $sitename dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateSiteByIdSite ( Site $new );
    // Mode d'emploi :
	//permet de mettre � jour une site en fonction de sa propri�t�
	// TABLE_COLUMN_IDSITE
	//
	// Renvoie :
    //- NULL en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertSite ( Site $site );
    // Mode d'emploi :
	//permet d'ajouter une nouvelle site � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de r�ussite.
	//
	// Contrat :
	
	public function IdSiteExists ( $idSite );
    // Mode d'emploi :
	//permet de connaitre si l'$idSite existe dans la table
	//
	// Renvoie :
	//- true si $idSite est pr�sent,
	//- false sinon.
	//
	// Contrat :
    

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <TableSiteInterface>



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

    public function Validate (  )
    /**
	 * Tries to validate the Site in order to save it into DataBase.
	 *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return SiteError::SITE_NAME_EMPTY if property 
	 * TableSite::TABLE_COLUMN_NAME is empty
     */
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

    function __construct( BDDRecord $newRec )
    /**
	 * Initialises Site from the BDDRecord $newRec.
	 * If $newRec is NULL, Variable is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
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
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods
    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 */
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
	
	public function GetSiteByIdSite ( $idSite )
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
	
	public function GetSiteByName ( $nameSite )
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
	
	public function SetSite ( Site $site )
    /**
	 * Adds a Site to the Sites if it is different than NULL.
	 * Alias of Site::Add()
     *
     * @param $site the Site to add
     *
     */
	{
		$this->Add ( $site );
	} //---- End of SetSite
	
//------------------------------------------- Impl�mentation de MyIterator

    public function Add( Site $item )
    /**
	 * Adds a Site to the Sites if it is different than NULL.
	 * Site-s are indexed by TableSite::TABLE_COLUMN_IDSITE if possible.
     *
     * @param $item the Site to add
     *
     */
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

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset($this->sites);
        
        $this->sites = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $this->sites );
    } //---- End of GetCount
    
//----------------------------------------------- Iterator's implementation
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->sites );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $this->sites );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return Key ( $this->sites );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->sites );
    } //---- End of Next
    
    public function Valid( )
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    {
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    public function __construct( BDDRecordSet $sites )
    /**
	 * Initialises Sites from a BDDRecordSet.
	 *
     */
    {
		parent::__construct();
	
		$this->sites = array();
		
		foreach ( $sites as $site )
		{
			$this->Add( new Site ( $site ) );
		}		
    } //---- End of constructor


    public function __destruct ( )
	/**
	 * Destructs ressources allocated
	 */
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
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
                           |MySQLTableSite.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLTableSite> (fichier MySQLTableSite.php) --------------
if (defined('MYSQLTABLESITE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLESITE_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <MySQLTableSite>
//
//
//------------------------------------------------------------------------ 

class MySQLTableSite extends MySQLTable implements TableSiteInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveSites ( Sites $sites )
    // Mode d'emploi :
    //met � jour les �l�ments Valides de la liste
	//les ajoute si l'IdSites est inexistant
	//
	// Renvoie :
	//- NULL en cas de r�ussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un �l�ment n'est pas valid�
	//elle n'en tient simplement pas compte dans son traitement.
	//
    // Contrat :
    //
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
	} //---- Fin de SaveSites

	public function SelectSites ()
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des sites.
	//
    // Renvoie :
	//- l'ensemble des sites sous forme d'objets Site dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
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
	} //---- Fin de SelectSites
	
	
	public function SelectSiteByIdSite ( $idSite )
    // Mode d'emploi :
	//permet de s�lectionner le site d'id $idSite.
	//
	// Renvoie :
    //- le site d'id $idSite dans un objet de type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
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
	} //---- Fin de SelectSiteByIdSite
	
	public function FindSitesByName ( $siteName )
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des sites de nom $siteName.
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des sites de nom $sitename dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
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
	} //---- Fin de FindSitesByName
	
	public function UpdateSiteByIdSite ( Site $new )
    // Mode d'emploi :
	//permet de mettre � jour une site en fonction de sa propri�t�
	// TABLE_COLUMN_IDSITE (clef primaire)
	//
	// Renvoie :
    //- NULL en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Site non valid�, merci de le valider avant de lancer une mise � jour') ) ;
			
			return $errors;
		}

		// record valid�, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableSite::TABLE_COLUMN_IDSITE . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableSite::TABLE_COLUMN_IDSITE ) );
		
		if ( ! ($res = $this->IdSiteExists( intval ($new->GetProperty ( TableSite::TABLE_COLUMN_IDSITE ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre � jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- Fin de UpdateSite
	
	public function InsertSite ( Site $site )
    // Mode d'emploi :
	//permet d'ajouter une nouvelle site � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de r�ussite.
	//
	// Contrat :
	{
		return $this->Insert ( $site );
	} //---- Fin de InsertSite
	
	public function IdSiteExists ( $idSite )
    // Mode d'emploi :
	//permet de connaitre si l'$idSite existe dans la table
	//
	// Renvoie :
	//- true si $idSite est pr�sent,
	//- false sinon.
	//
	// Contrat :
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableSite::TABLE_COLUMN_IDSITE . MySQLTable::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR . intval( $idSite ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR;
		
		$res = $this->Select( TableSite::TABLE_COLUMN_IDSITE, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	}
	
//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <MySQLTableSite>



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