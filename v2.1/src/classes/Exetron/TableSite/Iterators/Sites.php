<?php

/*************************************************************************
                           |Sites.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Classe <Sites> (file Sites.php) --------------
/*if (defined('SITES_H'))
{
    return;
}
else
{

}
define('SITES_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Iterator of Site-s
 */
//------------------------------------------------------------------------ 

class Sites extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	
	public function GetSiteByIdSite ( $idSite )
    /**
	 * Gets the Site which property TableSite::TABLE_COLUMN_IDSITE
	 * has the value $idSite
     *
     * @param $idSite the id of the Site to be looked for
	 *
     * @return - the Site object which property
	 * TableSite::TABLE_COLUMN_IDSITE has the value $idSite
     * @return - an Errors object in case of error(s) :
	 *
	 * @return SiteError::SITE_NOT_LOADED if Site has not been loaded
	 * from the database or doesn't exist
     *
     */
	{
		if ( isset ( $this->sites [ $idSite ] ) )
		{
			return $this->sites [ $idSite ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new SiteError ( SiteError::SITE_NOT_LOADED, 'Site not loaded from database or not existant.' ) );
			
			return $errors;
		}
	} //---- End of GetSiteByIdSite
	
	public function GetSiteByName ( $nameSite )
    /**
	 * Gets the Site which property TableSite::TABLE_COLUMN_NAME
	 * has the value $nameSite
     *
     * @param $nameSite the name of the Site to be looked for
	 *
     * @return - the Site object which property TableSite::TABLE_COLUMN_NAME
	 * has the value $nameSite
     * @return - an Errors object in case of error(s) :
	 *
	 * @return SiteError::USER_NOT_LOADED if Site has not been loaded
	 * from the database or doesn't exist
     *
     */
	{
		foreach ( $this->sites as $site ) 
		{
			if ( $site->GetProperty ( TableSite::TABLE_COLUMN_NAME ) == $nameSite )
			{
				return $site;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new SiteError ( SiteError::SITE_NOT_LOADED, 'Site not loaded from database or not existant.' ) );
			
		return $errors;
	} //---- End of GetSiteByName
	
	public function SetSite ( Site $site )
    /**
	 * Adds a Site to the Sites if it is different than NULL.
	 * Alias of Site::Add()
     *
     * @param $site the Site to add
     *
     */
	{
		$this->Add ( $site );
	} //---- End of SetSite
	
//------------------------------------------- Implémentation de MyIterator

    public function Add( Site $item )
    /**
	 * Adds a Site to the Sites if it is different than NULL.
	 * Site-s are indexed by TableSite::TABLE_COLUMN_IDSITE if possible.
     *
     * @param $item the Site to add
     *
     */
    {
		$key = $item->GetProperty ( TableSite::TABLE_COLUMN_IDSITE );
	
		if ( empty ( $key ) )
		{
			$this->sites [] = $item;		
		}
		else
		{
			$this->sites [ $key ] = $item;
		}
    } //---- End of Add

    public function DelAll( )
    /**
	 * Clears the Iterator.
     *
     */
    {
        unset($this->sites);
        
        $this->sites = array();
    } //---- End of DelAll

    public function GetCount( )
    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    {
        return count( $this->sites );
    } //---- End of GetCount
    
//----------------------------------------------- Iterator's implementation
    public function Rewind( )
    /**
	 * Gets back to the start of array.
	 *
     */
    {
        reset( $this->sites );
    } //--- End of Rewind

    public function Current( )
    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    {
        return current( $this->sites );
    } //---- End of Current
    
    public function Key( )
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    {
        return Key ( $this->sites );
    } //---- End of Key
    
    public function Next( )
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    {
        return next( $this->sites );
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
    public function __construct( BDDRecordSet $sites )
    /**
	 * Initialises Sites from a BDDRecordSet.
	 *
     */
    {
		parent::__construct();
	
		$this->sites = array();
		
		foreach ( $sites as $site )
		{
			$this->Add( new Site ( $site ) );
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
	 * Array of Site-s indexed by TableSite::TABLE_COLUMN_IDSITE if 
	 * possible
	 */
	protected $sites;

}

//------------------------------------------------------ other definitions

?>