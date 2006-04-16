<?php

/*************************************************************************
                           |Variables.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Variables> (file Variables.php) --------------
/*if (defined('VARIABLES_H'))
{
    return;
}
else
{

}
define('VARIABLES_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Iterator of Variable-s
 */
//------------------------------------------------------------------------ 

class Variables extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
	public function GetVariableByName ( $varName )
    /**
	 * Gets the Variable which property TableVariable::TABLE_COLUMN_NAME
	 * has the value $varName
     *
     * @param $varName the name of the Group to be looked for
	 *
     * @return - the Group object which property TableVariable::TABLE_COLUMN_NAME
	 * has the value $varName
     * @return - an Errors object in case of error(s) :
	 *
	 * @return VariableError::VARIABLE_NOT_LOADED if Variable has not been loaded
	 * from the database or doesn't exist
     *
     */
	{
		if ( isset ( $this->variables [ $varName ] ) )
		{
			return $this->variables [ $varName ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new VariableError ( VariableError::VARIABLE_NOT_LOADED, 'Variable not loaded from database not existant.' ) );
			
			return $errors;
		}
	} //---- End of GetVariableByName
	
	public function SetVariable ( Variable $variable )
    /**
	 * Adds a Variable to the Variables if it is different than NULL.
	 * Alias of Variables::Add()
     *
     * @param $variable the Variable to add
     *
     */
	{
		$this->Add ( $variable );
	} //---- End of SetVariable
	
//------------------------------------------- Implémentation de MyIterator

    public function Add( Variable $item )
    /**
	 * Adds a Variable to the Variables if it is different than NULL.
	 * Variable-s are indexed by TableVariable::TABLE_COLUMN_NAME if possible.
     *
     * @param $item the Variable to add
     *
     */
    {
		if ( $item == NULL ) return;
		
		$key = $item->GetProperty ( TableVariable::TABLE_COLUMN_NAME );
	
		if ( empty ( $key ) )
		{
			$this->variables [] = $item;		
		}
		else
		{
			$this->variables [ $key ] = $item;
		}
    } //---- End of Add

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset($this->variables);
        
        $this->variables = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $this->variables );
    } //---- End of GetCount
    
//---------------------------------------------- Iterator's Implementation
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->variables );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $this->variables );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return Key ( $this->variables );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->variables );
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
    public function __construct( BDDRecordSet $variables )
    /**
	 * Initialises Variables from a BDDRecordSet.
	 *
     */
    {
		parent::__construct();
		
		$this->variables = array();
		
		foreach ( $variables as $variable )
		{
			$this->Add( new Variable ( $variable ) );
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
	 * Array of Variable-s indexed by TableVariable::TABLE_COLUMN_NAME if 
	 * possible
	 */
	protected $variables;

}

//------------------------------------------------------ other definitions

?>