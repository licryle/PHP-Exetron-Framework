<?php

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
	/**
	 * instanciates a Template.
	 *
	 */
    public function __construct( )
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
	 * Returns a printable version of object for final print out.
	 *
	 * @return String printable on screen
	 *
	 * @see Template::Generate()
	 * 
	 */
	public function __ToString ()
	{
		return $this->Generate ( );
	} // End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions

?>