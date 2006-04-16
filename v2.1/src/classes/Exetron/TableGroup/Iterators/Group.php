<?php

/*************************************************************************
                           |Group.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Classe <Group> (file Group.php) --------------
/*if (defined('GROUP_H'))
{
    return;
}
else
{

}
define('GROUP_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Group table entries
 */
//------------------------------------------------------------------------ 

class Group extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    public function Validate ( $siteTable )
    /**
	 * Tries to validate the Site in order to save it into DataBase.
     *
	 * @param $siteTable a BDDTableSite object (where BDD should be
	 * replaced by your current Database : eg. MySQLTableSite). A valid 
	 * BDDTableSite implements TableSiteInterface
	 *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return GroupError::GROUP_NAME_EMPTY if property 
	 * TableGroup::TABLE_COLUMN_NAME is empty
	 *
	 * @return BDDError::TABLE_CLASS_INCORRECT if $groupTable is not a 
	 * valid instance
     *
	 * @return GroupError::GROUP_IDSITE_INEXISTANT if property 
	 * TableSite::TABLE_COLUMN_IDSITE refers to a non existant site
	 *
     */
	{
		$errors = new Errors ();
	
		// login
			if ( empty( $this->row[ TableGroup::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new GroupError ( GroupError::GROUP_NAME_EMPTY, 'Please fill in group name.') );
			}
	
		// referent IdSite
			if ( ! @in_array( 'TableSiteInterface', class_implements ( $siteTable ) ) )
			{
				$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Parameter is not a valid instance of BDDTableSite' ) );
			} 
			else
			{
				if ( ! $siteTable->IdSiteExists( $this->row[ TableSite::TABLE_COLUMN_IDSITE ]  ) )
				{
					$errors->Add ( new GroupError ( GroupError::GROUP_IDSITE_INEXISTANT, 'Group does not refer to any site.') );
				}
			}
			
		// result
		if ( $errors->GetCount() == 0 )
		{
			$this->isValid = true;
			return NULL;		
		}
		
		
		$this->isValid = false;
		return $errors;
	} //----- End of Validate

//---------------------------------------------- Constructors - destructor

    function __construct( BDDRecord $newRec )
    /**
	 * Initialises Site from the BDDRecord $newRec.
	 * If $newRec is NULL, Group is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
    {
		parent::__construct( NULL );
	
		// initialization
		$this->SetProperty ( TableGroup::TABLE_COLUMN_IDGROUP , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_NAME , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_OVERRIDE , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_IDSITE , '' );

		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] );
			// php hack to access protected property $newRec->row
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
	 */
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
}

//------------------------------------------------------ other definitions

?>