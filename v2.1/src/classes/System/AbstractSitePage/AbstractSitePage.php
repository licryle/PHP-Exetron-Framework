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
    } //----- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions


?>