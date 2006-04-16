<?php

/*************************************************************************
                           |Site.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Site> (file Site.php) --------------
/*if (defined('SITE_H'))
{
    return;
}
else
{

}
define('SITE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Site table entries
 */
//------------------------------------------------------------------------ 

class Site extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    public function Validate (  )
    /**
	 * Tries to validate the Site in order to save it into DataBase.
	 *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return SiteError::SITE_NAME_EMPTY if property 
	 * TableSite::TABLE_COLUMN_NAME is empty
     */
	{
		$errors = new Errors ();
	
		// variable name
			if ( empty( $this->row[ TableSite::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new VariableError ( SiteError::SITE_NAME_EMPTY, 'Please fill in site name.') );
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
	 * If $newRec is NULL, Variable is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
    {
		parent::__construct( NULL );
	
		// initialization
		$this->SetProperty ( TableSite::TABLE_COLUMN_IDSITE , '' );
		$this->SetProperty ( TableSite::TABLE_COLUMN_NAME , '' );

		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] );
			// php hack to access protected property $newRec->row
		}
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