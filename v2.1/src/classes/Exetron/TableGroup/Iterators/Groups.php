<?php

/*************************************************************************
                           |Groups.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Groups> (file Groups.php) --------------
/*if (defined('GROUPS_H'))
{
    return;
}
else
{

}
define('GROUPS_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Iterator of Group-s
 */
//------------------------------------------------------------------------ 

class Groups extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
    /**
	 * Gets the Group which property TableGroup::TABLE_COLUMN_IDGROUP
	 * has the value $idGroup
     *
     * @param $idGroup the id of the Group to be looked for
	 *
     * @return - the Group object which property
	 * TableGroup::TABLE_COLUMN_IDGROUP has the value $idGroup
     * @return - an Errors object in case of error(s) :
	 *
	 * @return GroupError::GROUP_NOT_LOADED if Group has not been loaded
	 * from the database or doesn't exist
     *
     */
	public function GetGroupByIdGroup ( $idGroup )
	{
		if ( isset ( $this->groups [ $idGroup ] ) )
		{
			return $this->groups [ $idGroup ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new GroupError ( GroupError::GROUP_NOT_LOADED, 'Group not loaded from database or not existant.' ) );
			
			return $errors;
		}
	} //---- End of GetGroupByIdGroup
	
    /**
	 * Gets the Group which property TableGroup::TABLE_COLUMN_NAME
	 * has the value $nameGroup
     *
     * @param $nameGroup the name of the Group to be looked for
	 *
     * @return - the Group object which property TableGroup::TABLE_COLUMN_NAME
	 * has the value $nameGroup
     * @return - an Errors object in case of error(s) :
	 *
	 * @return GroupError::GROUP_NOT_LOADED if Group has not been loaded
	 * from the database or doesn't exist
     *
     */
	public function GetGroupByName ( $nameGroup )
	{
		foreach ( $this->groups as $group ) 
		{
			if ( $group->GetProperty ( TableGroup::TABLE_COLUMN_NAME ) == $nameGroup )
			{
				return $group;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new GroupError ( GroupError::GROUP_NOT_LOADED, 'Group not loaded from database or not existant.' ) );
			
		return $errors;
	} //---- End of GetGroupByName
	
    /**
	 * Adds a Group to the Groups if it is different than NULL.
	 * Alias of Groups::Add()
     *
     * @param $group the Group to add
     *
     */
	public function SetGroup ( Group $group )
	{

		$this->Add ( $group );

	} //---- End of SetGroup
	
//---------------------------------------------- Iterator's Implementation

    /**
	 * Adds a Group to the Groups if it is different than NULL.
	 * Group-s are indexed by TableGroup::TABLE_COLUMN_IDGROUP if possible.
     *
     * @param $item the Group to add
     *
     */
    public function Add( Group $item )
    {
		if ( $item == NULL ) return;
	
		$key = $item->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP );
	
		if ( empty ( $key ) )
		{
			$this->groups [] = $item;		
		}
		else
		{
			$this->groups [ $key ] = $item;
		}
    } //---- End of Add

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset($this->groups);
        
        $this->groups = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $this->groups );
    } //---- End of GetCount
    
//---------------------------------------------- Iterator's Implementation
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->groups );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $this->groups );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return Key ( $this->groups );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->groups );
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
	 * Initialises Groups from a BDDRecordSet.
	 *
     */
    public function __construct( BDDRecordSet $groups )
    {
		parent::__construct();
	
		$this->groups = array();
		
		foreach ( $groups as $group )
		{
			$this->Add( new Group ( $group ) );
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
	 * Array of Group-s indexed by TableGroup::TABLE_COLUMN_IDGROUP if 
	 * possible
	 */
	protected $groups;

}

//------------------------------------------------------ other definitions

?>