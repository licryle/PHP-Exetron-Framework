<?php

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

?>