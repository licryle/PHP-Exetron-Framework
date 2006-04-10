<?php

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
		parent::__construct();
		
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
}

//----------------------------------------------------- Others definitions

?>