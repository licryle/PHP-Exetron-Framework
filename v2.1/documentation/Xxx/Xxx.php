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
    public function __construct()
	/*
	 * initialises an Xxx object
	 *
	 */
    {
    	parent::__construct();
    } //---- End of __construct


    public function __destruct ( )
	/**
	 * Destructs ressources allocated
	 */
    {
    	parent::__destruct();
    } //---- End of __destruct
    
//---------------------------------------------------------- Magic Methods

    public function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    {
		return parent::__ToString();
    } //---- End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions

?>