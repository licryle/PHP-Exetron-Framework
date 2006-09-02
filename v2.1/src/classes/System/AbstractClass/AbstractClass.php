<?php

/*************************************************************************
                           |AbstractClass.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <AbstractClass> (file AbstractClass.php) --------------
/*if (defined('ABSTRACTCLASS_H'))
{
    return;
}
else
{

}
define('ABSTRACTCLASS_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for all classes possible
 */
//------------------------------------------------------------------------ 

abstract class AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

//-------------------------------------------- Constructeurs - destructeur
    /**
	 * Initialises object
     */
    public function __construct()
	{
	} //---- End of constructor
	
	/**
	 * Destructs ressources allocated
	 */
    public function __destruct( )
	{
        /*$vars = get_object_vars($this);
        
        foreach($vars as $key => $var)
        {
          //  unset($this->{$key});
        }
        
        unset($vars);   */    
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods

    /**
	 * Returns a printable version of object for debugging.
	 */
    public function __ToString ( )
    {
        return (string)var_export($this);
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
}

//------------------------------------------------------ other definitions

?>