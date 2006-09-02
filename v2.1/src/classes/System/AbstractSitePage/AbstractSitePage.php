<?php

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

		$hooksManager = HooksManager::GetInstance();
		
		$hooksManager->Register ( WebApplication::HOOK_START, array ( & $this, 'OnLoad' ) );
		$hooksManager->Register ( WebApplication::HOOK_SHUTDOWN, array ( & $this, 'OnUnLoad' ) );

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
		return parent::__ToString();
    } //----- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	
	/** application object linked to SitePage */
	protected $application;

}

//------------------------------------------------------ other definitions


?>