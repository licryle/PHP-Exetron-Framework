<?php

/*************************************************************************
                           |Xxx.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <Xxx> (file Xxx.php) -----------------
/*if (defined('XXX_H'))
{
    return;
}
else
{

}
define('XXX_H',1);*/

//--------------------------------------------------------------- Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 *
 */
//------------------------------------------------------------------------ 

class Xxx extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- Public Methods

//---------------------------------------------- Constructors - destructor
	/*
	 * initialises an Xxx object
	 *
	 */
    public function __construct()
    {
    	parent::__construct();
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
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    public function __ToString ( )
    {
		return parent::__ToString();
    } //---- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions

?>