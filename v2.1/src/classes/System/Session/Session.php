<?php

/*************************************************************************
                           |Session.php|
                             -------------------
    début                : |09.02.2006|
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

class Session extends AbstractSingleton implements Iterator//, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	

    public static function GetInstance ( )
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
	{	
		return parent::getThis( __CLASS__ );
	} //---- End of GetInstance
   
    public function Destruct( )
    /** 
	 * Destructs the sessions and all informations relatives to this session
	 */
    {
		session_destroy ( );
		
		unset ( $_SESSION );
		$_SESSION = array();
    } //---- End of Destruct 
	
    public function GetId( )
	/**
	 * Gets the session id.
	 *
	 * @return The id of the session
	 */
    {
		return session_id ( );
    } //---- End of GetId 
   
    public static function SetId( $id )
	/**
	 * Sets the session id.
	 *
	 * This function must be call before the first call of GetInstance().
	 *
	 * @param $id the id to be set.
	 *
	 */
    {
		session_id ( $id );
    } //---- End of SetId

    public function IsSetVariable( $name )
	/**
	 * Checks whether the varaiable named $name exists or not.
	 *
	 * @param $name The name of the variable to check for
	 *
	 * @return - True if a variable named $name exists
	 * @return - False otherwise
	 */
    {
		return isset( $_SESSION [ $name ] );
    } //---- End of IsSetVariable 
	
    public function UnSetVariable( $name )
	/**
	 * Unsets the variable named $name.
	 *
	 * @param $name The name of the variable to be unsetted
	 *
	 * @return - an object of type Errors in case of error(s)
	 * @return - NULL if operation was successful
	 */
    {
		if ( ! $this->IsSetVariable ( $name ) )
		{
			$errors = new Errors();
			$errors->Add ( new SessionError ( SessionError::SESSION_VARIABLE_NOT_SET, 'Impossible de détruire une variable non mise en place.' ) ) ;
			
			return $errors;
		}
		else
		{
			unset ( $_SESSION [ $name ] );
			
			return NULL;
		}
    } //---- End of UnSetVariable 

    
    public function SetVariable(  $name, $value )
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
    {	
		$_SESSION [ $name ] = $value;
    } //---- End of SetVariable

    public function GetVariable( $name )
	/**
	 * Gets the value associated to variable named $name.
	 *
	 * @param $name The name of the variable to be get.
	 *
	 * @return - an object of type Errors in case of error(s)
	 * @return - the content of the variable named $name
	 *
	 */
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

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset( $_SESSION );
        
        $_SESSION = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $_SESSION );
    } //---- End of GetCount
    
//--------------------------------------------- Iterator's Implémentation
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $_SESSION );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $_SESSION );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return Key ( $_SESSION );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $_SESSION );
    } //---- End of Next
    
    public function Valid( )
    /**
	 * Checks if array's element is valid or not.
	 *
	 * @return - true if element is valid
	 * @return - false otherwise
	 *
     */
    {
        return Session::current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implémentation

//-------------------------------------------- Constructeurs - destructeur
    protected function __construct( );//$sessId = '', $sessName = '' )
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
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Session.
	//Si $sessId est fourni, celui-ci servira d'identifiant de session
	//Dans le cas contraire, l'identifiant sera celui récupéré via Cookie, 
	//Get ou Post.
	//Enfin, si aucun n'est récupéré, celui-ci sera généré.
	//
	//Si $sessName est fournit, celui est modifie le nom de la session.
	//
    // Contrat :
    //- l'instanciation doit s'effectuer avant toute sortie à l'écran aEnd of 
	//que les entetes cookie soient correctement envoyées.
	//- $sessName doit etre alphanumerique sinon le nom ne sera pas changé
    {
		// nom de session
		if ( ereg ( '[a-zA-Z0-9]+', $sessName ) )
		{
			session_name ( $sessName );
		}

		// start session
    	session_start( );
    } //---- End of constructeur

    public function __destruct ( )
	/**
	 * Destructs ressources allocated
	 *
	 * Does not destruct the session, just the Session object.
	 */
    {
		parent::__destruct();
    } //---- End of destructor
    
//---------------------------------------------------------- Magic Methods

    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members

}

//------------------------------------------------------ other definitions

?>