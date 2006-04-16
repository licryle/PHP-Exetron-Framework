<?php

/*************************************************************************
                           |BDDRecordSet.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <BDDRecordSet> (file BDDRecordSet.php) --------------
/*if (defined('BDDRECORDSET_H'))
{
    return;
}
else
{

}
define('BDDRECORDSET_H',1);*/


//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Basic Iterator for BDDRecord-s
 */
//------------------------------------------------------------------------ 

class BDDRecordSet extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    public function Add( BDDRecord & $item )
    /**
	 * Adds a BDDRecord to the Iterator.
     *
     * @param $item the BDDRecord to add
     *
     */
    {
        $this->items[ ] = $item;
    } //---- End of Add

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset($this->items);
        
        $this->items = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $this->items );
    } //---- End of GetCount
    
//---------------------------------------------- Iterator's Implementation
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->items );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return @current( $this->items );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return key( $this->items );
    } //---- End of  Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->items );
    } //---- End of  Next
    
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
    } //---- End of  Valid
//--------------------------------------- End of Iterator's implementation

//---------------------------------------------- Constructors - destructor
    function __construct( )
    /**
	 * Initialises BDDRecordSet.
	 *
     */
    {
		parent::__construct();
		
		$this->items = array();
    } //---- End of constructor
	
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{
		parent::__destruct();
	} //----- End of Destructor

//---------------------------------------------------------- Magic Methods

    function __ToString ( )
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    {
        return $this->GetCount().' entrées'.var_dump($this->items);
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	/** Array of items : BDDRecord-s */
    protected $items;
}

//------------------------------------------------------ other definitions

?>