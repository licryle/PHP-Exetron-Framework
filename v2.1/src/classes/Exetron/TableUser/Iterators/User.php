<?php

/*************************************************************************
                           |User.php|
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//---------- Classe <User> (file User.php) --------------
/*if (defined('USER_H'))
{
    return;
}
else
{

}
define('USER_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides specific methods for User table  entries
 */
//------------------------------------------------------------------------ 

class User extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods

    public function Validate ( $groupTable )
    /**
	 * Tries to validate the User in order to save it into DataBase.
     *
	 * @param $groupTable a BDDTableGroup object (where BDD should be
	 * replaced by your current Database : eg. MySQLTableGroup). A valid 
	 * BDDTableGroup implements TableGroupInterface
	 *
     * @return - NULL if object has been validated
	 * @return - an Errors object in case of error(s) :
	 *
	 * @return UserError::USER_LOGIN_EMPTY if property 
	 * TableUser::TABLE_COLUMN_NAME is empty
	 *
	 * @return BDDError::TABLE_CLASS_INCORRECT if $groupTable is not a 
	 * valid instance
	 *
	 * @return UserError::USER_IDGROUP_INEXISTANT if User's group (property 
	 * TableGroup::TABLE_COLUMN_IDGROUP) doesn't exists
     *
     */
	{
		$errors = new Errors ();
	
		// login
			if ( empty( $this->row[ TableUser::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new UserError ( UserError::USER_LOGIN_EMPTY, 'Please fill in login.') );
			}
	
		// referent IdGroup
			if ( ! @in_array( 'TableGroupInterface', class_implements ( $groupTable ) ) )
			{
				$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Parameter is not a good instance of BDDTableGroup.' ) );
			} 
			else
			{
				if ( ! $groupTable->IdGroupExists( $this->row[ TableGroup::TABLE_COLUMN_IDGROUP ]  ) )
				{
					$errors->Add ( new GroupError ( UserError::USER_IDGROUP_INEXISTANT, 'User does not refer to any a group.') );
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

    /**
	 * Initialises User from the BDDRecord $newRec.
	 * If $newRec is NULL, User is empty.
	 * Sets IsValid to false.
	 *
	 * @param $newRec a BDDRecord to copy/cast or NULL
	 *
     */
    function __construct( BDDRecord $newRec )
    {
		parent::__construct( NULL );
		
		// initialization		
		$this->SetProperty ( TableUser::TABLE_COLUMN_IDUSER , '' );
		$this->SetProperty ( TableUser::TABLE_COLUMN_NAME , '' );
		$this->SetProperty ( TableUser::TABLE_COLUMN_PASSWORD , '' );
		$this->SetProperty ( TableUser::TABLE_COLUMN_IDGROUP , '' );

		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] );
			// php hack to access protected property $newRec->row
		}
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
	 */
    function __ToString ( )
    {
        return parent::__ToString();
    } // End of __ToString

//---------------------------------------------------------------- PRIVATE 
    
//------------------------------------------------------ protected methods

//------------------------------------------------------ protected members
}

//------------------------------------------------------ other definitions

?>