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
    public function __construct()
    /**
	 * Initialises object
     */
	{
	} //---- End of constructor
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
        /*$vars = get_object_vars($this);
        
        foreach($vars as $key => $var)
        {
          //  unset($this->{$key});
        }
        
        unset($vars);   */    
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods

    public function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 */
    {
        return (string)var_export($this);
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
}

//------------------------------------------------------ other definitions

?>