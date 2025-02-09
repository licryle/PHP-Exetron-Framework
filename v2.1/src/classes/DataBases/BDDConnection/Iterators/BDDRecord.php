<?php

/*************************************************************************
                           |BDDRecord.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <BDDRecord> (file BDDRecord.php) --------------
/*if (defined('BDDRECORD_H'))
{
    return;
}
else
{

}
define('BDDRECORD_H',1);*/


//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * This class is a generic BDD Row and it provides basic methods to act on
 * it.
 */
//------------------------------------------------------------------------ 

class BDDRecord extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    /**
	 * Checks if the BDDRecord is ready to be saved into DataBase.
	 * Uses the method Validate() to make the racord valid.
     *
     * @return - true if record is ready to be saved
	 * @return - false otherwise
     *
     */
    public function IsValid (  )
	{
		return true;
	} //----- End of IsValid
	
    /**
	 * Tries to validate the BDDRecord in order to save it into DataBase.
     *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s)
     *
     */
    public function Validate (  )
    {
		$this->isValid = true;
	
		return NULL;
	} //----- End of Validate
	
    /**
	 * Checks if the property $propertyName exists into the BDDRecord.
     *
	 * @param $propertyName the property name to check
	 *
     * @return - true if the property exists
	 * @return - false otherwise
     *
     */
    public function PropertyExists( $propertyName )
    {
		return ( isset ( $this->row[ $propertyName ] ) );
    } //----- End of PropertyExists
	
    /**
	 * Returns the value associated to property $propertyName.
     *
	 * @param $propertyName the property name to get value
	 *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s) :
	 * @return 		BDDError::CONNECTION_COLUMN_INEXISTANT if property doesn't exist.
     *
     */
    public function GetProperty( $propertyName )
    {
		if ( $this->PropertyExists( $propertyName ) )
		{
			return $this->row [ $propertyName ];
		}
		else
		{
			$errs = new Errors ( );
			
			$errs->Add ( new BDDError ( BDDError::CONNECTION_COLUMN_INEXISTANT , 'Property '.$propertyName.' does not exist.' ) );
			
			return $errs;
		}
    } //----- End of GetProperty
	
    /**
	 * Sets the property named $propertyName with value $propertyValue.
	 * If property doesn't exists, it is created.
     *
	 * @param $propertyName the property name to set value
	 * @param $propertyValue value to associate to property
     *
     */
    public function SetProperty( $propertyName , $propertyValue )
    {
		$this->row [ $propertyName ] = $propertyValue;
		
		$this->isValid = false;
    } //----- End of SetProperty
	
    /**
	 * Gets the number of properties of the object.
     *
	 * @return the number of properties of the object
     *
     */
	public function GetPropertyCount ( )
	{
			return count ( $this->row );
	} //----- End of GetPropertyCount
	
//------------------------------------------- Implementation's of Iterator
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->row );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $this->row );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return key( $this->row );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->row );
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
	 * Initialises BDDRecord from an array $row.
	 * Sets IsValid to false.
	 *
	 * @param $row a database row array
	 *
     */
    function __construct( $row = NULL )
    {
		parent::__construct();
		
		if ( is_array( $row ) )
		{
			$this->row = $row;
		}
		else
		{
			$this->row = array();
		}
		
		$this->isValid = false;
    } //---- End of constructor
	
	/**
	 * Destructs ressources allocated
	 */
    function __destruct( )
	{
		parent::__destruct();
	} //----- End of Destructor
    
//---------------------------------------------------------- Magic Methods
    /**
	 * Returns a printable version of object for debugging.
	 *
	 * @return String printable on screen
	 *
	 */
    function __ToString ( )	 
    {
        return (String)var_export( $this->row );
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
	/** Array of data : database row */
    protected $row;
	
	/**
	 * validation flag : contains true of false whether it has been 
	 * validated or not.
	 */
	protected $isValid;
}

//------------------------------------------------------ other definitions

?>