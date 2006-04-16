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

    public function IsValid (  )
    /**
	 * Checks if the BDDRecord is ready to be saved into DataBase.
	 * Uses the method Validate() to make the racord valid.
     *
     * @return - true if record is ready to be saved
	 * @return - false otherwise
     *
     */
	{
		return true;
	} //----- End of IsValid
	
    public function Validate (  )
    /**
	 * Tries to validate the BDDRecord in order to save it into DataBase.
     *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s)
     *
     */
    {
		$this->isValid = true;
	
		return NULL;
	} //----- End of Validate
	
    public function PropertyExists( $propertyName )
    /**
	 * Checks if the property $propertyName exists into the BDDRecord.
     *
	 * @param $propertyName the property name to check
	 *
     * @return - true if the property exists
	 * @return - false otherwise
     *
     */
    {
		return ( isset ( $this->row[ $propertyName ] ) );
    } //----- End of PropertyExists
	
    public function GetProperty( $propertyName )
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
	
    public function SetProperty( $propertyName , $propertyValue )
    /**
	 * Sets the property named $propertyName with value $propertyValue.
	 * If property doesn't exists, it is created.
     *
	 * @param $propertyName the property name to set value
	 * @param $propertyValue value to associate to property
     *
     */
    {
		$this->row [ $propertyName ] = $propertyValue;
		
		$this->isValid = false;
    } //----- End of SetProperty
	
	public function GetPropertyCount ( )
    /**
	 * Gets the number of properties of the object.
     *
	 * @return the number of properties of the object
     *
     */
	{
			return count ( $this->row );
	} //----- End of GetPropertyCount
	
//------------------------------------------- Implementation's of Iterator
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->row );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $this->row );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return key( $this->row );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->row );
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
    function __construct( $row = NULL )
    /**
	 * Initialises BDDRecord from an array $row.
	 * Sets IsValid to false.
	 *
	 * @param $row a database row array
	 *
     */
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