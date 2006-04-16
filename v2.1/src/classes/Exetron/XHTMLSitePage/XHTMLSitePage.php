<?php

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
	} //----- End of GetInstance
	

    public function OnLoad ( )
	/**
	 * callback function to be called by Application on ApplicationStart.
	 * Initializes the page with an XHTMLPageTemplate.
	 *
	 * @see Application class
	 *
	 */
	{
		$this->pageTemplate = new XHTMLPageTemplate () ;	
	} //---- End of OnLoad
	
    public function Process ( )
	/**
	 * Function called after OnLoad and before OnUnLoad.
	 * Here is all the process of the page.
	 *
	 */
	{
	} //---- End of Process
	
    public function OnUnLoad ( $applicationVars )
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
	{
		$exectime = new Template();
		$exectime->SetSkeleton ( round( microtime(true) - $applicationVars[ Application::SYSTEM_START_TIME ], 4 ) );

		$this->pageTemplate->GetBody()->SetTag( self::TAG_EXECUTION_TIME, $exectime );
			
		echo $this->pageTemplate;
	} //---- End of OnUnLoad

//---------------------------------------------- Constructors - destructor
    protected function __construct()
	/**
	 * instanciates an XHTMLSitePage.
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

//--------------------------------------------------- protected properties
	/** The XHTMLPageTemplate */
	protected $pageTemplate;
}

//----------------------------------------------------- Others definitions

?>