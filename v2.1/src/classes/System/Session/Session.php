<?php

/*************************************************************************
                           |Session.php|
                             -------------------
    d�but                : |09.02.2006|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Class <Session> (file Session.php) --------------
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
 * Provides an abstraction for basic PHP's sessions management.
 */
//------------------------------------------------------------------------ 

class Session extends AbstractSingleton implements Iterator, SessionInterface//, AbstractIterator
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
    public static function GetInstance ( )
	{	
		return parent::getThis( __CLASS__ );
	} //---- End of GetInstance
   
    /** 
	 * Destructs the sessions and all informations relatives to this session
	 */
    public function Destruct( )
    {
		session_destroy ( );
		
		unset ( $_SESSION );
		$_SESSION = array();
    } //---- End of Destruct 
	
	/**
	 * Gets the session id.
	 *
	 * @return The id of the session
	 */
    public function GetId( )
    {
		return session_id ( );
    } //---- End of GetId 
   
	/**
	 * Sets the session id.
	 *
	 * This function must be call before the first call of GetInstance().
	 *
	 * @param $id the id to be set.
	 *
	 */
    public static function SetId( $id )
    {
		session_id ( $id );
    } //---- End of SetId

	/**
	 * Checks whether the varaiable named $name exists or not.
	 *
	 * @param $name The name of the variable to check for
	 *
	 * @return - True if a variable named $name exists
	 * @return - False otherwise
	 */
    public function IsSetVariable( $name )
    {
		return isset( $_SESSION [ $name ] );
    } //---- End of IsSetVariable 
	
	/**
	 * Unsets the variable named $name.
	 *
	 * @param $name The name of the variable to be unsetted
	 *
	 * @return - an object of type Errors in case of error(s)
	 * @return - NULL if operation was successful
	 */
    public function UnSetVariable( $name )
    {
		if ( ! $this->IsSetVariable ( $name ) )
		{
			$errors = new Errors();
			$errors->Add ( new SessionError ( SessionError::SESSION_VARIABLE_NOT_SET, 'Impossible de d�truire une variable non mise en place.' ) ) ;
			
			return $errors;
		}
		else
		{
			unset ( $_SESSION [ $name ] );
			
			return NULL;
		}
    } //---- End of UnSetVariable 

    
	/**
	 * Sets the variable named $name with the value $value.
	 * If a variable named $name already exists, it is replaced.
	 *
	 * $name must NOT be only num�ric or it will not be saved (due to
	 * a bug in PHP's API).
	 *
	 * @param $name The name of the variable to be set.
	 * @param $value The value to be associated to variable named $name
	 *
	 */
    public function SetVariable(  $name, $value )
    {	
		$_SESSION [ $name ] = $value;
    } //---- End of SetVariable

	/**
	 * Gets the value associated to variable named $name.
	 *
	 * @param $name The name of the variable to be get.
	 *
	 * @return - an object of type Errors in case of error(s)
	 * @return - the content of the variable named $name
	 *
	 */
    public function GetVariable( $name )
    {
		if ( ! $this->IsSetVariable ( $name ) )
		{
			$errors = new Errors();
			$errors->Add ( new SessionError ( SessionError::SESSION_VARIABLE_NOT_SET, 'Impossible d\'obtenir une variable non mise en place.' ) ) ;
			
			return $errors;
		}
		else
		{
			return ( $_SESSION [ $name ] );
		}
    } //---- End of GetVariable

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset( $_SESSION );
        
        $_SESSION = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $_SESSION );
    } //---- End of GetCount
    
//--------------------------------------------- Iterator's Impl�mentation
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $_SESSION );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $_SESSION );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return Key ( $_SESSION );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $_SESSION );
    } //---- End of Next
    
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    public function Valid( )
    {
        return Session::current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's impl�mentation

//-------------------------------------------- Constructeurs - destructeur
	/**
	 * Instanciates a Session object.
	 *
	 * Instianciation must happen before any print out to the screen.
	 *
	 * It will try to determine if a session is active and will work with
	 * if found.
	 *
	 * If no active session has ben found, a new session will be created
	 * with an unique id.
	 *
	 * @see http://fr.php.net/manual/en/function.session-start.php
	 *
	 */
    protected function __construct( $sessId = '', $sessName = '' )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Session.
	//Si $sessId est fourni, celui-ci servira d'identifiant de session
	//Dans le cas contraire, l'identifiant sera celui r�cup�r� via Cookie, 
	//Get ou Post.
	//Enfin, si aucun n'est r�cup�r�, celui-ci sera g�n�r�.
	//
	//Si $sessName est fournit, celui est modifie le nom de la session.
	//
    // Contrat :
    //- l'instanciation doit s'effectuer avant toute sortie � l'�cran aEnd of 
	//que les entetes cookie soient correctement envoy�es.
	//- $sessName doit etre alphanumerique sinon le nom ne sera pas chang�
    {
		// nom de session
		if ( ereg ( '[a-zA-Z0-9]+', $sessName ) )
		{
			session_name ( $sessName );
		}

		// start session
    	session_start( );
    } //---- End of constructeur

	/**
	 * Destructs ressources allocated
	 *
	 * Does not destruct the session, just the Session object.
	 */
    public function __destruct ( )
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    function __ToString ( )
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>