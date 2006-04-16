<?php

/*************************************************************************
                           |Errors.php|
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Errors> (file Errors.php) --------------
/*if (defined('ERRORS_H'))
{
    return;
}
else
{

}
define('ERRORS_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Manages a list of Error-s (or children objects).
 * Provides basic methods for this management.
 */
//------------------------------------------------------------------------ 

class Errors extends AbstractClass implements Iterator, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
    public function Add( Error $item )
    /**
	 * Adds an Error to the Sites if it is different than NULL.
	 * Error-s are indexed by their code.
     *
     * @param $item the Error to add 
     *
     */
    {
		if ( $item == NULL ) return;
		
        $this->errors[ $item->getCode( ) ] = $item;
    } //---- End of Add

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset($this->errors);
        
        $this->errors = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $this->errors );
    } //---- End of GetCount
    
//--------------------------------------------- Iterator's implementation
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->errors );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $this->errors );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return $this->current( )->getCode( );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->errors );
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
    public function __construct( )
    /**
	 * Initialises Errors.
	 *
     */
    {
		parent::__construct();
	
    	$this->errors = array( );
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
        $str = '';
        
        foreach( $this as $code => $error )
        {
            $str .= $code . ' ' . $error->getMessage() . chr (10);
        }
        
        return $str;
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	
	/** Array of Error-s indexed by Error's code */
	protected $errors;

}

//------------------------------------------------------ other definitions

?>