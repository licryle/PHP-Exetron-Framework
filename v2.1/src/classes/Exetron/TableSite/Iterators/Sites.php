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
	public function GetSiteByIdSite ( $idSite )
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
	public function GetSiteByName ( $nameSite )
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
	
    /**
	 * Adds a Site to the Sites if it is different than NULL.
	 * Alias of Site::Add()
     *
     * @param $site the Site to add
     *
     */
	public function SetSite ( Site $site )
	{
		$this->Add ( $site );
	} //---- End of SetSite
	
//------------------------------------------- Implémentation de MyIterator

    /**
	 * Adds a Site to the Sites if it is different than NULL.
	 * Site-s are indexed by TableSite::TABLE_COLUMN_IDSITE if possible.
     *
     * @param $item the Site to add
     *
     */
    public function Add( Site $item )
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

    /**
	 * Clears the Iterator.
     *
     */
    public function DelAll( )
    {
        unset($this->sites);
        
        $this->sites = array();
    } //---- End of DelAll

    /**
	 * Gets the number of items it contains.
     *
	 * @return the number of items it contains
	 *
     */
    public function GetCount( )
    {
        return count( $this->sites );
    } //---- End of GetCount
    
//----------------------------------------------- Iterator's implementation
    /**
	 * Gets back to the start of array.
	 *
     */
    public function Rewind( )
    {
        reset( $this->sites );
    } //--- End of Rewind

    /**
	 * Gets the current element of the array.
	 *
	 * @return the current element of array
	 *
     */
    public function Current( )
    {
        return current( $this->sites );
    } //---- End of Current
    
    /**
	 * Gets the key of the current element of the array.
	 *
	 * @return the key of the current element of array
	 *
     */
    public function Key( )
    {
        return Key ( $this->sites );
    } //---- End of Key
    
    /**
	 * Goes to the next element of array.
	 *
	 * @return next element of array
	 *
     */
    public function Next( )
    {
        return next( $this->sites );
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
	 * Initialises Sites from a BDDRecordSet.
	 *
     */
    public function __construct( BDDRecordSet $sites )
    {
		parent::__construct();
	
		$this->sites = array();
		
		foreach ( $sites as $site )
		{
			$this->Add( new Site ( $site ) );
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
	 * Array of Site-s indexed by TableSite::TABLE_COLUMN_IDSITE if 
	 * possible
	 */
	protected $sites;

}

//------------------------------------------------------ other definitions

?>