<?php

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
    // protected type Méthode ( );
    // User's manual :
    //
    // Contract :
    //

//--------------------------------------------------- protected properties

	protected $pageTemplate; // XHTML Page Template
}

//----------------------------------------------------- Others definitions

?>