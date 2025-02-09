<?php

/*************************************************************************
                           |Errors.php|
                             -------------------
    d�but                : |DATE|
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
    /**
	 * Adds an Error to the Sites if it is different than NULL.
	 * Error-s are indexed by their code.
     *
     * @param $item the Error to add 
     *
     */
    public function Add( Error $item )
    {
		if ( $item == NULL ) return;
		
        $this->errors[ $item->getCode( ) ] = $item;
    } //---- End of Add

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset($this->errors);
        
        $this->errors = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $this->errors );
    } //---- End of GetCount
    
//--------------------------------------------- Iterator's implementation
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->errors );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $this->errors );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return $this->current( )->getCode( );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->errors );
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
	 * Initialises Errors.
	 *
     */
    public function __construct( )
    {
		parent::__construct();
	
    	$this->errors = array( );
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