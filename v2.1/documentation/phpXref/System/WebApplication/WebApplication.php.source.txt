<?php

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

?>