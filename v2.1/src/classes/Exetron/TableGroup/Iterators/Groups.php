<?php

/*************************************************************************
                           |Groups.php|  -  description
                             -------------------
    début                : |DATE|
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
	
	public function GetGroupByIdGroup ( $idGroup )
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
	
	public function GetGroupByName ( $nameGroup )
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
	
	public function SetGroup ( Group $group )
    /**
	 * Adds a Group to the Groups if it is different than NULL.
	 * Alias of Groups::Add()
     *
     * @param $group the Group to add
     *
     */
	{

		$this->Add ( $group );

	} //---- End of SetGroup
	
//---------------------------------------------- Iterator's Implementation

    public function Add( Group $item )
    /**
	 * Adds a Group to the Groups if it is different than NULL.
	 * Group-s are indexed by TableGroup::TABLE_COLUMN_IDGROUP if possible.
     *
     * @param $item the Group to add
     *
     */
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

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset($this->groups);
        
        $this->groups = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $this->groups );
    } //---- End of GetCount
    
//---------------------------------------------- Iterator's Implementation
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->groups );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $this->groups );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return Key ( $this->groups );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->groups );
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
        return $this->current( ) !== false;
    } //---- End of Valid

//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    public function __construct( BDDRecordSet $groups )
    /**
	 * Initialises Groups from a BDDRecordSet.
	 *
     */
    {
		parent::__construct();
	
		$this->groups = array();
		
		foreach ( $groups as $group )
		{
			$this->Add( new Group ( $group ) );
		}		
    } //---- End of constructor


    public function __destruct ( )
	/**
	 * Destructs ressources allocated
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
	
	/** 
	 * Array of Group-s indexed by TableGroup::TABLE_COLUMN_IDGROUP if 
	 * possible
	 */
	protected $groups;

}

//------------------------------------------------------ other definitions

?>