<?php


/*************************************************************************
                           |AbstractIterator.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <AbstractIterator> (fichier AbstractIterator.php) --------------
if (defined('ABSTRACTITERATOR_H'))
{
    return;
}
else
{

}
define('ABSTRACTITERATOR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <AbstractIterator>
// Ajoute les méthodes nécessaires à l'itération
//
//------------------------------------------------------------------------ 

interface AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    //public function Add( AbstractClass $item );
    // Mode d'emploi :
    //Ajoute un ancrage locator à la liste

    public function DelAll( );
    // Mode d'emploi :
    //Remet à zero la liste des items
    //

    public function GetCount( );
    // Mode d'emploi :
    //retourne le nombre d'items contenus dans la liste
    //
    // Renvoie :
    //le nombre d'items contenus
    
//-------------------------------------------- Constructeurs - destructeur

//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 
    
//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <AbstractIterator>



/*************************************************************************
                           |AbstractClass.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <AbstractClass> (fichier AbstractClass.php) --------------
if (defined('ABSTRACTCLASS_H'))
{
    return;
}
else
{

}
define('ABSTRACTCLASS_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <AbstractClass>
//
//
//------------------------------------------------------------------------ 

abstract class AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    abstract public function __construct();
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //

    public function __destruct ( )
    // Mode d'emploi :
    //Libère l'espace mémoire des variables de la classe
    // Contrat :
    //
    {
        /*$vars = get_object_vars($this);
        
        foreach($vars as $key => $var)
        {
          //  unset($this->{$key});
        }
        
        unset($vars);   */     
    } //---- Fin du destructeur

//------------------------------------------------------ Méthodes Magiques

    public function __ToString ( )
    // Mode d'emploi :
    //Si non redéfinie, imprime un etat de l'objet
    //
    // Contrat :
    //
    {
        return (string)var_export($this);
    } // ENd of __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <AbstractClass>



/*************************************************************************
                           |AbstractSingleton.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <AbstractSingleton> (fichier AbstractSingleton.php) --------------
if (defined('ABSTRACTSINGLETON_H'))
{
    return;
}
else
{

}
define('ABSTRACTSINGLETON_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <AbstractSingleton>
//
//
//------------------------------------------------------------------------ 

abstract class AbstractSingleton
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
	abstract public static function GetInstance ( );
	// User's manual :
    //Getter of the unique instance. Create this if doesn't exist
	//Must call parent::getInstance( ) in the code with the given name
	//of the class : __CLASS__
	//
	//Must appears in all children.
	//
    // Contract :
    //
	//{
	//	return parent::getThis ( __CLASS__ );
	//}

//-------------------------------------------- Constructeurs - destructeur
    protected function __construct()
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
	{
	
	} // End of __construct

    public function __destruct ( )
    // Mode d'emploi :
    //Libère l'espace mémoire des variables de la classe
    // Contrat :
    //
    {
        /*$vars = get_object_vars($this);
        
        foreach($vars as $key => $var)
        {
          //  unset($this->{$key});
        }
        
        unset($vars);   */     
    } //---- Fin du destructeur

//------------------------------------------------------ Méthodes Magiques

    public function __ToString ( )
    // Mode d'emploi :
    //Si non redéfinie, imprime un etat de l'objet
    //
    // Contrat :
    //
    {
        return (string)var_export($this);
    } // End of __ToString
	
//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
    protected static function getThis ( $class )
    // User's manual :
    //Getter of the unique instance of the class named $class. 
	//Create this if doesn't exist
	//
    // Contract :
    //
	{
		if ( ! IsSet ( self::$instance ) )
		// instance creation
		{
			self::$instance = new $class();
		}
		
		return self::$instance;
	} // End of getThis

//----------------------------------------------------- Attributs protégés
	protected static $instance; // handler of instance
}

//-------------------------------- Autres définitions dépendantes de <AbstractSingleton>



/*************************************************************************
                           |Error.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Error> (fichier Error.php) --------------
if (defined('ERROR_H'))
{
    return;
}
else
{

}
define('ERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Error>
//Gestion d'une erreur avec un code et un message d'erreur associé
//
//------------------------------------------------------------------------ 

class Error extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    public function GetMessage( )
    // Mode d'emploi :
    //Retourne le message associé à l'erreur
    //
    // Algorithme : 
    //trivial
    {
        return $this->erreurString;
    }
    
    public function GetCode( )
    // Mode d'emploi :
    //Retourne le code associé à l'erreur
    //
    // Algorithme : 
    //trivial
    {
        return $this->erreurCode;
    }

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $code, $str )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
        $this->erreurCode = $code;
        $this->erreurString = $str;
    } //---- Fin du constructeur
    
//------------------------------------------------------ Méthodes Magiques
    public function __ToString ( )
    // Mode d'emploi :
    // permet l'affichage de l'erreur contenue.
    // Contrat :
    //
    {
        return $this->erreurString;
    } // Fin de __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
    protected $erreurCode;
    protected $erreurString;
}

//-------------------------------- Autres définitions dépendantes de <Error>



/*************************************************************************
                           |Errors.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Errors> (fichier Errors.php) --------------
if (defined('ERRORS_H'))
{
    return;
}
else
{

}
define('ERRORS_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Errors>
//Itérateur qui gère une liste d'erreurs de type Error ou descendant
//
//------------------------------------------------------------------------ 

class Errors extends AbstractClass implements Iterator, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //  

    public function Add( Error $newErr )
    // Mode d'emploi :
    //Ajoute une erreur à la liste
    //
    {
        $this->errors[ $newErr->getCode( ) ] = $newErr;
    } //---- Fin de Add

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des erreurs
    //
    {
        unset($this->errors);
        
        $this->errors = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre d'erreurs contenues dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $this->errors );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->errors );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->errors );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le code de l'erreur pointée par la liste
    //
    {
        return $this->current( )->getCode( );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->errors );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid
//---------------------------------------------Fin implémentation Iterator
    
//-------------------------------------------- Constructeurs - destructeur
    function __construct( )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
    	$this->errors = array( );
    } //---- Fin du constructeur

//------------------------------------------------------ Méthodes Magiques

    public function __ToString ()
    // Mode d'emploi :
    //Réalise une conversion des erreurs en String
    //
    // Algorithme : 
    //foreach( $this )
    {
        $str = '';
        
        foreach( $this as $code => $error )
        {
            $str .= $code . ' ' . $error->getMessage() . chr (10);
        }
        
        return $str;
    }

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
    protected $errors;
}

//-------------------------------- Autres définitions dépendantes de <Errors>



/*************************************************************************
                           |ApplicationError.php|  -  description
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Interface of <ApplicationError> class (file ApplicationError.php) -----------------
if (defined('APPLICATIONERROR_H'))
{
    return;
}
else
{

}
define('APPLICATIONERROR_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Role of <ApplicationError> class
//Extension of the Error class, implements constants for specific
//Application errors
//
//------------------------------------------------------------------------ 

class ApplicationError extends Error
{
//----------------------------------------------------------------- PUBLIC

	const FUNCTION_NOT_CALLABLE = 'FUNCTION_NOT_CALLABLE';
	const FUNCTION_PARAM_NOT_ARRAY = 'FUNCTION_PARAM_NOT_ARRAY';
	const CALLBACK_NOT_EXISTS = 'CALLBACK_NOT_EXISTS';
	const CALLBACK_NOT_SET = 'CALLBACK_NOT_SET';
	const ALREADY_STARTED = 'ALREADY_STARTED';

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//----------------------------------------------------- Attributs protégés

}

//----------------------------------------------------- Others definitions



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
		$this->configuration = new Variables ( null, $err);
		$this->started = false;
		
		$this->systemVars = array( );
	
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
	
	//configuration of the Application
	protected $configuration;
}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |AbstractSitePageError.php|  -  description
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Interface of <AbstractSitePageError> class (file AbstractSitePageError.php) -----------------
if (defined('ABSTRACTSITEPAGEERROR_H'))
{
    return;
}
else
{

}
define('ABSTRACTSITEPAGEERROR_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Role of <AbstractSitePageError> class
//Extension of the Error class, implements constants for specific
//Application errors
//
//------------------------------------------------------------------------ 

class AbstractSitePageError extends Error
{
//----------------------------------------------------------------- PUBLIC

	const FUNCTION_NOT_CALLABLE = 'FUNCTION_NOT_CALLABLE';
	const FUNCTION_PARAM_NOT_ARRAY = 'FUNCTION_PARAM_NOT_ARRAY';
	const CALLBACK_NOT_EXISTS = 'CALLBACK_NOT_EXISTS';

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//----------------------------------------------------- Attributs protégés

}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |AbstractSitePage.php|  -  description
                             -------------------
    start                : |10.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Interface of <AbstractSitePage> class (file AbstractSitePage.php) -----------------
if (defined('ABSTRACTSITEPAGE_H'))
{
    return;
}
else
{

}
define('ABSTRACTSITEPAGE_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Role of <AbstractSitePage> class
//
//
//------------------------------------------------------------------------ 

abstract class AbstractSitePage extends AbstractSingleton
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
	
    abstract public function OnLoad ( );
    // User's manual :
    //function to be called on ApplicationStart
	//
    // Contract :
    //
	
    abstract public function Process ( );
    // User's manual :
    //all processes of the page.
	//called after ApplicationStart / OnStart.
	//
    // Contract :
    //
	
    abstract public function OnUnLoad ( $applicationVars );
    // User's manual :
    //function to be called on ApplicationEnd
	//
    // Contract :
    //

//---------------------------------------------- Constructors - destructor
    protected function __construct()
    // User's manual :
    //Internal constructor that disable instanciation
    // Contract :
    //
    {
		$appl = Application::GetInstance ();

		$appl->OnApplicationStart ( array ( & $this, 'OnLoad' ), array() );
		$appl->OnApplicationEnd ( array ( & $this, 'OnUnLoad' ), array() );

		$appl->Start();

		unset ( $appl );
		
		$this->Process();
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



/*************************************************************************
                           |SessionError.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <SessionError> (fichier SessionError.php) --------------
if (defined('SESSIONERROR_H'))
{
    return;
}
else
{

}
define('SESSIONERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <SessionError>
// Extension de la classe Error, elle implémente les constantes spécifiques aux erreurs Session
//
//------------------------------------------------------------------------ 

class SessionError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const SESSION_VARIABLE_NOT_SET = 'SESSION_VARIABLE_NOT_SET';

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <SessionError>



/*************************************************************************
                           |Session.php|  -  description
                             -------------------
    début                : |09.02.2006|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Session>
//fournir une abstraction pour la gestion de session basé sur le
//système de gestion de session PHP.
//
//------------------------------------------------------------------------ 

class Session extends AbstractSingleton implements Iterator//, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
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
    //Détruit la session.
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
    //Permet de mettre à jour l'identifiant de la session
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
			$errors->Add ( new SessionError ( SessionError::SESSION_VARIABLE_NOT_SET, 'Impossible de détruire une variable non mise en place.' ) ) ;
			
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
    //Met à jour le contenu de la variable de session de nom $name avec le
	//contenu $value
	//
	// Contrat :
	//- $name ne peut etre uniquement numérique ni un objet ni une ressource
    //
    {	
		$_SESSION [ $name ] = $value;
    } //---- Fin de SetVariable

    public function GetVariable( $name )
    // Mode d'emploi :
    //Récupère le contenu de la variable de session $name
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
    //Remet à zero la liste des variables
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
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $_SESSION );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $_SESSION );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le nom de la variable pointée par la liste
    //
    {
        return Key ( $_SESSION );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $_SESSION );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid

//------------------------------------ Fin de l'implémentation de Iterator

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $sessId = '', $sessName = '' )
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
    //- l'instanciation doit s'effectuer avant toute sortie à l'écran afin de 
	//que les entetes cookie soient correctement envoyées.
	//- $sessName doit etre alphanumerique sinon le nom ne sera pas changé
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

//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <Session>



/*************************************************************************
                           |BDDError.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <BDDError> (fichier BDDError.php) --------------
if (defined('BDDERROR_H'))
{
    return;
}
else
{

}
define('BDDERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDError>
// Extension de la classe Error, elle implémente les constantes spécifiques aux erreurs bdd
//
//------------------------------------------------------------------------ 

class BDDError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const CONNECTION_NOT_CLOSED = 'CONNECTION_NOT_CLOSED';
    const CONNECTION_CLOSED = 'CONNECTION_CLOSED';
    const CONNECTION_ALREADY_OPENED = 'CONNECTION_ALREADY_OPENED';
    const CONNECTION_CANNOT_OPEN = 'CONNECTION_CANNOT_OPEN';
    const CONNECTION_CANNOT_CHANGE_DB = 'CONNECTION_CANNOT_CHANGE_DB';
    const CONNECTION_QUERY_FAILED = 'CONNECTION_QUERY_FAILED';
    const CONNECTION_TABLE_INEXISTANT = 'CONNECTION_TABLE_INEXISTANT';
	
    const CONNECTION_COLUMN_INEXISTANT = 'CONNECTION_COLUMN_INEXISTANT';
	
	const TABLE_CLASS_INCORRECT = 'TABLE_CLASS_INCORRECT';
	
	const RECORD_NOT_VALID = 'RECORD_NOT_VALID';
	const RECORD_UPDATE_DOESNT_EXIST = 'RECORD_UPDATE_DOESNT_EXIST';

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <BDDError>



/*************************************************************************
                           |BDDRessourceItem.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <BDDRecord> (fichier BDDRecord.php) --------------
if (defined('BDDRECORD_H'))
{
    return;
}
else
{

}
define('BDDRECORD_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDRecord>
//Gestion d'une entrée de table BDD
//
//------------------------------------------------------------------------ 

class BDDRecord extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function IsValid (  )
    // Mode d'emploi :
    //permettra de connaitre si l'objet a été validé, en vue d'être sauvegardé
	//en base de données
	//
	// Renvoie :
	//- vrai ou faux selon si l'objet est valide et prêt pour une sauvegarde.
	//
    // Contrat :
    //
	{
		return true;
	}
	
    public function Validate (  )
    // Mode d'emploi :
    //permettra de valider l'objet courant en vue d'une sauvegarde dans la base
	//de données
	//
	// Renvoie :
	//- NULL si l'objet est validé. Il sera alors prêt pour une sauvegarde
	//- un objet de type Errors contenant les erreurs qui empêchent la validation
	//
    // Contrat :
    //
    {
		return NULL;
	}
	
    public function PropertyExists( $propertyName )
    // Mode d'emploi :
    //Retourne si la propriété existe ou non
    //
	// Renvoie :
	//- vrai si la propriété existe
	//- faux sinon
	//
    // Algorithme : 
    //trivial
    {
		return ( isset ( $this->row[ $propertyName ] ) );
    } //----- Fin de PropertyExists
	
    public function GetProperty( $propertyName )
    // Mode d'emploi :
    //Retourne la valeur de la propriété
    //
	// Renvoie :
	//- la valeur associée à la propriété si elle existe
	//- un objet de type Errors en cas d'échec
	//
    // Algorithme : 
    //trivial
    {
		if ( $this->PropertyExists( $propertyName ) )
		{
			return $this->row [ $propertyName ];
		}
		else
		{
			$errs = new Errors ( );
			
			$errs->Add ( new BDDError ( BDDError::CONNECTION_COLUMN_INEXISTANT , 'Propriété inexistante' ) );
			
			return $errs;
		}
    } //----- Fin de GetProperty
	
    public function SetProperty( $propertyName , $propertyValue )
    // Mode d'emploi :
    //Affecte la valeur passée en paramètre à la propriété.
	//Celle-ci est créée automatiquement en cas de non existance
    //
	// Renvoie :
	//
    // Algorithme : 
    //trivial
    {
		$this->row [ $propertyName ] = $propertyValue;
		
		$this->isValid = false;
    } //----- Fin de SetProperty
	
	public function GetPropertyCount ( )
	// Mode d'emploi :
	//permet de connaitre le nombre de propriétés stockées dans l'objet
	//
	// Renvoie :
	//- le nombre de propriétés stockés
	//- le nombre de propriétés stockés
	//
	//
	{
			return count ( $this->row );
	} //----- Fin de getPropertyCount
	
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->row );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->row );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le code de l'erreur pointée par la liste
    //
    {
        return key( $this->row );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->row );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid
//---------------------------------------------Fin implémentation Iterator

//-------------------------------------------- Constructeurs - destructeur
    function __construct( $row = NULL )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
		if ( is_array( $row ) )
		{
			$this->row = $row;
		}
		else
		{
			$this->row = array();
		}
		
		$this->isValid = false;
    } //---- Fin du constructeur
    
//------------------------------------------------------ Méthodes Magiques
    function __ToString ( )
    // Mode d'emploi :
    // permet l'affichage d l'item locator
    // Contrat :
    //
    {
        return (String)var_export( $this->row );
    } // Fin de __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
    protected $row;
	
	protected $isValid; // contient true ou false selon si l'objet a été validé.
	//protected $hasBeenModified; // contient true ou false selon si l'objet a été modifié.
}

//-------------------------------- Autres définitions dépendantes de <BDDRecord>



/*************************************************************************
                           |BDDRecordSet.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <BDDRecordSet> (fichier BDDRecordSet.php) --------------
if (defined('BDDRECORDSET_H'))
{
    return;
}
else
{

}
define('BDDRECORDSET_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDRecordSet>
//Itérateur qui gère une liste d'erreurs de type Error ou descendant
//
//------------------------------------------------------------------------ 

class BDDRecordSet extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //  

    public function Add( BDDRecord $item )
    // Mode d'emploi :
    //Ajoute un item à la liste
    //
    {
        $this->items[ $this->GetCount() ] = $item;
    } //---- Fin de Add

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des items
    //
    {
        unset($this->items);
        
        $this->items = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre d'items contenus dans la liste
    //
    // Renvoie :
    //le nombre d'items contenus
    {
        return count( $this->items );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->items );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return @current( $this->items );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le n° d'enregistrement pointé par la liste
    //
    {
        return key( $this->items );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->items );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid
//---------------------------------------------Fin implémentation Iterator
    
//-------------------------------------------- Constructeurs - destructeur
    function __construct( )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
    	$this->items = array( );
    } //---- Fin du constructeur

//------------------------------------------------------ Méthodes Magiques

    public function __ToString ()
    // Mode d'emploi :
    //Réalise une conversion des erreurs en String
    //
    // Algorithme : 
    //foreach( $this )
    {
        return $this->GetCount().' entrées'.var_dump($this->items);
    }

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
    protected $items;
}

//-------------------------------- Autres définitions dépendantes de <BDDRecordSet>



/*************************************************************************
                           |BDDConnectionInterface.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLConnection> (fichier BDDConnectionInterface.php) --------------
if (defined('BDDCONNECTIONINTERFACE_H'))
{
    return;
}
else
{

}
define('BDDCONNECTIONINTERFACE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDConnectionInterface>
// Fournir des méthodes de base d'accès à une base
// Connexion + requetes
//
//------------------------------------------------------------------------ 

interface BDDConnectionInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
	public function TableExists ( $table );
    // Mode d'emploi :
    //recherche la table $table dans la base de données
    //
    // Renvoie :
    //- true si la table est trouvée
    //- un objet de type Errors en cas d'erreur
    //
    //
    
	public function TableDescription ( $table );
    // Mode d'emploi :
    //permet de connaitre la structure de la table en paramètre
    //
    // Renvoie :
    //- un objet de type BDDRecordSet dont chaque BDDRecord est un champ de la base
    //- un objet de type Errors en cas d'erreur
    //
    //
    
    public function SetServer ( $server );
    // Mode d'emploi :
    // Met à jour l'adresse du serveur
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    // Contrat :
    //
    
    public function GetServer ( );
    // Mode d'emploi :
    // Récupère l'adresse du serveur
    //
    // Contrat :
    //
    
    public function SetUsername ( $username );
    // Mode d'emploi :
    // Met à jour l'utilisateur
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    // Contrat :
    //
    
    public function GetUsername ( );
    // Mode d'emploi :
    // Récupère l'utilisateur
    //
    // Contrat :
    //
    
    public function SetPassword ( $password );
    // Mode d'emploi :
    // Met à jour le mot de passe
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    // Contrat :
    //
    
    public function GetPassword ( );
    // Mode d'emploi :
    // Récupère le mot de passe
    //
    // Contrat :
    //
    
    public function Open( $isPersistent );
    // Mode d'emploi :
    //Tente d'ouvrir la connexion
    //si $isPersistent est égal à true, la connexion sera ouverte en mode persistant
	//
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    // Contrat :
    //
    
    public function SetDatabase( $database );
    // Mode d'emploi :
    //change la base courante
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    //
    
    public function Query( $query );
    // Mode d'emploi :
    //Effectue une requete BDD
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- la ressource résultat
    //
    // Contrat :
    //
    
    public function Close( );
    // Mode d'emploi :
    //Ferme la connexion
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    // Contrat :
    //
    
    public function isConnected ( );
    // Mode d'emploi :
    //retourne si oui ou non la connexion est active
    //
    // Renvoie :
    //- true ou false selon l'état de la connexion
    //
    
//-------------------------------------------- Constructeurs - destructeur

//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 
    
//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <BDDConnectionInterface>



/*************************************************************************
                           |BDDTableInterface.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLConnection> (fichier BDDTableInterface.php) --------------
if (defined('BDDTABLEINTERFACE_H'))
{
    return;
}
else
{

}
define('BDDTABLEINTERFACE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDTableInterface>
// Fournir des méthodes de base d'accès à une base
// Connexion + requetes
//
//------------------------------------------------------------------------ 

interface BDDTableInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    abstract public function Select ( $champs, $options );
    // Mode d'emploi :
    //permet de récuperer le contenu d'une table selon différents paramètres
	//sous forme d'un BDDRecordSet
	//
	//
	//$champs est un tableau ou une chaine de caractères représentant les champs
	//à selectionner.
	//$options contient les "where" "order" "limit" et autres sous forme de chaine...
	//
    // Contrat :
    //
	
    abstract public function Insert ( BDDRecord $record );
    // Mode d'emploi :
    //permet d'insérer de nouveaux enregistrements dans la table
	//
    // Contrat :
    //
	
    abstract public function Update ( BDDRecord $updatedRec, $clause );
    // Mode d'emploi :
    //permet de mettre à jour le contenu de la table en mettant à jour
	//$updateRec en fonction des $clause à construire en MySQL
	//
    // Contrat :
    //
	
    abstract public function Delete ( $clauses );
    // Mode d'emploi :
    //permet d'effacer une partie du contenu de la table en fonction des $clauses
	//passées
	//
    // Contrat :
    //
	
    abstract public function Clear (  );
    // Mode d'emploi :
    //Efface la totalité du contenu de la table courante.
	//
    // Contrat :
    //
	
    abstract public function Drop (  );
    // Mode d'emploi :
    //Supprime la table courante de la base de données
	//passés
	//
    // Contrat :
    //
    
//-------------------------------------------- Constructeurs - destructeur

//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 
    
//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <BDDTableInterface>



/*************************************************************************
                           |BDDConnection.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <BDDConnection> (fichier BDDConnection.php) --------------
if (defined('BDDCONNECTION_H'))
{
    return;
}
else
{

}
define('BDDCONNECTION_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDConnection>
// Fournir des méthodes de base d'accès à une base MySQL
// Connexion + requetes
//
//------------------------------------------------------------------------ 

abstract class BDDConnection extends AbstractClass implements BDDConnectionInterface
{
//----------------------------------------------------------------- PUBLIC

	const CONNECTION_PERSISTENT = 'CONNECTION_PERSISTENT'; // for Open(), specifies a persistent connexion
	const CONNECTION_NOT_PERSISTENT = 'CONNECTION_NOT_PERSISTENT';

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    //public function tableExists ( $table );
    // Mode d'emploi :
    //recherche la table $table dans la base de données
    //
    // Renvoie :
    //- true si la table est trouvée
    //- un objet de type Errors en cas d'erreur
    //
    //
    
    public function SetServer ( $server )
    // Mode d'emploi :
    // Met à jour l'adresse du serveur
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    // Contrat :
    //
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

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'Vous ne pouvez modifier l\'adresse serveur lorsque la connexion n\'est pas fermée' ) );
                    
            return $errs;
        }
    } //----- Fin de SetServer
    
    public function GetServer ( )
    // Mode d'emploi :
    // Récupère l'adresse du serveur
    //
    // Contrat :
    //
    {
        return $this->server;
    } //----- Fin de GetServer
    
    public function SetUsername ( $username )
    // Mode d'emploi :
    // Met à jour l'utilisateur
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    // Contrat :
    //
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

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'Vous ne pouvez modifier l\'utilisateur lorsque la connexion n\'est pas fermée' ) );
            
            return $errs;
        }
    } //----- Fin de SetUsername
    
    public function GetUsername ( )
    // Mode d'emploi :
    // Récupère l'utilisateur
    //
    // Contrat :
    //
    {
        return $this->username;
    } //----- Fin de GetUsername
    
    public function SetPassword ( $password )
    // Mode d'emploi :
    // Met à jour le mot de passe
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    // Contrat :
    //
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

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'Vous ne pouvez modifier le mot de passe lorsque la connexion n\'est pas fermée' ) );
            
            return $errs;
        }
    } //----- Fin de SetPassword
    
    public function GetPassword ( )
    // Mode d'emploi :
    // Récupère le mot de passe
    //
    // Contrat :
    //
    {
        return $this->password;
    } //----- Fin de GetPassword
    
    //public function Open( );
    // Mode d'emploi :
    //Tente d'ouvrir la connexion
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    // Contrat :
    //
    
    //public function SetDatabase( $database );
    // Mode d'emploi :
    //change la base courante
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    //
    
    //public function Query( $query );
    // Mode d'emploi :
    //Effectue nune requete MySQL
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- en cas de succès, un objet de type BDDRessource contenant 
	//l'ensemble des entrées sous forme de BDRessourceItem 
    //
    // Contrat :
    //
    
    public function GetQueriesCount ( )
    // Mode d'emploi :
    //permet de connaitre le nombre de requets effectuées
    //depuis la création de l'objet
    //
    // Renvoie :
    //le nombre de requetes
    //
	{
		return $this->nombreRequetes;
	}
    
    //abstract public function Close( );
    // Mode d'emploi :
    //Ferme la connexion
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    // Contrat :
    //
    
    //abstract public function isConnected ( );
    // Mode d'emploi :
    //retourne si oui ou non la connexion est active
    //
    // Renvoie :
    //- true ou false selon l'état de la connexion
    //
    
//-------------------------------------------- Constructeurs - destructeur
    //abstract function __construct( $server = '' , $username = '' , $password = '' );
    // Mode d'emploi (constructeur) :
    //initialise les variables de la classe
    //interrompt l'execution si PHP ne supporte pas la BDD
    //
    // Contrat :
    //
    
//------------------------------------------------------ Méthodes Magiques

    public function __ToString ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    }

//------------------------------------------------------------------ PRIVE 
    protected $server;
    protected $username;
    protected $password;
    
    protected $connection; // contiendra  la connexion
    protected $database; // base de données
    protected $nombreRequetes; // nombre de requetes executées
    
//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <BDDConnection>



/*************************************************************************
                           |BDDTable.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <BDDTable> (fichier BDDTable.php) --------------
if (defined('BDDTABLE_H'))
{
    return;
}
else
{

}
define('BDDTABLE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDTable>
//
//
//------------------------------------------------------------------------ 

abstract class BDDTable extends AbstractClass implements BDDTableInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
    //abstract public function Select (  );
    // Mode d'emploi :
    //permet de récuperer le contenu d'une table selon différents paramètres
	//sous forme d'un BDDRecordSet
	//
    // Contrat :
    //
	
    //abstract public function Insert (  );
    // Mode d'emploi :
    //permet d'insérer de nouveaux enregistrements dans la table
	//
    // Contrat :
    //
	
    //abstract public function Update (  );
    // Mode d'emploi :
    //permet de mettre à jour le contenu de la table
	//
    // Contrat :
    //
	
    //abstract public function Delete (  );
    // Mode d'emploi :
    //permet d'effacer une partie du contenu de la table en fonction des paramètres
	//passés
	//
    // Contrat :
    //
	
    //abstract public function Clear (  );
    // Mode d'emploi :
    //Efface la totalité du contenu de la table courante.
	//
    // Contrat :
    //
	
    //abstract public function Drop (  );
    // Mode d'emploi :
    //Supprime la table courante de la base de données
	//passés
	//
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $table, BDDConnection $connection, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type BDDTable sur la table $table de la base
	//de $connection
	//
	// Renvoie par référence dans $errors :
	//- NULL si aucune erreur n'est intervenue
	//- un objet de type errors en cas d'erreur;
	//
    // Contrat :
	//- la connexion doit rester valable tout le temps de opérations sur la table
    //
	// Algorithme :
	//* vérification de la connexion
	//* vérification de la table
	//* chargement de la structure de la table
    {
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
    } //---- Fin du constructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
	protected $tableName; // nom de la table gérée
	protected $bDDConnection; // class ressource connexion
	protected $structure; // contiendra la structure de la table
}

//-------------------------------- Autres définitions dépendantes de <BDDTable>



/*************************************************************************
                           |MySQLConnection.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLConnection> (fichier MySQLConnection.php) --------------
if (defined('MYSQLCONNECTION_H'))
{
    return;
}
else
{

}
define('MYSQLCONNECTION_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <MySQLConnection>
// Fournir des méthodes de base d'accès à une base MySQL
// Connexion + requetes
//
//------------------------------------------------------------------------ 

class MySQLConnection extends BDDConnection
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    public function TableExists ( $table )
    // Mode d'emploi :
    //recherche la table $table dans la base de données
    //
    // Renvoie :
    //- true si la table est trouvée
    //- un objet de type Errors en cas d'erreur
    //
    //
	// Algorithme :
	//* vérification du choix de la base
	//* SHOW TABLE
	//* recherche dans le résultat
    {
        if ( $this->database == '' )
        // aucune base sélectionnée
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'Aucune base de données sélectionnée' ) );
            
            return $errs;            
        }
        else
        {
        	if ( ( $tableList = & $this->Query( 'SHOW TABLES FROM '.$this->database ) instanceof Errors ) )
            // la requete à échoué
            {
                return $tableList;
            }
            else
            // recherche de la table
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
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_TABLE_INEXISTANT , 'Cette table n\'existe pas' ) );
                
                return $errs;                 
            }
        }
    } //----- Fin de TableExists
    
	public function TableDescription ( $table )
    // Mode d'emploi :
    //permet de connaitre la structure de la table en paramètre
    //
    // Renvoie :
    //- un objet de type BDDRecordSet dont chaque BDDRecord est un champ de la base
    //- un objet de type Errors en cas d'erreur
    //
    //
    {
        if ( $this->database == '' )
        // aucune base sélectionnée
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'Aucune base de données sélectionnée' ) );
            
            return $errs;            
        }
        else
        {
			$ressource = & $this->Query( 'DESC `'.$table.'`' );
			
        	return $ressource;
        }
    } //----- Fin de TableDescription
    
    //public function SetServer ( $server )
    // Mode d'emploi :
    // Met à jour l'adresse du serveur
    
    // Renvoie :
    // - un objet de type Errors en cas d'erreur(s)
    // - NULL en cas de réussite
    
    
    // Contrat :

    
    //public function GetServer ( )
    // Mode d'emploi :
    // Récupère l'adresse du serveur
    
    // Contrat :
    
    //public function SetUsername ( $username )
    // Mode d'emploi :
    // Met à jour l'utilisateur
    
    // Renvoie :
    // - un objet de type Errors en cas d'erreur(s)
    // - NULL en cas de réussite
    
    
    // Contrat :
    
    //public function GetUsername ( )
    // Mode d'emploi :
    // Récupère l'utilisateur
    
    // Contrat :
    
    //public function SetPassword ( $password )
    // Mode d'emploi :
    // Met à jour le mot de passe
    
    // Renvoie :
    // - un objet de type Errors en cas d'erreur(s)
    // - NULL en cas de réussite
    
    
    // Contrat :
    
    //public function GetPassword ( )
    // Mode d'emploi :
    // Récupère le mot de passe
    
    // Contrat :
    
    public function Open( $isPersistent )
    // Mode d'emploi :
    //Tente d'ouvrir la connexion
    //si $isPersistent est égal à BDDConnection::CONNECTION_PERSISTENT, la connexion sera ouverte en mode persistant
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    // Contrat :
    //
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
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_CANNOT_OPEN , 'Impossible d\'ouvrir la connexion, vérifiez vos accès' ) );
                
                return $errs;
            }
        }
        else
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_ALREADY_OPENED , 'Une connexion est déjà en cours' ) );
            
            return $errs;
        }
    } //----- Fin de Open
    
    public function SetDatabase( $database ) 
    // Mode d'emploi :
    //change la base courante
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    //
    {
        if ( !$this->isConnected() )
        {
            // connexion inexistante
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_CLOSED , 'Connexion fermée' ) );
            
            return $errs;
        }
        else
        {
            if ( !@mysql_select_db ( $database , $this->connection ) )
            // change échoué
            {
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_CANNOT_CHANGE_DB , 'Impossible de changer de base de données : '.mysql_error( $this->connection ) ) );
                
                return $errs;
            }
            else
            {
                $this->database = $database;
            
                return NULL;
            }
        }
    } //----- Fin de SetDabase
    
    public function Query( $query )
    // Mode d'emploi :
    //Effectue nune requete MySQL
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- en cas de succès, un objet de type BDDRessource contenant 
	//l'ensemble des entrées sous forme de BDRessourceItem. Afin d'éviter
	//un dépassement de capacité, il est nécessaire de récupérer le résultat
	//via référence.
    //
    // Contrat :
    //
    {
        if ( $this->database == '' )
        // aucune base sélectionnée
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'Aucune base de données sélectionnée' ) );
            
            return $errs;            
        }
        else
        {
            if ( ( $result = @mysql_query( $query , $this->connection ) ) === false ) 
            // requete échouée
            {
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_QUERY_FAILED , 'La requete a échoué ('.$query.') : '.mysql_error( $this->connection ) ) );
                
                return $errs;
            }
            else
            {
                $this->nombreRequetes++;
            
				// mise en BDDRessource
				
				$nouvellesRessources = new BDDRecordSet ( );
				
				while ( ($row = @mysql_fetch_assoc ( $result ) ) !== false )
				{
					$nouvellesRessources->Add ( new BDDRecord ( $row ) ) ;
				}
				
				@mysql_free_result ( $result ); // libération mémoire si nécessaire

                return $nouvellesRessources ;
            }
        }
    } //----- Fin de Query
    
    //public function GetQueriesCount ( )
    // Mode d'emploi :
    //permet de connaitre le nombre de requets effectuées
    //depuis la création de l'objet
    //
    // Renvoie :
    //le nombre de requetes
    //
    
    public function Close( )
    // Mode d'emploi :
    //Ferme la connexion
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    // Contrat :
    //
    {
        if ( !$this->isConnected() || !@mysql_close( $this->connection ) )
        {
            // connexion inexistante
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_CLOSED , 'Connexion déjà fermée' ) );
            
            return $errs;
        }
        else
        {
            $this->database = '';
        
            return NULL;
        }
    } //----- Fin de Close
    
    public function isConnected ( )
    // Mode d'emploi :
    //retourne si oui ou non la connexion est active
    //
    // Renvoie :
    //- true ou false selon l'état de la connexion
    //
    {
        return ( $this->connection !== NULL &@mysql_stat ( $this->connection ) !== NULL );
    } //----- Fin de isConnected
    
//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $server = '' , $username = '' , $password = '' )
    // Mode d'emploi (constructeur) :
    //initialise les variables de la classe
    //interrompt l'execution si PHP ne supporte pas MySQL
    //
    // Contrat :
    //
    {
            if ( ! function_exists( 'mysql_connect' ) )
            {
                die('PHP ne supporte pas MySQL');
            }
            
            $this->connection = NULL;
            
            $this->server = $server;
            $this->username = $username;
            $this->password = $password;
            
            $this->database = '';
            
            $this->nombreRequetes = 0;
    } //----- Fin du contructeur
    
//------------------------------------------------------ Méthodes Magiques

    public function __ToString ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    }

//------------------------------------------------------------------ PRIVE 

    
//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <MySQLConnection>



/*************************************************************************
                           |MySQLTable.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLTable> (fichier MySQLTable.php) --------------
if (defined('MYSQLTABLE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <MySQLTable>
//
//
//------------------------------------------------------------------------ 

class MySQLTable extends BDDTable
{
//----------------------------------------------------------------- PUBLIC

	const TABLE_COLUMN_ALL = '*'; 
	// représente l'ensemble des colonnes
	
	const MYSQL_CLAUSE_WHERE = ' WHERE ';
	const MYSQL_CLAUSE_LIMIT = ' LIMIT ';
	
	const MYSQL_CLAUSE_AND = ' AND ';
	const MYSQL_CLAUSE_OR = ' OR ';
	
	const MYSQL_CLAUSE_ORDER = ' ORDER BY ';
	const MYSQL_CLAUSE_ORDER_ASCENDANT = ' ASC ';
	const MYSQL_CLAUSE_ORDER_DESCENDANT = ' DESC ';
	
	const MYSQL_CLAUSE_GROUP = ' GROUP BY ';
	const MYSQL_CLAUSE_HAVING = ' HAVING ';
	
	const MYSQL_SEEK_REGEX = ' LIKE '; // utilisation de LIKE
	
	// caractères magiques REGEX
		const MYSQL_SEEK_MULTICHARS = '%'; // remplace X chars différents
		const MYSQL_SEEK_ANYCHAR = '_'; // remplace un char
	// fin des caractères magiques REGEX
	
	const MYSQL_SEEK_STRICT = ' = ';// recherche stricte =
	const MYSQL_SEEK_SEPARATOR = '"';// char de séparation
	// paramètre de recherche
	
	const MYSQL_STRUCTURE_FIELD_NAME = 'Field'; 
	// champ contenant le nom du champ dans le structure

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
    public function Select ( $champs, $options )
    // Mode d'emploi :
    //permet de récuperer le contenu d'une table selon différents paramètres
	//sous forme d'un BDDRecordSet
	//
	//les données sont décodées de la base pour etre exploitables.
	//
	//$champs est un tableau ou une chaine de caractères représentant les champs
	//à selectionner.
	//$options contient les "where" "order" "limit" et autres sous forme de chaine...
	//
    // Contrat :
    //
	{
		$selectQuery = 'SELECT ';
		
		if ( is_array( $champs ) ) 
		{
			foreach( $champs as $champ ) 
			{
				$selectQuery .= $champ;
			}
			
			$selectQuery = substr( $selectQuery, 0, -1 ) ;
		}
		else
		{
			$selectQuery .= $champs;
		}
		
		$selectQuery .= ' FROM `'.$this->tableName.'` '.$options;
		
		return $this->bDDConnection->Query ( $selectQuery ) ;
	} //---- Fin de Select
	
    public function Insert ( BDDRecord $record )
    // Mode d'emploi :
    //permet d'insérer de nouveaux enregistrements dans la table
	//
    // Contrat :
    //
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
	} //---- Fin de Insert
	
    public function Update ( BDDRecord $updatedRec, $clause )
    // Mode d'emploi :
    //permet de mettre à jour le contenu de la table en mettant à jour
	//$updateRec en fonction des $clause
	//
    // Contrat :
    //
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
	
	} //---- Fin de Update
	
    public function Delete ( $clause )
    // Mode d'emploi :
    //permet d'effacer une partie du contenu de la table en fonction des paramètres
	//passés
	//
    // Contrat :
    //
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'` WHERE '.$clause );
	} //---- Fin de Delete

    public function Clear (  )
    // Mode d'emploi :
    //Efface la totalité du contenu de la table courante.
	//
    // Contrat :
    //
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'`' );
	} //---- Fin de Clear
	
    public function Drop (  )
    // Mode d'emploi :
    //Supprime la table courante de la base de données
	//passés
	//
    // Contrat :
	//
	{
		return $this->bDDConnection->Query ( 'DROP TABLE `'.$this->tableName.'`' );
	} //---- Fin de Drop
    
//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $table, MySQLConnection $connection, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type BDDTable sur la table $table de la base
	//de $connection
	//
	// Renvoie par référence dans $errors :
	//- NULL si aucune erreur n'est intervenue
	//- un objet de type errors en cas d'erreur;
	//
    // Contrat :
	//- la connexion doit rester valable tout le temps de opérations sur la table
	{
		parent::__construct ( $table, $connection, $errors );
	}
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
	protected function isValidProperty ( $property )
	// Mode d'emploi :
	//vérifie dans la structure de la table si la propriété existe ou non
	//
	// Renvoie : 
	//- vrai si tel est le cas;
	//- faux sinon
	//
	// Contrat :
	//
	{
		foreach ( $this->structure as $champ )
		{
			if ( $champ->getProperty( MySQLTable::MYSQL_STRUCTURE_FIELD_NAME ) == $property )
			{
				return true;
			}
		}
		
		return false;
	}
	
	protected function bDDRecordToTableRecord ( BDDRecord $record )
    // Mode d'emploi :
    //transforme l'enregistrement fourni en paramètre en un enregistrement
	//valable pour cette table. Cette fonction fait une intersection de l'
	//enregistrement et de la structure de la table.
	//
	//Chaque donnée est par la meme encodée de facon sure pour les requetes
	//
	// Renvoie : 
	//un objet de type BDDRecord contenant un enregistrement correspondant
	//a la table
	//
    // Contrat :
    //
	{
		$tableRecord = new BDDRecord();
		
		foreach ( $record as $champ => $value ) 
		{
			if ( $this->isValidProperty( $champ ) )
			{
				$tableRecord->SetProperty ( $champ , addslashes ( $value ) );
			}
		}
		
		return $tableRecord;
	}

//----------------------------------------------------- Attributs protégés
}

//-------------------------------- Autres définitions dépendantes de <MySQLTable>



/*************************************************************************
                           |TemplateError.php|  -  description
                             -------------------
    start                : |11.02.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Interface of <TemplateError> class (file TemplateError.php) -----------------
if (defined('TEMPLATEERROR_H'))
{
    return;
}
else
{

}
define('TEMPLATEERROR_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Role of <TemplateError> class
//Extension of the Error class, implements constants for specific
//Template errors
//
//------------------------------------------------------------------------ 

class TemplateError extends Error
{
//----------------------------------------------------------------- PUBLIC
    const TEMPLATE_TAG_INEXISTANT = 'TEMPLATE_TAG_INEXISTANT';
    const TEMPLATE_MAQUETTE_INEXISTANT = 'TEMPLATE_MAQUETTE_INEXISTANT';

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //

//---------------------------------------------- Constructors - destructor
    
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//----------------------------------------------------- Attributs protégés

}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |Template.php|  -  description
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//-------------- Interface of <Template> class (file Template.php) -----------------
if (defined('TEMPLATE_H'))
{
    return;
}
else
{

}
define('TEMPLATE_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------  
// Role of <Template> class
//
//
//------------------------------------------------------------------------ 

class Template extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC
	const TAG_OPEN = '[';
	const TAG_CLOSE = ']';
	const NEWLINE = "\n";

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
    
    public static function BuildTag ( $tagName )
    // User's manual :
    //builds a Tag from TAG_OPEN $tagName and TAG_CLOSE
    //
    // Returns :
    //
    // Contrat :
    //tagName must not contain TAG_OPEN or TAG_CLOSE value.
    {
        return self::TAG_OPEN. $tagName. self::TAG_CLOSE;
    } //----- Fin de BuildTag
    
    public function SetMaquette ( $maquette )
    // User's manual :
    //assign $maquette to page skeleton
    //
    // Returns :
    //
    // Contrat :
    //the skeleton may has the [TAG] you'll set
    {
        $this->maquette = $maquette;
    } //----- Fin de SetMaquette
    
    /*public function GetMaquette ( )
    // User's manual :
    //get the skeleton of the page.
    //
    // Returns :
    //the current skeleton of the page.
	//
    // Contrat :
    {
        return $this->maquette;
    } //----- Fin de SetMaquette*/
    
    public function SetTag ( $tag , Template $value )
    // User's manual :
    //assign a template $value to a [TAG] 
	//$tag IS NOT [TAG] but only TAG, without the []
    //
    // Contract :
    //the skeleton you've set may contain the [$tag]
	//$value must be != than null
    {
        $this->tags[ self::TAG_OPEN.$tag. self::TAG_CLOSE ] = $value;
    } //----- Fin de SetTag
    
    public function GetTag ( $tag )
    // User's manual :
    //get the Template object assigned to a [$tag]
    //
    // Returns :
    //- an object of type Errors if an error has been met
    //- an object of type Template.
	//
	// Errors :
	//- TemplateError::TEMPLATE_TAG_INEXISTANT, the tag has neve
	//been assigned
    //
    // Contrat :
    //the skeleton you've set may contain the [$tag]
    {
        if ( $this->TagExists( $tag ) )
        {
            return $this->tags[  self::TAG_OPEN.$tag. self::TAG_CLOSE ];
        }
        else
        {
            $errs = new Errors ( );
            
            $errs->Add( new TemplateError( TemplateError::TEMPLATE_TAG_INEXISTANT , 'The tag '. self::BuildTag( $tag ) . ' doesn\'t exist.' ) );
            
            return $errs;
        }
    } //----- Fin de GetTag
    
    public function AddToTag ( $tag, $value )
    // User's manual :
    //add the $value to the skeleton of the object specified by his $tag
    //
    // Returns :
    //- an object of type Errors if an error has been met
    //- null instead.
	//
	// Errors :
	//- TemplateError::TEMPLATE_TAG_INEXISTANT, the tag has neve
	//been assigned
    //
    // Contrat :
    {
        if ( $this->TagExists( $tag ) )
        {
			$this->GetTag ( $tag )->maquette .= $value;

			return null;
        }
        else
        {
            $errs = new Errors ( );
            
            $errs->Add( new TemplateError( TemplateError::TEMPLATE_TAG_INEXISTANT , 'The tag '. Template::BuildTag( $tag ) . ' doesn\'t exist.' ) );
            
            return $errs;
        }
    } //----- Fin de AddToTag
    
    public function TagExists ( $tag )
    // User's manual :
    //returns whether the tag [$tag] exists
    //
    // Returns :
    //- true if [$tag] exists,
	//- false else
	//
    // Contrat :
    {
        return isset ( $this->tags[ Template::BuildTag( $tag ) ] );
    } //----- End of TagExists
    
    public function Generate( )
    // User's manual :
    //Use the template to generate a child of model
    //
    // Returns :
    //a string that contains the generated contents
    //
    {
		$generated = $this->maquette;

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
    // User's manual :
	//instanciate an object of type Template
    //
    // Contrat :
    //
    {
        $this->tags = array();
    } //---- End of __construct
  
//---------------------------------------------------------- Magic Methods
	public function __ToString ()
    // User's manual :
    //
    // Returns :
	//
    // Contrat :
    //
	{
		return $this->Generate ( );
	} // End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

    protected $maquette;
    protected $tags; // tags de remplacement
}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |XHTMLTemplate.php|  -  description
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//-------------- Interface of <XHTMLTemplate> class (file XHTMLTemplate.php) -----------------
if (defined('XHTMLTemplate_H'))
{
    return;
}
else
{

}
define('XHTMLTemplate_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------  
// Role of <XHTMLTemplate> class
//
//
//------------------------------------------------------------------------ 

class XHTMLTemplate extends Template
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //

//-------------------------------------------- Constructeurs - destructeur
  
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |XHTMLBodyTemplate.php|  -  description
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//-------------- Interface of <XHTMLBodyTemplate> class (file XHTMLBodyTemplate.php) -----------------
if (defined('XHTMLBODYTEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLBODYTEMPLATE_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------  
// Role of <XHTMLBodyTemplate> class
//
//
//------------------------------------------------------------------------ 

class XHTMLBodyTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	
	const TAG_CONTENT = 'CONTENT';
	const TAG_PARAMS = 'PARAMS';

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
	
    public function AddContent ( $content )
    // Mode d'emploi :
    //add raw XHTML $content to the current content of the body.
	// content of the page is value associated to the tag TAG_CONTENT
	//
    // Contrat :
    //raw XHTML must be correct
    {
		$this->AddToTag ( self::TAG_CONTENT, $content );
    } //----- End of AddContent
	
    public function SetContent ( $content )
    // Mode d'emploi :
    //set the content of the page with the given $content
	//
	// Returns :
	//
    // Contrat :
    //raw XHTML must be correct
    {
		$temp = new Template ();
		$temp->SetMaquette ( $content );
		
        $this->SetTag ( self::TAG_CONTENT, $temp );
    } //----- End of SetContent
	
    public function AddParams ( $params )
    // Mode d'emploi :
    //add raw XHTML $params to the current parameters of the body.
	// params of the body is value associated to the tag TAG_PARAMS
	//
    // Contrat :
    //raw XHTML must be correct
    {
		$this->AddToTag ( self::TAG_PARAMS, $params );
    } //----- End of AddParams
	
    public function SetParams ( $params )
    // Mode d'emploi :
    //set the parameters of the page with the given $params
	//
    // Contrat :
    //raw XHTML must be correct
    {
		$temp = new Template ();
		$temp->SetMaquette ( $content );
		
        $this->SetTag ( self::TAG_PARAMS, $temp );
    } //----- End of SetParams

//-------------------------------------------- Constructeurs - destructeur
	function __construct () 
    // User's manual :
    //
    // Contract :
	//
	{
		parent::__construct();
		
		$this->maquette =
'<body '. Template::BuildTag( self::TAG_PARAMS ) .'>
'. Template::BuildTag( self::TAG_CONTENT ).'
</body>';

		$this->SetTag ( self::TAG_CONTENT, new XHTMLTemplate() ); 
		$this->SetTag ( self::TAG_PARAMS, new XHTMLTemplate() ); 

	} // end of __construct
  
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |XHTMLHeadersTemplate.php|  -  description
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//-------------- Interface of <XHTMLHeadersTemplate> class (file XHTMLHeadersTemplate.php) -----------------
if (defined('XHTMLHEADERSTEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLHEADERSTEMPLATE_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------  
// Role of <XHTMLHeadersTemplate> class
//
//
//------------------------------------------------------------------------ 

class XHTMLHeadersTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	
	const TAG_HEADERS = 'HEADERS';

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
	
    public function AddHeaders ( $headers )
    // Mode d'emploi :
    //add raw XHTML $headers to the current headers of the head.
	// heades of the heads is value associated to the tag TAG_HEADERS
	//
	//it automatiquely adds a NEWLINE to the $headers
	// 
    // Contrat :
    //raw XHTML must be correct
    {
		$this->AddToTag ( self::TAG_HEADERS, $headers.self::NEWLINE );
    } //----- End of AddHeaders
	
    public function SetHeaders ( $headers )
    // Mode d'emploi :
    //set the headers of the head with the given $headers
	//
	// Returns :
	//
    // Contrat :
    //raw XHTML must be correct
    {
		$temp = new Template ();
		$temp->SetMaquette ( $headers );
		
        $this->SetTag ( self::TAG_HEADERS, $temp );
    } //----- End of SetHeaders

//-------------------------------------------- Constructeurs - destructeur
	function __construct () 
    // User's manual :
    //
    // Contract :
	//
	{
		parent::__construct();
		
		$this->maquette = 
'<head>

'. Template::BuildTag( self::TAG_HEADERS ) .'
</head>';

		$this->SetTag ( self::TAG_HEADERS, new XHTMLTemplate() ); 

	} // end of __construct
  
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |LocatorItem.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <LocatorItem> (fichier LocatorItem.php) --------------
if (defined('LOCATORITEM_H'))
{
    return;
}
else
{

}
define('LOCATORITEM_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <LocatorItem>
//Gestion d'une partie de localisation à l'aide d'un label et d'une url
//associée
//
//------------------------------------------------------------------------ 

class LocatorItem extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    public function GetLabel( )
    // Mode d'emploi :
    //Retourne le label de l'item
    //
    // Algorithme : 
    //trivial
    {
        return $this->label;
    }
    
    public function GetURL( )
    // Mode d'emploi :
    //Retourne l'URL associée au label
    //
    // Algorithme : 
    //trivial
    {
        return $this->url;
    }

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $label , $url )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
        $this->label = $label;
        $this->url = $url;
    } //---- Fin du constructeur
    
//------------------------------------------------------ Méthodes Magiques
    public function __ToString ( )
    // Mode d'emploi :
    // permet l'affichage d l'item locator
    // Contrat :
    //
    {
        return '<a href="'.$this->url.'">'.$this->label.'</a>';
    } // Fin de __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
    protected $label;
    protected $url;
}

//-------------------------------- Autres définitions dépendantes de <LocatorItem>



/*************************************************************************
                           |Locator.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Locator> (fichier Locator.php) --------------
if (defined('LOCATOR_H'))
{
    return;
}
else
{

}
define('LOCATOR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Locator>
//Itérateur qui gère une liste d'erreurs de type Error ou descendant
//
//------------------------------------------------------------------------ 

class Locator extends AbstractClass implements Iterator, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //  

    public function Add( AbstractClass $item )
    // Mode d'emploi :
    //Ajoute un ancrage locator à la liste
    //
    {
        $this->items[ $this->GetCount() ] = $item;
    } //---- Fin de AddError

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des items
    //
    {
        unset($this->items);
        
        $this->items = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre d'items contenus dans la liste
    //
    // Renvoie :
    //le nombre d'items contenus
    {
        return count( $this->items );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->items );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->items );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le code de l'erreur pointée par la liste
    //
    {
        return $this->current( )->getCode( );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->items );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid
//---------------------------------------------Fin implémentation Iterator
    
//-------------------------------------------- Constructeurs - destructeur
    public function __construct( )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
    	$this->items = array( );
    } //---- Fin du constructeur

//------------------------------------------------------ Méthodes Magiques

    public function __ToString ()
    // Mode d'emploi :
    //Réalise une conversion des erreurs en String
    //
    // Algorithme : 
    //foreach( $this )
    {
        $count = $this->getCount( );
        
        if ( $count == 0 ) 
        {
            unset( $count );
        
            return '';
        }
        else
        {
            $str = '<a href="'.$this->items[0]->getURL().'">'.$this->items[0]->getLabel().'</a> ';
            
            for ( $i = 1; $i < $count; $i++ )
            {
                $str .= ' &gt; <a href="'.$this->items[$i]->getURL().'">'.$this->items[$i]->getLabel().'</a> ';
            }
            
            unset( $count );
            
            return $str;
        }        
    }

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
    protected $items;
}

//-------------------------------- Autres définitions dépendantes de <Locator>



/*************************************************************************
                           |XHTMLPageTemplate.php|  -  description
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//-------------- Interface of <XHTMLPageTemplate> class (file XHTMLPageTemplate.php) -----------------
if (defined('XHTMLPAGETEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLPAGETEMPLATE_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------  
// Role of <XHTMLPageTemplate> class
//
//
//------------------------------------------------------------------------ 

class XHTMLPageTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	
	const TAG_BODY = 'BODY';
	const TAG_HEADERS = 'HEAD';

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
    
    public static function ConvertIntoSGML($source)
    // Mode d'emploi :
    //convert the string $source into a valid SGML string
    //
    // Renvoie :
    //the cleaned string
    //
    // Algorithme :
	//parse char by char of the string. If an ASCII char is > 127
	//it will ve converted as &#asciicode;
    {
        $newString = '';
        
        for($i = 0; $i < strlen($source); $i++) {
            $o = ord($source{$i});
            
            $newString .= (($o > 127)?'&#'.$o.';':$source{$i});
        }
        
        return $newString;
    } //----- End of ConvertIntoSGML


	
    /*public function GetLocator ( )
    // Mode d'emploi :
    //get the Locator menu
	//
	// Returns :
	//- the locator menu of the XHTML page
	//
    // Contrat :
    //
    {
        return $this->menuLocator;
    } //----- End of GetLocator*/
	
    public function GetBody ( )
    // Mode d'emploi :
    //get the Body of the XHTML Page
	//
	// Returns :
	//- the Body as an XHTMLBodyTemplate
	//
    // Contrat :
    //
    {
        return $this->GetTag ( self::TAG_BODY );
    } //----- End of GetBody
	
    public function GetHeaders ( )
    // Mode d'emploi :
    //get the Headers of the XHTML Page
	//
	// Returns :
	//- the Headers as an XHTMLHeadersTemplate
	//
    // Contrat :
    //
    {
        return $this->GetTag ( self::TAG_HEADERS );
    } //----- End of GetHeaders


	
	public function Generate ( )
	// Mode d'emploi :
	//génère une page XHTML en convertissant les caractères non SGML en 
	//SGML
	//
	// Renvoie :
	//la page générée en XHTML
	//
	// Contrat :
	//
	{
		return self::ConvertIntoSGML ( parent::Generate() );
	} //------ End of Generate

//-------------------------------------------- Constructeurs - destructeur
	function __construct () 
    // User's manual :
    //
    // Contract :
	//
	{
		parent::__construct();

		//default skeleton for XHTML1.1
		$this->maquette = 
'<?xml version="1.1" encoding="iso-8859-1" standalone="no" 
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
<!-- End of XHTML Page -->';
		
		
		$this->SetTag ( self::TAG_BODY, new XHTMLBodyTemplate() );
		$this->SetTag ( self::TAG_HEADERS, new XHTMLHeadersTemplate() );

		$this->menuLocator = new Locator ();
	} // end of __construct
  
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties
    //protected $menuLocator;

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
		$exectime->SetMaquette ( round( microtime(true) - $applicationVars[ Application::SYSTEM_START_TIME ], 4 ) );

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

	protected $pageTemplate; // XHTML Page Template
}

//----------------------------------------------------- Others definitions



/*************************************************************************
                           |GroupError.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <GroupError> (fichier GroupError.php) --------------
if (defined('GROUPERROR_H'))
{
    return;
}
else
{

}
define('GROUPERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <GroupError>
// Extension de la classe Error, elle implémente les constantes spécifiques aux erreurs Group
//
//------------------------------------------------------------------------ 

class GroupError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const GROUP_NOT_LOADED = 'GROUP_NOT_LOADED';

    const GROUP_IDSITE_INEXISTANT = 'GROUP_IDSITE_INEXISTANT'; // référent IdSite inexistant
	const GROUP_NAME_EMPTY = 'GROUP_NAME_EMPTY'; // nom de groupe vide
	
//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <GroupError>



/*************************************************************************
                           |TableGroupInterface.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableGroupInterface>
//
//
//------------------------------------------------------------------------ 

interface TableGroupInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectGroups ();
    // Mode d'emploi :
	//permet de récupérer l'ensemble des groupes.
	//
    // Renvoie :
	//- l'ensemble des groupes sous forme d'objets Group dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectGroupByIdGroup ( $idGroup );
    // Mode d'emploi :
	//permet de sélectionner le group d'id $idGroup.
	//
	// Renvoie :
    //- l'ensemble des groupes d'id $idGroup dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function FindGroupsByName ( $groupName );
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des groupes de nom $groupname.
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des groups de nom $groupName dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateGroupByIdGroup ( Group $new );
    // Mode d'emploi :
	//permet de mettre à jour une groupe en fonction de sa propriété
	// TABLE_COLUMN_IDGROUP
	//
	// Renvoie :
    //- NULL en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertGroup ( Group $group );
    // Mode d'emploi :
	//permet d'ajouter un nouveau groupe à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de réussite.
	//
	// Contrat :
	
	public function IdGroupExists ( $idGroup );
    // Mode d'emploi :
	//permet de connaitre si l'$idGroup existe dans la table
	//
	// Renvoie :
	//- true si $idGroup est présent,
	//- false sinon.
	//
	// Contrat :
    

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <TableGroupInterface>



/*************************************************************************
                           |Group.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Group> (fichier Group.php) --------------
if (defined('GROUP_H'))
{
    return;
}
else
{

}
define('GROUP_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Group>
//Gestion d'une entrée de table Group
//
//------------------------------------------------------------------------ 

class Group extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function Validate ( $siteTable )
    // Mode d'emploi :
    //permettra de valider l'objet courant en vue d'une sauvegarde dans la base
	//de données
	//
	//$siteTable doit etre une instance valide d'un BDDSiteGroup.
	//Les classes candidates implémentes l'interface TableGroupInterface.
	//
	// Renvoie :
	//- NULL si l'objet est validé. Il sera alors prêt pour une sauvegarde
	//- un objet de type Errors contenant les erreurs qui empêchent la validation
	//
    // Contrat :
    //
	{
		$errors = new Errors ();
	
		// login
			if ( empty( $this->row[ TableGroup::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new GroupError ( GroupError::GROUP_NAME_EMPTY, 'Veuillez saisir un nom d\'utilisateur.') );
			}
	
		// referent IdSite
			if ( ! @in_array( 'TableSiteInterface', class_implements ( $siteTable ) ) )
			{
				$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table Site correcte.' ) );
			} 
			else
			{
				if ( ! $siteTable->IdSiteExists( $this->row[ TableSite::TABLE_COLUMN_IDSITE ]  ) )
				{
					$errors->Add ( new GroupError ( GroupError::GROUP_IDSITE_INEXISTANT, 'Le groupe n\'appartient à aucun site valide.') );
				}
			}
			
		// résultat
		if ( $errors->GetCount() == 0 )
		{
			$this->isValid = true;
			return NULL;		
		}
		
		
		$this->isValid = false;
		return $errors;
	}
	
//-----------------------------------------------Implémentation Iterator

//---------------------------------------------Fin implémentation Iterator

//-------------------------------------------- Constructeurs - destructeur

    function __construct( BDDRecord & $newRec )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Group à partir d'un objet de
	//type BDDRecord en faisant une copie en profondeur.
	//
    // Contrat :
    //
    {
		// initialisation
		$this->SetProperty ( TableGroup::TABLE_COLUMN_IDGROUP , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_NAME , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_OVERRIDE , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_IDSITE , '' );

		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] ); // hack php pour acceder
			// a la prop protected $newRec->row
		}
		
		$this->isValid = false;
    } //---- Fin du constructeur
	
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
}

//-------------------------------- Autres définitions dépendantes de <Group>



/*************************************************************************
                           |Groups.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Groups> (fichier Groups.php) --------------
if (defined('GROUPS_H'))
{
    return;
}
else
{

}
define('GROUPS_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Groups>
//
//
//------------------------------------------------------------------------ 

class Groups extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques

    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveGroups ( )
    // Mode d'emploi :
    //met à jour les éléments Valides de la liste
	//les ajoute si l'IdGroup est inexistant
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un élément n'est pas validé
	//elle n'en tient simplement pas compte dans son traitement.
	//
    // Contrat :
    //
	{		
		foreach ( $this->groups as $group )
		{
			if ( $group->IsValid() )
			{
				if ( $this->groupTable->IdGroupExists ( $group->GetProperty( TableGroup::TABLE_COLUMN_IDGROUP ) ) )
				{
					if ( ( $errs = $this->groupTable->UpdateGroupByIdGroup ( $group )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->groupTable->InsertGroup( $group) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- Fin de SaveGroups
	

    public function LoadGroups ( )
    // Mode d'emploi :
    //charge dans l'objet Groups les objets Group de la table
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$conf = & $this->groupTable->SelectGroups( );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}
		
		foreach ( $conf as $group )
		{
			$this->Add( new Group ( $group ) );
		}
		
		return NULL;
	} //---- Fin de LoadGroups
	

    public function LoadGroupByIdGroup ( $idGroup )
    // Mode d'emploi :
    //charge dans l'objet Groups le Groupe d'idGroup $idGroup
	//
	// Renvoie :
	//- l'objet Group correspondant en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$group = & $this->groupTable->SelectGroupByIdGroup( $idGroup );
		
		if ( $group instanceOf Errors )
		{
			return $group;
		}
		
		$newGroup = new Group ( $group );
		$this->Add( $newGroup );
		
		return $newGroup;
	} //---- Fin de LoadGroupByIdGroup

    public function LoadGroupsByName ( $nameGroup )
    // Mode d'emploi :
    //charge dans l'objet Groups les Groups de nom $nameGroup
	//
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$groups = & $this->groupTable->FindGroupsByName( $nameGroup );
		
		if ( $groups instanceOf Errors )
		{
			return $groups;
		}
		
		foreach ( $groups as $group )
		{
			$this->Add( new Group ( $group ) );
		}
		
		return NULL;
	} //---- Fin de LoadGroupsByName
	
	public function GetGroupByIdGroup ( $idGroup )
	// Mode d'emploi :
	//permet de récupérer le groupe d'id $idGroup.
	//
	// Renvoie :
	//- un objet de type Group en cas de réussite
	//- un objet de type Errors si la group n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		if ( isset ( $this->groups [ $idGroup ] ) )
		{
			return $this->groups [ $idGroup ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new GroupError ( GroupError::GROUP_NOT_LOADED, 'Group non chargé ou inexistant.' ) );
			
			return $errors;
		}
	} //---- Fin de GetGroupByIdGroup
	
	public function GetGroupByName ( $nameGroup )
	// Mode d'emploi :
	//permet de récupérer le group de nom $nameGroup.
	//
	// Renvoie :
	//- un objet de type Group en cas de réussite
	//- un objet de type Errors si la group n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		foreach ( $this->groups as $group ) 
		{
			if ( $group->GetProperty ( TableGroup::TABLE_COLUMN_NAME ) == $nameGroup )
			{
				return $group;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new GroupError ( GroupError::GROUP_NOT_LOADED, 'Group non chargé ou inexistant.' ) );
			
		return $errors;
	} //---- Fin de GetGroupByName
	
	public function SetGroup ( Group $group )
	// Mode d'emploi :
	//permet de mettre en mémoire dans l'objet le groupe $group.
	//
	//Afin de la sauver dans la base de donnée, il est nécessaire d'appeler SaveGroups().
	//
	// Algorithme :
	{

		$this->Add ( $group );

	} //---- Fin de SetGroup
	
//------------------------------------------- Implémentation de MyIterator

    public function Add( Group $newVar )
    // Mode d'emploi :
    //Ajoute un group à la liste
    //
    {
		$key = $newVar->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP );
	
		if ( empty ( $key ) )
		{
			$this->groups [] = $newVar;		
		}
		else
		{
			$this->groups [ $key ] = $newVar;
		}
    } //---- Fin de Add

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des groupes
    //
    {
        unset($this->groups);
        
        $this->groups = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre de groupes contenus dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $this->groups );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->groups );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->groups );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'id du groupe pointé par la liste
    //
    {
        return Key ( $this->groups );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->groups );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid

//---------------------------------- Fin de l'implémentation de MyIterator

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $groupTable, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie un Groups à partir d'un objet de type BDDTableGroup
	//où BDD représente le type de base actuellement à l'emploi
	//
	// Renvoie par référence dans $errors :
	//- un objet de type Errors en cas d'erreur,
	//- NULL si l'opération s'est parfaitement déroulée.
	//
	// Note : 
	//Un objet de type BDDTableGroups est valide dès lors qu'il implémente
	//l'interface TableGroupInterface.
	//
    // Contrat :
    //
    {
		$errors = NULL;
		
    	if ( ! @in_array( 'TableGroupInterface', class_implements ( $groupTable ) ) )
		{
			$errors = new Errors ( );
			$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table Group correcte.' ) );
		}
		
		$this->groupTable = $groupTable;
		$this->groups = array();
		
    } //---- Fin du constructeur


    public function __destruct ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    } //---- Fin du destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

	protected $groupTable; // contient une instance de
	// BDDTableGroup permettant l'execution des requetes
	
	protected $groups; // contient les groups de group
	// sous forme de BDDRecord indexées par leur nom

}

//-------------------------------- Autres définitions dépendantes de <Groups>



/*************************************************************************
                           |MySQLTableGroup.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLTableGroup> (fichier MySQLTableGroup.php) --------------
if (defined('MYSQLTABLEGROUP_H'))
{
    return;
}
else
{

}
define('MYSQLTABLEGROUP_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <MySQLTableGroup>
//
//
//------------------------------------------------------------------------ 

class MySQLTableGroup extends MySQLTable
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

	public function SelectGroups ()
    // Mode d'emploi :
	//permet de récupérer l'ensemble des utilisateurs.
	//
    // Renvoie :
	//- l'ensemble des groupes sous forme d'objets Group dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		return $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , '' );
	} //---- Fin de SelectGroups
	
	
	public function SelectGroupByIdGroup ( $idGroup )
    // Mode d'emploi :
	//permet de sélectionner le groupe d'id $idGroup.
	//
	// Renvoie :
    //- l'groups d'id $idGroup dans un objet de type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableGroup::TABLE_COLUMN_IDGROUP . MySQLTABLE::MYSQL_SEEK_STRICT . intval($idGroup)
				);	
	} //---- Fin de SelectGroupByIdGroup
	
	
	public function SelectGroupsByIdSite ( $idSite )
    // Mode d'emploi :
	//permet de sélectionner les groupes appartenant au site d'id $idSite.
	//
	// Renvoie :
    //- le groupes d'idSite $idSite dans un objet de type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableGroup::TABLE_COLUMN_IDSITE . MySQLTABLE::MYSQL_SEEK_STRICT . intval ( $idSite )
				);	
	} //---- Fin de SelectGroupsByIdSite
	
	public function FindGroupsByName ( $groupName )
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des groupes de nom $groupName.
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des groupes de nom $groupname dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableGroup::TABLE_COLUMN_NAME . MySQLTABLE::MYSQL_SEEK_REGEX . MySQLTABLE::MYSQL_SEEK_SEPARATOR . addslashes( $groupName ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);	
	} //---- Fin de FindGroupsByName
	
	public function UpdateGroupByIdGroup ( Group $new )
    // Mode d'emploi :
	//permet de mettre à jour une group en fonction de sa propriété
	// TABLE_COLUMN_IDGROUP (clef primaire)
	//
	// Renvoie :
    //- NULL en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Group non validé, merci de le valider avant de lancer une mise à jour') ) ;
			
			return $errors;
		}

		// record validé, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableGroup::TABLE_COLUMN_IDGROUP . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP ) );
		
		if ( ! ($res = $this->IdGroupExists( intval ($new->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre à jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- Fin de UpdateGroupByIdGroup
	
	public function InsertGroup ( Group $group )
    // Mode d'emploi :
	//permet d'ajouter un nouvel group à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de réussite.
	//
	// Contrat :
	{
		return $this->Insert ( $group );
	} //---- Fin de InsertGroup
	
	public function IdGroupExists ( $idGroup )
    // Mode d'emploi :
	//permet de connaitre si l'$idGroup existe dans la table
	//
	// Renvoie :
	//- true si $idGroup est présent,
	//- false sinon.
	//
	// Contrat :
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableGroup::TABLE_COLUMN_IDGROUP . MySQLTable::MYSQL_SEEK_STRICT . intval( $idGroup );
		
		$res = $this->Select( TableGroup::TABLE_COLUMN_IDGROUP, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	}
	
//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <MySQLTableGroup>



/*************************************************************************
                           |TableGroup.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableGroup> (fichier TableGroup.php) --------------
if (defined('TABLEGROUP_H'))
{
    return;
}
else
{

}
define('TABLEGROUP_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableGroup>
//
//
//------------------------------------------------------------------------ 

class TableGroup
{
//----------------------------------------------------------------- PUBLIC

	const TABLE_COLUMN_IDGROUP = 'idgroup';
	// clef primaire d'un utilisateur
	
	const TABLE_COLUMN_NAME = 'name';
	// nom de l'utilisateur
	
	const TABLE_COLUMN_OVERRIDE = 'override';
	// ce groupe est-il omniscient et omnipotent
	
	const TABLE_COLUMN_IDSITE = 'idsite';
	// clef étrangère du site
	
//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <TableGroup>



/*************************************************************************
                           |UserError.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <UserError> (fichier UserError.php) --------------
if (defined('USERERROR_H'))
{
    return;
}
else
{

}
define('USERERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <UserError>
// Extension de la classe Error, elle implémente les constantes spécifiques aux erreurs User
//
//------------------------------------------------------------------------ 

class UserError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const USER_NOT_LOADED = 'USER_NOT_LOADED';

    const USER_IDGROUP_INEXISTANT = 'USER_IDGROUP_INEXISTANT'; // référent IdGroup inexistant
	const USER_LOGIN_EMPTY = 'USER_LOGIN_EMPTY'; // login vide
	
//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <UserError>



/*************************************************************************
                           |TableUserInterface.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableUserInterface>
//
//
//------------------------------------------------------------------------ 

interface TableUserInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectUsers ();
    // Mode d'emploi :
	//permet de récupérer l'ensemble des users.
	//
    // Renvoie :
	//- l'ensemble des users sous forme d'objets User dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectUserByIdUser ( $idUser );
    // Mode d'emploi :
	//permet de sélectionner le user d'id $idUser.
	//
	// Renvoie :
    //- l'ensemble des users d'id $idUser dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function SelectUsersByIdGroup ( $idGroup );
    // Mode d'emploi :
	//permet de sélectionner les utilisateurs appartenant au groupe d'id $idGroup.
	//
	// Renvoie :
    //- l'ensemble des utilisateurs appartenant au groupe d'id $idGroup dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	
	public function FindUsersByName ( $userName );
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des users de nom $username.
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des users de nom $username dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateUserByIdUser ( User $new );
    // Mode d'emploi :
	//permet de mettre à jour une user en fonction de sa propriété
	// TABLE_COLUMN_IDUSER
	//
	// Renvoie :
    //- NULL en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertUser ( User $user );
    // Mode d'emploi :
	//permet d'ajouter une nouvelle user à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de réussite.
	//
	// Contrat :
	
	public function IdUserExists ( $idUser );
    // Mode d'emploi :
	//permet de connaitre si l'$idUser existe dans la table
	//
	// Renvoie :
	//- true si $idUser est présent,
	//- false sinon.
	//
	// Contrat :
    

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <TableUserInterface>



/*************************************************************************
                           |User.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <User> (fichier User.php) --------------
if (defined('USER_H'))
{
    return;
}
else
{

}
define('USER_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <User>
//Gestion d'une entrée de table User
//
//------------------------------------------------------------------------ 

class User extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function Validate ( $groupTable )
    // Mode d'emploi :
    //permettra de valider l'objet courant en vue d'une sauvegarde dans la base
	//de données
	//
	//$groupTable doit etre une instance valide d'un BDDTableGroup.
	//Les classes candidates implémentes l'interface TableGroupInterface.
	//
	// Renvoie :
	//- NULL si l'objet est validé. Il sera alors prêt pour une sauvegarde
	//- un objet de type Errors contenant les erreurs qui empêchent la validation
	//
    // Contrat :
    //
	{
		$errors = new Errors ();
	
		// login
			if ( empty( $this->row[ TableUser::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new UserError ( UserError::USER_LOGIN_EMPTY, 'Veuillez saisir un nom d\'utilisateur.') );
			}
	
		// referent IdGroup
			if ( ! @in_array( 'TableGroupInterface', class_implements ( $groupTable ) ) )
			{
				$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table Group correcte.' ) );
			} 
			else
			{
				if ( ! $groupTable->IdGroupExists( $this->row[ TableGroup::TABLE_COLUMN_IDGROUP ]  ) )
				{
					$errors->Add ( new GroupError ( UserError::USER_IDGROUP_INEXISTANT, 'L\'utilisateur n\'appartient à aucun groupe valide.') );
				}
			}
			
		// résultat
		if ( $errors->GetCount() == 0 )
		{
			$this->isValid = true;
			return NULL;		
		}
		
		
		$this->isValid = false;
		return $errors;
	}
	
//-----------------------------------------------Implémentation Iterator

//---------------------------------------------Fin implémentation Iterator

//-------------------------------------------- Constructeurs - destructeur

    function __construct( BDDRecord & $newRec )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type User à partir d'un objet de
	//type BDDRecord en faisant une copie en profondeur.
	//
    // Contrat :
    //
    {
		// initialisation
		$this->SetProperty ( TableUser::TABLE_COLUMN_IDUSER , '' );
		$this->SetProperty ( TableUser::TABLE_COLUMN_NAME , '' );
		$this->SetProperty ( TableUser::TABLE_COLUMN_PASSWORD , '' );
		$this->SetProperty ( TableUser::TABLE_COLUMN_IDGROUP , '' );

		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] ); // hack php pour acceder
			// a la prop protected $newRec->row
		}
		
		$this->isValid = false;
    } //---- Fin du constructeur
	
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
}

//-------------------------------- Autres définitions dépendantes de <User>



/*************************************************************************
                           |Users.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Users> (fichier Users.php) --------------
if (defined('USERS_H'))
{
    return;
}
else
{

}
define('USERS_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Users>
//
//
//------------------------------------------------------------------------ 

class Users extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques

    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveUsers ( )
    // Mode d'emploi :
    //met à jour les éléments Valides de la liste
	//les ajoute si l'IdUser est inexistant
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un élément n'est pas validé
	//elle n'en tient simplement pas compte dans son traitement.
	//
    // Contrat :
    //
	{		
		foreach ( $this->users as $user )
		{
			if ( $user->IsValid() )
			{
				if ( $this->userTable->IdUserExists ( $user->GetProperty( TableUser::TABLE_COLUMN_IDUSER ) ) )
				{
					if ( ( $errs = $this->userTable->UpdateUserByIdUser ( $user )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->userTable->InsertUser( $user) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- Fin de SaveUsers
	

    public function LoadUsers ( )
    // Mode d'emploi :
    //charge dans l'objet Users les objets User de la table
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$conf = & $this->userTable->SelectUsers( );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}
		
		foreach ( $conf as $user )
		{
			$this->Add( new User ( $user ) );
		}
		
		return NULL;
	} //---- Fin de LoadUsers
	

    public function LoadUsersByIdGroup ( $idGroup )
    // Mode d'emploi :
    //charge dans l'objet Users les objets User de la table ayant pour
	//groupe le groupe d'id $idGroup
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$conf = & $this->userTable->SelectUsersByIdGroup( $idGroup );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}

		foreach ( $conf as $user )
		{
			$this->Add( new User ( $user ) );
		}
		
		return NULL;
	} //---- Fin de LoadUsersByIdGroup
	

    public function LoadUserByIdUser ( $idUser )
    // Mode d'emploi :
    //charge dans l'objet Users le User d'idUser $idUser
	//
	// Renvoie :
	//- l'objet User correspondant en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$user = & $this->userTable->SelectUserByIdUser( $idUser );
		
		if ( $user instanceOf Errors )
		{
			return $user;
		}
		
		$newUser = new User ( $user );
		$this->Add( $newUser );
		
		return $newUser;
	} //---- Fin de LoadUserByIdUser

    public function LoadUsersByName ( $nameUser )
    // Mode d'emploi :
    //charge dans l'objet Users les Users de nom $nameUser
	//
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$users = & $this->userTable->FindUsersByName( $nameUser );
		
		if ( $users instanceOf Errors )
		{
			return $users;
		}
		
		foreach ( $users as $user )
		{
			$this->Add( new User ( $user ) );
		}
		
		return NULL;
	} //---- Fin de LoadUsersByName
	
	public function GetUserByIdUser ( $idUser )
	// Mode d'emploi :
	//permet de récupérer le user d'id $idUser.
	//
	// Renvoie :
	//- un objet de type User en cas de réussite
	//- un objet de type Errors si la user n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		if ( isset ( $this->users [ $idUser ] ) )
		{
			return $this->users [ $idUser ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new UserError ( UserError::USER_NOT_LOADED, 'Utilisateur non chargé ou inexistant.' ) );
			
			return $errors;
		}
	} //---- Fin de GetUserByIdUser
	
	public function GetUserByName ( $nameUser )
	// Mode d'emploi :
	//permet de récupérer le user de nom $nameUser.
	//
	// Renvoie :
	//- un objet de type User en cas de réussite
	//- un objet de type Errors si la user n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		foreach ( $this->users as $user ) 
		{
			if ( $user->GetProperty ( TableUser::TABLE_COLUMN_NAME ) == $nameUser )
			{
				return $user;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new UserError ( UserError::USER_NOT_LOADED, 'User non chargé ou inexistant.' ) );
			
		return $errors;
	} //---- Fin de GetUserByName
	
	public function SetUser ( User $user )
	// Mode d'emploi :
	//permet de mettre en mémoire dans l'objet la user $user.
	//
	//Afin de la sauver dans la base de donnée, il est nécessaire d'appeler SaveUsers().
	//
	// Algorithme :
	{

		$this->Add ( $user );

	} //---- Fin de SetUser
	
//------------------------------------------- Implémentation de MyIterator

    public function Add( User $newVar )
    // Mode d'emploi :
    //Ajoute un utilisateurs à la liste
    //
    {
		$key = $newVar->GetProperty ( TableUser::TABLE_COLUMN_IDUSER );
	
		if ( empty ( $key ) )
		{
			$this->users [] = $newVar;		
		}
		else
		{
			$this->users [ $key ] = $newVar;
		}
    } //---- Fin de Add

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des users
    //
    {
        unset($this->users);
        
        $this->users = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre de users contenus dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $this->users );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->users );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->users );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'id du user pointé par la liste
    //
    {
        return Key ( $this->users );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->users );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid

//---------------------------------- Fin de l'implémentation de MyIterator

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $userTable, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie une Users à partir d'un objet de type BDDTableUser
	//où BDD représente le type de base actuellement à l'emploi
	//
	// Renvoie par référence dans $errors :
	//- un objet de type Errors en cas d'erreur,
	//- NULL si l'opération s'est parfaitement déroulée.
	//
	// Note : 
	//Un objet de type BDDTableUsers est valide dès lors qu'il implémente
	//l'interface TableUserInterface.
	//
    // Contrat :
    //
    {
		$errors = NULL;
		
    	if ( ! @in_array( 'TableUserInterface', class_implements ( $userTable ) ) )
		{
			$errors = new Errors ( );
			$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table User correcte.' ) );
		}
		
		$this->userTable = $userTable;
		$this->users = array();
		
    } //---- Fin du constructeur


    public function __destruct ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    } //---- Fin du destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

	protected $userTable; // contient une instance de
	// BDDTableUser permettant l'execution des requetes
	
	protected $users; // contient les users de user
	// sous forme de BDDRecord indexées par leur nom

}

//-------------------------------- Autres définitions dépendantes de <Users>



/*************************************************************************
                           |MySQLTableUser.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <MySQLTableUser>
//
//
//------------------------------------------------------------------------ 

class MySQLTableUser extends MySQLTable
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

	public function SelectUsers ()
    // Mode d'emploi :
	//permet de récupérer l'ensemble des utilisateurs.
	//
    // Renvoie :
	//- l'ensemble des users sous forme d'objets User dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		return $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , '' );
	} //---- Fin de SelectUsers
	
	
	public function SelectUserByIdUser ( $idUser )
    // Mode d'emploi :
	//permet de sélectionner l'utilisateur d'id $idUser.
	//
	// Renvoie :
    //- l'users d'id $idUser dans un objet de type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_IDUSER.MySQLTABLE::MYSQL_SEEK_STRICT.intval($idUser)
				);	
	} //---- Fin de SelectUserByIdUser
	
	public function SelectUsersByIdGroup ( $idGroup )
    // Mode d'emploi :
	//permet de sélectionner les utilisateurs appartenant au groupe d'id $idGroup.
	//
	// Renvoie :
    //- l'ensemble des utilisateurs appartenant au groupe d'id $idGroup dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_IDGROUP.MySQLTABLE::MYSQL_SEEK_STRICT.intval($idGroup)
				);	
	} //---- Fin de SelectUsersByIdGroup
	
	public function FindUsersByName ( $userName )
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des users de nom $userName.
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des users de nom $username dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR. addslashes($userName).MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);	
	} //---- Fin de FindUsersByName
	
	public function UpdateUserByIdUser ( User $new )
    // Mode d'emploi :
	//permet de mettre à jour une user en fonction de sa propriété
	// TABLE_COLUMN_IDUSER (clef primaire)
	//
	// Renvoie :
    //- NULL en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
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
	} //---- Fin de UpdateUserByIdUser
	
	public function InsertUser ( User $user )
    // Mode d'emploi :
	//permet d'ajouter un nouvel user à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de réussite.
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
	//- true si $idUser est présent,
	//- false sinon.
	//
	// Contrat :
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableUser::TABLE_COLUMN_IDUSER . MySQLTable::MYSQL_SEEK_STRICT . intval( $idUser );
		
		$res = $this->Select( TableUser::TABLE_COLUMN_IDUSER, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	} //---- Fin de IdUserExists
	
//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <MySQLTableUser>



/*************************************************************************
                           |TableUser.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableUser> (fichier TableUser.php) --------------
if (defined('TABLEUSER_H'))
{
    return;
}
else
{

}
define('TABLEUSER_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableUser>
//
//
//------------------------------------------------------------------------ 

class TableUser
{
//----------------------------------------------------------------- PUBLIC

	const TABLE_COLUMN_IDUSER = 'iduser';
	// clef primaire d'un utilisateur
	
	const TABLE_COLUMN_NAME = 'name';
	// nom de l'utilisateur
	
	const TABLE_COLUMN_PASSWORD = 'pass';
	// mot de passe de l'utilisateur
	
	const TABLE_COLUMN_IDGROUP = 'idgroup';
	// clef étrangère du groupe
	
//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <TableUser>



/*************************************************************************
                           |VariableError.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <VariableError> (fichier VariableError.php) --------------
if (defined('VARIABLEERROR_H'))
{
    return;
}
else
{

}
define('VARIABLEERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <VariableError>
// Extension de la classe Error, elle implémente les constantes spécifiques aux erreurs bdd
//
//------------------------------------------------------------------------ 

class VariableError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const VARIABLE_NOT_LOADED = 'VARIABLE_NOT_LOADED'; // variable recherchée inexistante
	
	
    const VARIABLE_NAME_EMPTY = 'VARIABLE_NAME_EMPTY'; // nom de variable inexistant
    const VARIABLE_SCOPE_INCORRECT = 'VARIABLE_SCOPE_INCORRECT'; // scope en dehors de l'énumeration
    const VARIABLE_ACCESS_INCORRECT = 'VARIABLE_ACCESS_INCORRECT'; // access en dehors de l'énumeration
    const VARIABLE_IDSITE_INEXISTANT = 'VARIABLE_IDSITE_INEXISTANT'; // référent IdSite inexistant

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <VariableError>



/*************************************************************************
                           |TableVariableInterface.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableVariableInterface>
//
//
//------------------------------------------------------------------------ 

interface TableVariableInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectServerVariables ();
    // Mode d'emploi :
	//permet de récupérer l'ensemble des variables de configuration liées
	//au serveur.
	//
    // Renvoie :
	//- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SERVER
	//dans un objet de type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectSiteVariables ( $idsite );
    // Mode d'emploi :
	//permet de récupérer l'ensemble des variables de configuration liées
	//à un site.
	//
	// Renvoie :
    //- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SITE
	//et de site n° $idsite en un objet de type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectVariablesByName ( $varName );
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des variables de nom $varname.
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des variables de nom $varname dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateVariableByIdVariable ( Variable $new );
    // Mode d'emploi :
	//permet de mettre à jour une variable en fonction de sa clef IdVariable
	//disponible en tant que propriété TABLE_COLUMN_IDVARIABLE
	//
	// Renvoie :
    //- NULL en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertVariable ( Variable $variable );
    // Mode d'emploi :
	//permet d'ajouter une nouvelle variable à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de réussite.
	//
	// Contrat :
	
	public function IdVariableExists ( $idVariable );
    // Mode d'emploi :
	//permet de connaitre si l'$idVariable existe dans la table
	//
	// Renvoie :
	//- true si $idVariable est présent,
	//- false sinon.
	//
	// Contrat :
    

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <TableVariableInterface>



/*************************************************************************
                           |Variable.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Variable> (fichier Variable.php) --------------
if (defined('VARIABLE_H'))
{
    return;
}
else
{

}
define('VARIABLE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Variable>
//Gestion d'une entrée de table BDD
//
//------------------------------------------------------------------------ 

class Variable extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function Validate ( $siteTable )
    // Mode d'emploi :
    //permettra de valider l'objet courant en vue d'une sauvegarde dans la base
	//de données
	//
	//$siteTable doit etre une instance valide d'un BDDTableSite.
	//Les classes candidates implémentes l'interface TableSiteInterface.
	//
	// Renvoie :
	//- NULL si l'objet est validé. Il sera alors prêt pour une sauvegarde
	//- un objet de type Errors contenant les erreurs qui empêchent la validation
	//
    // Contrat :
    //
	{
		$errors = new Errors ();
	
		// nom de variable
			if ( empty( $this->row[ TableVariable::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_NAME_EMPTY, 'Veuillez saisir un nom de variable.') );
			}
	
		// scope
			if ( $this->row[ TableVariable::TABLE_COLUMN_SCOPE ] != TableVariable::TABLE_COLUMN_SCOPE_SERVER && $this->row[ TableVariable::TABLE_COLUMN_SCOPE ] != TableVariable::TABLE_COLUMN_SCOPE_SITE  )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_SCOPE_INCORRECT, 'La portée de la variable n\'est pas définie correctement.') );
			}
		
		// access
			if ( $this->row[ TableVariable::TABLE_COLUMN_ACCESS ] != TableVariable::TABLE_COLUMN_ACCESS_ROOT && $this->row[ TableVariable::TABLE_COLUMN_ACCESS ] != TableVariable::TABLE_COLUMN_ACCESS_ADMIN )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_ACCESS_INCORRECT, 'Les accès de la variables ne sont pas définis correctement.') );
			}
		
		// referent IdSite
			if ( ! @in_array( 'TableSiteInterface', class_implements ( $siteTable ) ) )
			{
				$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table Site correcte.' ) );
			} 
			else
			{	
				if ( ! $siteTable->IdSiteExists( $this->row[ TableVariable::TABLE_COLUMN_IDSITE ]  ) )
				{
					$errors->Add ( new VariableError ( VariableError::VARIABLE_IDSITE_INEXISTANT, 'La variable n\'appartient à aucun site valide.') );
				}
			}
		
		// résultat
		if ( $errors->GetCount() == 0 )
		{
			$this->isValid = true;
			return NULL;		
		}
		
		
		$this->isValid = false;
		return $errors;
	} //---- Fin de Validate
	
//-----------------------------------------------Implémentation Iterator

//---------------------------------------------Fin implémentation Iterator

//-------------------------------------------- Constructeurs - destructeur

    function __construct( BDDRecord & $newRec )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Variable à partir d'un objet de
	//type BDDRecord en faisant une copie en profondeur.
	//
    // Contrat :
    //
    {
		// initialisation
		$this->SetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_NAME , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_DATA , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_SCOPE , TableVariable::TABLE_COLUMN_SCOPE_SITE );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_ACCESS , TableVariable::TABLE_COLUMN_ACCESS_ADMIN );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_IDSITE , NULL );
	
			
		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] ); // hack php pour acceder
			// a la prop protected $newRec->row
		}
		
		$this->isValid = false;
    } //---- Fin du constructeur
	
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
}

//-------------------------------- Autres définitions dépendantes de <Variable>



/*************************************************************************
                           |Variables.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Variables> (fichier Variables.php) --------------
if (defined('VARIABLES_H'))
{
    return;
}
else
{

}
define('VARIABLES_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Variables>
//
//
//------------------------------------------------------------------------ 

class Variables extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques

    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveVariables ( )
    // Mode d'emploi :
    //met à jour les éléments Valides de la liste
	//les ajoute si l'IdVariable est inexistant
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un élément n'est pas validé
	//elle n'en tient simplement pas compte dans son traitement.
	//
    // Contrat :
    //
	{		
		foreach ( $this->variables as $variable )
		{
			if ( $variable->IsValid() )
			{
				if ( $this->variableTable->IdVariableExists ( $variable->GetProperty( TableVariable::TABLE_COLUMN_IDVARIABLE ) ) )
				{
					if ( ( $errs = $this->variableTable->UpdateVariable( $variable )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->variableTable->InsertVariable( $variable) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- Fin de SaveVariables
	

    public function LoadServerVariables ( )
    // Mode d'emploi :
    //charge dans l'objet Variables la configuration du serveur
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction écrase les variables de même nom dans son indexation.
	// /!\ à l'ordre d'appel avec LoadSiteVariables
	//
    // Contrat :
    //
	{
		$conf = & $this->variableTable->SelectServerVariables( );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}
		
		foreach ( $conf as $variable )
		{
			$this->Add ( new Variable ( $variable ) );
		}
		
		return NULL;
	} //---- Fin de LoadServerVariables

    public function LoadSiteVariables ( $idSite )
    // Mode d'emploi :
    //charge dans l'objet Variables la configuration du site n° $idSite
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction écrase les variables de même nom dans son indexation.
	// /!\ à l'ordre d'appel avec LoadServerVariables
	//
    // Contrat :
    //
	{
		$conf = & $this->variableTable->SelectSiteVariables( $idSite );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}
		
		foreach ( $conf as $variable )
		{
			$this->Add ( new Variable ( $variable ) );
		}
		
		return NULL;
	} //---- Fin de LoadSiteVariables
	
	public function GetVariableByName ( $varName )
	// Mode d'emploi :
	//permet de récupérer la variable de configuration nommée $varName.
	//
	// Renvoie :
	//- un objet de type Variable en cas de réussite
	//- un objet de type Errors si la variable n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		if ( isset ( $this->variables [ $varName ] ) )
		{
			return $this->variables [ $varName ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new VariableError ( VariableError::VARIABLE_NOT_LOADED, 'Variable non chargée ou inexistante.' ) );
			
			return $errors;
		}
	} //---- Fin de GetVariableByName
	
	public function SetVariable ( Variable $variable )
	// Mode d'emploi :
	//permet de mettre en mémoire dans l'objet la variable de configuration $variable.
	//
	//Afin de la sauver dans la base de donnée, il est nécessaire d'appeler SaveVariables().
	//
	// Algorithme :
	{

		$this->Add ( $variable );

	} //---- Fin de SetVariable
	
//------------------------------------------- Implémentation de MyIterator

    public function Add( Variable $newVar )
    // Mode d'emploi :
    //Ajoute une variable à la liste
    //
    {
		$key = $newVar->GetProperty ( TableVariable::TABLE_COLUMN_NAME );
	
		if ( empty ( $key ) )
		{
			$this->variables [] = $newVar;		
		}
		else
		{
			$this->variables [ $key ] = $newVar;
		}
    } //---- Fin de Add

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des variables
    //
    {
        unset($this->variables);
        
        $this->variables = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre de variables contenues dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $this->variables );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->variables );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->variables );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le nom de la variable pointée par la liste
    //
    {
        return Key ( $this->variables );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->variables );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid

//---------------------------------- Fin de l'implémentation de MyIterator

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $variableTable, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie une Variables à partir d'un objet de type BDDTableVariables
	//où BDD représente le type de base actuellement à l'emploi
	//
	// Renvoie par référence dans $errors :
	//- un objet de type Errors en cas d'erreur,
	//- NULL si l'opération s'est parfaitement déroulée.
	//
	// Note : 
	//Un objet de type BDDTableVariables est valide dès lors qu'il implémente
	//l'interface TableVariablesInterface et si elle défini les constantes
	//de structure de la table.
	//
    // Contrat :
    //
    {
		$errors = NULL;
		
    	if ( ! @in_array( 'TableVariableInterface', class_implements ( $variableTable ) ) )
		{
			$errors = new Errors ( );
			$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table Variable correcte.' ) );
		}
		
		$this->variableTable = $variableTable;
		$this->variables = array();
		
    } //---- Fin du constructeur


    public function __destruct ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    } //---- Fin du destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

	protected $variableTable; // contient une instance de
	// BDDTableVariable permettant l'execution des requetes
	
	protected $variables; // contient les variables de variable
	// sous forme de BDDRecord indexées par leur nom

}

//-------------------------------- Autres définitions dépendantes de <Variables>



/*************************************************************************
                           |MySQLTableVariable.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <MySQLTableVariable>
//
//
//------------------------------------------------------------------------ 

class MySQLTableVariable extends MySQLTable implements TableVariableInterface
{
//----------------------------------------------------------------- PUBLIC	

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
	public function SelectServerVariables ()
    // Mode d'emploi :
	//permet de récupérer l'ensemble des variables de configuration liées
	//au serveur.
	//
    // Renvoie :
	//- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SERVER
	//dans un objet de type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		return $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , MySQLTABLE::MYSQL_CLAUSE_WHERE . TableVariable::TABLE_COLUMN_SCOPE . MySQLTABLE::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR . TableVariable::TABLE_COLUMN_SCOPE_SERVER .MySQLTABLE::MYSQL_SEEK_SEPARATOR );
	} //---- Fin de SelectServerVariable
	
	public function SelectSiteVariables ( $idsite )
    // Mode d'emploi :
	//permet de récupérer l'ensemble des variables de configuration liées
	//à un site.
	//
	// Renvoie :
    //- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SITE
	//et de site n° $idsite en un objet de type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		return $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableVariable::TABLE_COLUMN_SCOPE.MySQLTABLE::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR.TABLE_COLUMN_SCOPE_SITE . MySQLTABLE::MYSQL_SEEK_SEPARATOR .
						MySQLTABLE::MYSQL_CLAUSE_AND.
								TableVariable::TABLE_COLUMN_SITE.MySQLTABLE::MYSQL_SEEK_STRICT.MySQLTABLE::MYSQL_SEEK_SEPARATOR.$idsite.MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);
	} //---- Fin de SelectSiteVariable
	
	public function SelectVariablesByName ( $varName )
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des variables de nom $varname.
	//Il est possible ici d'utiliser les caractères magiques MYSQL_SEEK_MULTICHARS et MYSQL_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des variables de nom $varname dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableVariable::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR.$varName.MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);	
	} //---- Fin de SelectVariablesByName
	
	public function UpdateVariableByIdVariable ( Variable $new )
    // Mode d'emploi :
	//permet de mettre à jour une variable en fonction de sa clef IdVariable
	//disponible en tant que propriété TABLE_COLUMN_IDVARIABLE
	//
	// Renvoie :
    //- un objet de type BDDRecordSet en cas de réussite
	//- un objet de type Errors sinon
	//
    // Contrat :
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
	} //---- Fin de UpdateVariableByIdVariable
	
	public function InsertVariable ( Variable $variable )
    // Mode d'emploi :
	//permet d'ajouter une nouvelle variable à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- un objet de type BDDRecordSet en cas de réussite.
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
	//- true si $idVariable est présent,
	//- false sinon.
	//
	// Contrat :
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableVariable::TABLE_COLUMN_IDVARIABLE . MySQLTABLE::MYSQL_SEEK_SEPARATOR . MySQLTable::MYSQL_SEEK_STRICT . intval( $idVariable ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR;
		
		$res = $this->Select( TableVariable::TABLE_COLUMN_IDVARIABLE, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	}
	
//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <MySQLTableVariable>



/*************************************************************************
                           |TableVariable.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableVariable> (fichier TableVariable.php) --------------
if (defined('TABLEVARIABLE_H'))
{
    return;
}
else
{

}
define('TABLEVARIABLE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableVariable>
//
//
//------------------------------------------------------------------------ 

class TableVariable
{
//----------------------------------------------------------------- PUBLIC

	const TABLE_COLUMN_IDVARIABLE = 'idvariable';
	// clef primaire identifiant de la var
	
	const TABLE_COLUMN_SCOPE = 'scope';
	// portée de la donnée. portées possibles : TABLE_COLUMN_SCOPE_SITE ou
	//	TABLE_COLUMN_SCOPE_SERVER
	
	// énumération TABLE_COLUMN_SCOPE
	
		const TABLE_COLUMN_SCOPE_SITE = 'SITE';
		// la donnée ne concernera que le site en question.
		// cette portée prévalue sur l'autre.
		
		const TABLE_COLUMN_SCOPE_SERVER = 'SERVER';
		// la donnée concernera tous les sites hébergés.
		
	// fin de l'énumération TABLE_COLUMN_SCOPE
	
	
	const TABLE_COLUMN_ACCESS = 'access';
	// défini quels sont les personnes qui peuvent modifier la donnée

	// énumération TABLE_COLUMN_ACCESS
	
		const TABLE_COLUMN_ACCESS_ROOT = 'ROOT';
		// la donnée ne pourra être modifiée que par les 
		//administrateurs des sites
		
		const TABLE_COLUMN_ACCESS_ADMIN = 'ADMIN';
		// la donnée pourra être modifiée par les administrateur du site
		
	// fin de l'énumération TABLE_COLUMN_ACCESS
	
	const TABLE_COLUMN_NAME = 'name';
	// nom de la donnée
	
	const TABLE_COLUMN_DATA = 'data';
	// donnée stockée échapée en addslashes().
	
	const TABLE_COLUMN_IDSITE = 'idsite';
	// clef étrangère définissant le site auquel la donnée est rattachée
	

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <TableVariable>



/*************************************************************************
                           |SiteError.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <SiteError> (fichier SiteError.php) --------------
if (defined('SITEERROR_H'))
{
    return;
}
else
{

}
define('SITEERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <SiteError>
// Extension de la classe Error, elle implémente les constantes spécifiques aux erreurs Site
//
//------------------------------------------------------------------------ 

class SiteError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const SITE_NOT_LOADED = 'SITE_NOT_LOADED';

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <SiteError>



/*************************************************************************
                           |TableSiteInterface.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableSiteInterface>
//
//
//------------------------------------------------------------------------ 

interface TableSiteInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectSites ();
    // Mode d'emploi :
	//permet de récupérer l'ensemble des sites.
	//
    // Renvoie :
	//- l'ensemble des sites sous forme d'objets Site dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectSiteByIdSite ( $idSite );
    // Mode d'emploi :
	//permet de sélectionner le site d'id $idSite.
	//
	// Renvoie :
    //- l'ensemble des sites d'id $idSite dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function FindSitesByName ( $siteName );
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des sites de nom $sitename.
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des sites de nom $sitename dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateSiteByIdSite ( Site $new );
    // Mode d'emploi :
	//permet de mettre à jour une site en fonction de sa propriété
	// TABLE_COLUMN_IDSITE
	//
	// Renvoie :
    //- NULL en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertSite ( Site $site );
    // Mode d'emploi :
	//permet d'ajouter une nouvelle site à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de réussite.
	//
	// Contrat :
	
	public function IdSiteExists ( $idSite );
    // Mode d'emploi :
	//permet de connaitre si l'$idSite existe dans la table
	//
	// Renvoie :
	//- true si $idSite est présent,
	//- false sinon.
	//
	// Contrat :
    

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <TableSiteInterface>



/*************************************************************************
                           |Site.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Site> (fichier Site.php) --------------
if (defined('SITE_H'))
{
    return;
}
else
{

}
define('SITE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Site>
//Gestion d'une entrée de table Site
//
//------------------------------------------------------------------------ 

class Site extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function Validate (  )
    // Mode d'emploi :
    //permettra de valider l'objet courant en vue d'une sauvegarde dans la base
	//de données
	//
	// Renvoie :
	//- NULL si l'objet est validé. Il sera alors prêt pour une sauvegarde
	//- un objet de type Errors contenant les erreurs qui empêchent la validation
	//
    // Contrat :
    //
	{
		$this->isValid = ! empty( $this->row[ TableSite::TABLE_COLUMN_NAME ] );
		
		return NULL;
	}
	
//-----------------------------------------------Implémentation Iterator

//---------------------------------------------Fin implémentation Iterator

//-------------------------------------------- Constructeurs - destructeur

    function __construct( BDDRecord & $newRec )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Site à partir d'un objet de
	//type BDDRecord en faisant une copie en profondeur.
	//
    // Contrat :
    //
    {
		// initialisation
		$this->SetProperty ( TableSite::TABLE_COLUMN_IDSITE , '' );
		$this->SetProperty ( TableSite::TABLE_COLUMN_NAME , '' );

		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] ); // hack php pour acceder
			// a la prop protected $newRec->row
		}
		
		$this->isValid = false;
    } //---- Fin du constructeur
	
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
}

//-------------------------------- Autres définitions dépendantes de <Site>



/*************************************************************************
                           |Sites.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Sites> (fichier Sites.php) --------------
if (defined('SITES_H'))
{
    return;
}
else
{

}
define('SITES_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Sites>
//
//
//------------------------------------------------------------------------ 

class Sites extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques

    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveSites ( )
    // Mode d'emploi :
    //met à jour les éléments Valides de la liste
	//les ajoute si l'IdSites est inexistant
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un élément n'est pas validé
	//elle n'en tient simplement pas compte dans son traitement.
	//
    // Contrat :
    //
	{		
		foreach ( $this->sites as $site )
		{
			if ( $site->IsValid() )
			{
				if ( $this->siteTable->IdSiteExists ( $site->GetProperty( TableSite::TABLE_COLUMN_IDSITE ) ) )
				{
					if ( ( $errs = $this->siteTable->UpdateSiteByIdSite ( $site )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->siteTable->InsertSite( $site) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- Fin de SaveSites
	

    public function LoadSites ( )
    // Mode d'emploi :
    //charge dans l'objet Sites les objets Site de la table
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$conf = & $this->siteTable->SelectSites( );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}
		
		foreach ( $conf as $site )
		{
			$this->Add( new Site ( $site ) );
		}
		
		return NULL;
	} //---- Fin de LoadSites
	

    public function LoadSiteByIdSite ( $idSite )
    // Mode d'emploi :
    //charge dans l'objet Sites le Site d'idSite $idSite
	//
	// Renvoie :
	//- l'objet Site correspondant en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$site = & $this->siteTable->SelectSiteByIdSite ( $idSite );
		
		if ( $site instanceOf Errors )
		{
			return $site;
		}
		
		$newSite = new Site ( $site );
		$this->Add( $newSite );
		
		return $newSite;
	} //---- Fin de LoadSiteByIdSite

    public function LoadSitesByName ( $nameSite )
    // Mode d'emploi :
    //charge dans l'objet Sites les Sites de nom $nameSite
	//
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$sites = & $this->siteTable->FindSitesByName ( $nameSite );
		
		if ( $sites instanceOf Errors )
		{
			return $sites;
		}
		
		foreach ( $sites as $site )
		{
			$this->Add( new Site ( $site ) );
		}
		
		return NULL;
	} //---- Fin de LoadSitesBeName
	
	public function GetSiteByIdSite ( $idSite )
	// Mode d'emploi :
	//permet de récupérer le site d'id $idSite.
	//
	// Renvoie :
	//- un objet de type Site en cas de réussite
	//- un objet de type Errors si la site n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		if ( isset ( $this->sites [ $idSite ] ) )
		{
			return $this->sites [ $idSite ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new SiteError ( SiteError::SITE_NOT_LOADED, 'Site non chargé ou inexistant.' ) );
			
			return $errors;
		}
	} //---- Fin de GetSiteByIdSite
	
	public function GetSiteByName ( $nameSite )
	// Mode d'emploi :
	//permet de récupérer le site de nom $nameSite.
	//
	// Renvoie :
	//- un objet de type Site en cas de réussite
	//- un objet de type Errors si la site n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		foreach ( $this->sites as $site ) 
		{
			if ( $site->GetProperty ( TableSite::TABLE_COLUMN_NAME ) == $nameSite )
			{
				return $site;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new SiteError ( SiteError::SITE_NOT_LOADED, 'Site non chargé ou inexistant.' ) );
			
		return $errors;
	} //---- Fin de GetSiteByName
	
	public function SetSite ( Site $site )
	// Mode d'emploi :
	//permet de mettre en mémoire dans l'objet la site $site.
	//
	//Afin de la sauver dans la base de donnée, il est nécessaire d'appeler SaveSites().
	//
	// Algorithme :
	{
		$this->Add ( $site );
	} //---- Fin de SetSite
	
//------------------------------------------- Implémentation de MyIterator

    public function Add( Site $newVar )
    // Mode d'emploi :
    //Ajoute un site à la liste
    //
    {
		$key = $newVar->GetProperty ( TableSite::TABLE_COLUMN_IDSITE );
	
		if ( empty ( $key ) )
		{
			$this->sites [] = $newVar;		
		}
		else
		{
			$this->sites [ $key ] = $newVar;
		}
    } //---- Fin de Add

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des sites
    //
    {
        unset($this->sites);
        
        $this->sites = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre de sites contenus dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $this->sites );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->sites );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->sites );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'id du site pointé par la liste
    //
    {
        return Key ( $this->sites );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->sites );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid

//---------------------------------- Fin de l'implémentation de MyIterator

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $siteTable, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie une Sites à partir d'un objet de type BDDTableSite
	//où BDD représente le type de base actuellement à l'emploi
	//
	// Renvoie par référence dans $errors :
	//- un objet de type Errors en cas d'erreur,
	//- NULL si l'opération s'est parfaitement déroulée.
	//
	// Note : 
	//Un objet de type BDDTableSites est valide dès lors qu'il implémente
	//l'interface TableSiteInterface.
	//
    // Contrat :
    //
    {
		$errors = NULL;
		
    	if ( ! @in_array( 'TableSiteInterface', class_implements ( $siteTable ) ) )
		{
			$errors = new Errors ( );
			$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table Site correcte.' ) );
		}
		
		$this->siteTable = $siteTable;
		$this->sites = array();
		
    } //---- Fin du constructeur


    public function __destruct ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    } //---- Fin du destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

	protected $siteTable; // contient une instance de
	// BDDTableSite permettant l'execution des requetes
	
	protected $sites; // contient les sites de site
	// sous forme de BDDRecord indexées par leur nom

}

//-------------------------------- Autres définitions dépendantes de <Sites>



/*************************************************************************
                           |MySQLTableSite.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <MySQLTableSite>
//
//
//------------------------------------------------------------------------ 

class MySQLTableSite extends MySQLTable
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

	public function SelectSites ()
    // Mode d'emploi :
	//permet de récupérer l'ensemble des sites.
	//
    // Renvoie :
	//- l'ensemble des sites sous forme d'objets Site dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		return $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , '' );
	} //---- Fin de SelectSites
	
	
	public function SelectSiteByIdSite ( $idSite )
    // Mode d'emploi :
	//permet de sélectionner le site d'id $idSite.
	//
	// Renvoie :
    //- le site d'id $idSite dans un objet de type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableSite::TABLE_COLUMN_IDSITE . MySQLTABLE::MYSQL_SEEK_STRICT. intval( $idSite )
				);	
	} //---- Fin de SelectSiteByIdSite
	
	public function FindSitesByName ( $siteName )
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des sites de nom $siteName.
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des sites de nom $sitename dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableSite::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR. addslashes( $siteName ).MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);	
	} //---- Fin de FindSitesByName
	
	public function UpdateSiteByIdSite ( Site $new )
    // Mode d'emploi :
	//permet de mettre à jour une site en fonction de sa propriété
	// TABLE_COLUMN_IDSITE (clef primaire)
	//
	// Renvoie :
    //- NULL en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Site non validé, merci de le valider avant de lancer une mise à jour') ) ;
			
			return $errors;
		}

		// record validé, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableSite::TABLE_COLUMN_IDSITE . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableSite::TABLE_COLUMN_IDSITE ) );
		
		if ( ! ($res = $this->IdSiteExists( intval ($new->GetProperty ( TableSite::TABLE_COLUMN_IDSITE ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre à jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- Fin de UpdateSite
	
	public function InsertSite ( Site $site )
    // Mode d'emploi :
	//permet d'ajouter une nouvelle site à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de réussite.
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
	//- true si $idSite est présent,
	//- false sinon.
	//
	// Contrat :
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableSite::TABLE_COLUMN_IDSITE . MySQLTable::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR . intval( $idSite ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR;
		
		$res = $this->Select( TableSite::TABLE_COLUMN_IDSITE, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	}
	
//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <MySQLTableSite>



/*************************************************************************
                           |TableSite.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableSite> (fichier TableSite.php) --------------
if (defined('TABLESITE_H'))
{
    return;
}
else
{

}
define('TABLESITE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableSite>
//
//
//------------------------------------------------------------------------ 

class TableSite
{
//----------------------------------------------------------------- PUBLIC

	const TABLE_COLUMN_IDSITE = 'idsite';
	// identifiant d'un site
	
	const TABLE_COLUMN_NAME = 'name';
	// nom du site
	
//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <TableSite>


?>