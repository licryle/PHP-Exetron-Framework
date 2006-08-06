<?php

/*************************************************************************
                           |SessionInterface.php|
                             -------------------
    début                : |28.07.2006|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//----- Interface <SessionInterface> (file SessionInterface.php) ---------
/*if (defined('SESSION_H'))
{
    return;
}
else
{

}
define('SESSION_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides basic methods for all sessions management
 */
//------------------------------------------------------------------------ 

interface SessionInterface
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    /** 
	 * Destructs the sessions and all informations relatives to this session
	 */
    public function Destruct( );
	
	/**
	 * Gets the session id.
	 *
	 * @return The id of the session
	 */
    public function GetId( );
   
	/**
	 * Sets the session id.
	 *
	 * This function must be call before the first call of GetInstance().
	 *
	 * @param $id the id to be set.
	 *
	 */
    public static function SetId( $id );
	
	/**
	 * Checks whether the varaiable named $name exists or not.
	 *
	 * @param $name The name of the variable to check for
	 *
	 * @return - True if a variable named $name exists
	 * @return - False otherwise
	 */
    public function IsSetVariable( $name );
	
	/**
	 * Unsets the variable named $name.
	 *
	 * @param $name The name of the variable to be unsetted
	 *
	 * @return - an object of type Errors in case of error(s)
	 * @return - NULL if operation was successful
	 */
    public function UnSetVariable( $name );
    
	/**
	 * Sets the variable named $name with the value $value.
	 * If a variable named $name already exists, it is replaced.
	 *
	 * $name must NOT be only numéric or it will not be saved (due to
	 * a bug in PHP's API).
	 *
	 * @param $name The name of the variable to be set.
	 * @param $value The value to be associated to variable named $name
	 *
	 */
    public function SetVariable(  $name, $value );

	/**
	 * Gets the value associated to variable named $name.
	 *
	 * @param $name The name of the variable to be get.
	 *
	 * @return - an object of type Errors in case of error(s)
	 * @return - the content of the variable named $name
	 *
	 */
    public function GetVariable( $name );
	
}

//------------------------------------------------------ other definitions

?>