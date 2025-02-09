<?php

/*************************************************************************
                           |Error.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Error> (file Error.php) --------------
/*if (defined('ERROR_H'))
{
    return;
}
else
{

}
define('ERROR_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides Error management. An error is composed by an error code and a
 * message.
 */
//------------------------------------------------------------------------ 

class Error extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
    
	/**
	 * Gets message associated to the error.
	 *
	 * @return The message associated to the error
	 *
     */
    public function GetMessage( )
    {
        return $this->erreurString;
    }
    
	/**
	 * Gets code associated to the error.
	 *
	 * @return The code associated to the error
	 *
     */
    public function GetCode( )
    {
        return $this->erreurCode;
    }

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises an Error object from a $code and a message $str.
	 *
	 * @param $code The error code
	 * @param $str The message associated to the error
	 *
     */
    public function __construct( $code, $str )
    {
		parent::__construct();
	
        $this->erreurCode = $code;
        $this->erreurString = $str;
    } //---- End of constructor
	
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
        return $this->erreurString;
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	/** the code of the error */
    protected $erreurCode;
	
	/** the message of the error */
    protected $erreurString;
}

//------------------------------------------------------ other definitions

?>