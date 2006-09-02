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

	/**
	 * Hook called when Page has been generated. You can modify $pageContent
	 * just before it is printed to the screen. This hook provides an easy
	 * way to modify final content.
	 *
	 * Prototype :
	 * function hook( & $pageContent );
	 */
	const HOOK_PAGE_GENERATION = 'XHTMLSitePage_Page_Generation';
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
		
		$pageContent = $this->pageTemplate->Generate();
		HooksManager::GetInstance()->Trigger(XHTMLSitePage::HOOK_PAGE_GENERATION, array(& $pageContent) );
		
		echo $pageContent;
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
		return parent::__ToString();
    } //----- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties
	/** The XHTMLPageTemplate */
	protected $pageTemplate;
}

//----------------------------------------------------- Others definitions

?>