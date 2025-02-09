<?php

/*************************************************************************
                           |Users.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Users> (file Users.php) --------------
/*if (defined('USERS_H'))
{
    return;
}
else
{

}
define('USERS_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Iterator of User-s
 */
//------------------------------------------------------------------------ 

class Users extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
    /**
	 * Gets the User which property TableUser::TABLE_COLUMN_IDUSER
	 * has the value $idUser
     *
     * @param $idUser the id of the User to be looked for
	 *
     * @return - the User object which property
	 * TableUser::TABLE_COLUMN_IDUSER has the value $idUser
     * @return - an Errors object in case of error(s) :
	 *
	 * @return UserError::USER_NOT_LOADED if User has not been loaded
	 * from the database or doesn't exist
     *
     */
	public function GetUserByIdUser ( $idUser )
	{
		if ( isset ( $this->users [ $idUser ] ) )
		{
			return $this->users [ $idUser ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new UserError ( UserError::USER_NOT_LOADED, 'User not loaded from database or not existant.' ) );
			
			return $errors;
		}
	} //---- End of GetUserByIdUser
	
    /**
	 * Gets the User which property TableUser::TABLE_COLUMN_NAME
	 * has the value $nameUser
     *
     * @param $nameUser the name of the User to be looked for
	 *
     * @return - the User object which property TableUser::TABLE_COLUMN_NAME
	 * has the value $nameUser
     * @return - an Errors object in case of error(s) :
	 *
	 * @return UserError::USER_NOT_LOADED if User has not been loaded
	 * from the database or doesn't exist
     *
     */
	public function GetUserByName ( $nameUser )
	{
		foreach ( $this->users as $user ) 
		{
			if ( $user->GetProperty ( TableUser::TABLE_COLUMN_NAME ) == $nameUser )
			{
				return $user;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new UserError ( UserError::USER_NOT_LOADED, 'User not loaded from database or not existant.' ) );
			
		return $errors;
	} //---- End of GetUserByName
	
    /**
	 * Adds a User to the Users if it is different than NULL.
	 * Alias of User::Add()
     *
     * @param $user the User to add
     *
     */
	public function SetUser ( User $user )
	{

		$this->Add ( $user );

	} //---- End of SetUser
	
//------------------------------------------- Implémentation de MyIterator

    /**
	 * Adds a User to the Users if it is different than NULL.
	 * User-s are indexed by TableUser::TABLE_COLUMN_IDUSER if possible.
     *
     * @param $item the User to add
     *
     */
    public function Add( User $item )
    {
		if ( $item == NULL ) return;
		
		$key = $item->GetProperty ( TableUser::TABLE_COLUMN_IDUSER );
	
		if ( empty ( $key ) )
		{
			$this->users [] = $item;		
		}
		else
		{
			$this->users [ $key ] = $item;
		}
    } //---- End of Add

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset($this->users);
        
        $this->users = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $this->users );
    } //---- End of GetCount
    
//-----------------------------------------------Implémentation Iterator
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->users );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $this->users );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return Key ( $this->users );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->users );
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
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    /**
	 * Initialises Users from a BDDRecordSet.
	 *
     */
    public function __construct( BDDRecordSet $users )
    {
		parent::__construct();
		
		$this->users = array();
		
		foreach ( $users as $user )
		{
			$this->Add( new User ( $user ) );
		}		
    } //---- End of constructor


	/**
	 * Destructs ressources allocated
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
	
	/** 
	 * Array of User-s indexed by TableUser::TABLE_COLUMN_IDUSER if 
	 * possible
	 */
	protected $users;

}

//------------------------------------------------------ other definitions

?>