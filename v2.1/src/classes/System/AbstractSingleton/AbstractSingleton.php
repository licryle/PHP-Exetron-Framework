<?php

/*************************************************************************
                           |AbstractSingleton.php|
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <AbstractSingleton> (file AbstractSingleton.php) --------------
/*if (defined('ABSTRACTSINGLETON_H'))
{
    return;
}
else
{

}
define('ABSTRACTSINGLETON_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides generic methods for singleton classes.
 * A singleton class can only have 1 instance running at a time.
 */
//------------------------------------------------------------------------ 

abstract class AbstractSingleton
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
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
	abstract public static function GetInstance ( );
	//{
	//	return parent::getThis ( __CLASS__ );
	//}

//-------------------------------------------- Constructeurs - destructeur
	/**
	 * instanciates an AbstractSingleton (for overwriting only).
	 *
	 */
    protected function __construct()
    {
    } //---- End of __construct
	 
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{
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
	
	/**
	 * Gets a unique instance of class $class.
	 * Create it if it doesn't exist.
	 *
	 * @param $class the name of the class to be instancied or gotten
	 *
	 * @return unique instance of class $class
	 *
	 */
    protected static function getThis ( $class )
	{
		if ( !IsSet ( self::$instance ) || ! IsSet ( self::$instance[ $class ] ) )
		// instance creation
		{
			self::$instance[ $class ] = new $class(); 
		}

		return self::$instance[ $class ];
	} //----- End of getThis


//------------------------------------------------------ protected members
	/** Array of handlers indexed by classname */
	protected static $instance;
}

//------------------------------------------------------ other definitions

?>