<?php

/*************************************************************************
                           |Variable.php|
                             -------------------
    start                : |DATE|
    copyright            : (C) 2005 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Class <Variable> (file Variable.php) --------------
/*if (defined('VARIABLE_H'))
{
    return;
}
else
{

}
define('VARIABLE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for Variable table entries
 */
//------------------------------------------------------------------------ 

class Variable extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
    public function Validate ( $siteTable )
    /**
	 * Tries to validate the Variable in order to save it into DataBase.
     *
	 * @param $siteTable a BDDTableSite object (where BDD should be
	 * replaced by your current Database : eg. MySQLTableSite). A valid 
	 * BDDTableSite implements TableSiteInterface
	 *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return VariableError::VARIABLE_NAME_EMPTY if property 
	 * TableVariable::TABLE_COLUMN_NAME is empty
	 *
	 * @return BDDError::TABLE_CLASS_INCORRECT if $groupTable is not a 
	 * valid instance
	 *
	 * @return VariableError::VARIABLE_SCOPE_INCORRECT if property
	 * TableVariable::TABLE_COLUMN_SCOPE is incorrect
	 *
	 * @return VariableError::VARIABLE_ACCESS_INCORRECT if property
	 * TableVariable::TABLE_COLUMN_ACCESS is incorrect
     *
	 * @return VariableError::VARIABLE_IDSITE_INEXISTANT if property 
	 * TableVariable::TABLE_COLUMN_IDSITE refers to a non existant site
     */
	{
		$errors = new Errors ();
	
		// variable name
			if ( empty( $this->row[ TableVariable::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_NAME_EMPTY, 'Please fill in variable name.') );
			}
	
		// scope
			if ( $this->row[ TableVariable::TABLE_COLUMN_SCOPE ] != TableVariable::TABLE_COLUMN_SCOPE_SERVER && $this->row[ TableVariable::TABLE_COLUMN_SCOPE ] != TableVariable::TABLE_COLUMN_SCOPE_SITE  )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_SCOPE_INCORRECT, 'Variable scope is incorrect.') );
			}
		
		// access
			if ( $this->row[ TableVariable::TABLE_COLUMN_ACCESS ] != TableVariable::TABLE_COLUMN_ACCESS_ROOT && $this->row[ TableVariable::TABLE_COLUMN_ACCESS ] != TableVariable::TABLE_COLUMN_ACCESS_ADMIN )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_ACCESS_INCORRECT, 'Variable access are not correctly defined.') );
			}
		
		// referent IdSite
			if ( ! @in_array( 'TableSiteInterface', class_implements ( $siteTable ) ) )
			{
				$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Parameter is not a good instance of BDDTableSite.' ) );
			} 
			else
			{	
				if ( ! $siteTable->IdSiteExists( $this->row[ TableVariable::TABLE_COLUMN_IDSITE ]  ) )
				{
					$errors->Add ( new VariableError ( VariableError::VARIABLE_IDSITE_INEXISTANT, 'Variable does not refer to any site.') );
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
	} //---- End of Validate
	

//---------------------------------------------- Constructors - destructor

    function __construct( BDDRecord $newRec )
    /**
	 * Initialises Variable from the BDDRecord $newRec.
	 * If $newRec is NULL, Variable is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
    {
		parent::__construct( NULL );
		
		// initialization
		$this->SetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_NAME , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_DATA , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_SCOPE , TableVariable::TABLE_COLUMN_SCOPE_SITE );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_ACCESS , TableVariable::TABLE_COLUMN_ACCESS_ADMIN );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_IDSITE , NULL );
	
			
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