<?php

/*************************************************************************
                           |HooksManager.php|
                             -------------------
    started              : |07.08.2006|
    copyright            : (C) 2006 by BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//----------- Class <HooksManager> (file HooksManager.php) --------------
/*if (defined('HOOKSMANAGER_H'))
{
    return;
}
else
{

}
define('HOOKSMANAGER_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * Provides a Hooks Management: an easy and clean way to set callback in
 * your classes. All listeners just register for a Hook and each class
 * triggers the corresponding Hook. Each callback can treat data as call-
 * backs should work with references.
 *
 * To ensure the unicity of the Hooks. In each class you want to implement
 * a Hook, create a constant following this rule "HOOK_NameOfHook" and
 * whose value will start by the name of the class.
 *
 * e.g. If you want to implement a Hook for displaying result in the class
 * UserInformation, you will have to declare UserInformation::HOOK_DISPLAY
 * with the value "UserInformation_Display" or something similar.
 *
 * If you want to build Instance specific Hooks, use BuildInstanceHook(). 
 * This function will give you the name of the instance hook name.
 *
 * Typical "instance mode" use:
 * - $hookManager->Register( $hookManager->BuildInstanceHook($hookedClass, HookedClass::HOOK_action), array($this,'function') );
 * - $hookManager->Trigger( $hookManager->BuildInstanceHook($hookedClass, HookedClass::HOOK_action), $parameters );
 *
 *
 * @see AbstractClass::BuildInstanceHook()
 */
//------------------------------------------------------------------------ 

class HooksManager extends AbstractSingleton
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- public methods
	

	/**
	 * Gets a unique instance of current class.
	 * Create it if it doesn't exist.
	 * Children must call parent::getInstance( __CLASS__ )
	 *
	 * This method MUST be redefined in ALL children.
	 *
	 * @return unique instance of current class
	 *
	 * @see AbstractSingleton::getThis()
	 *
	 */
    public static function GetInstance ( )
	{	
		return parent::getThis( __CLASS__ );
	} //---- End of GetInstance

	/**
	 * UnRegisters the $method as a call back for the Hook named $hookName
	 *
	 * @param $method The method which will not be anymore called back when 
	 * the hook $hookName is triggered
	 *
	 * @param $hookName The name of the Hook.
	 *
	 * @param $removeAll Boolean that indicates if UnRegister have to 
	 * UnRegister all callbacks of the given $method for the specific Hook.
	 * This option has no sense if Register has been used with $allMultiple
	 * set to false.
	 *
	 */
    public function UnRegister( $hookName, $method, $removeAll = true )
    {
		if ( is_array ( $this->listeners[ $hookName ] ) )
		{
			foreach ( $this->listeners[ $hookName ] as $key => $val )
			{
				if ( $method == $val )
				{
					unset( $this->listeners[ $hookName ][ $key ] );
					
					if ( ! $removeAll )
					{
						return;
					}
				}
			}
		}
    } //---- End of UnRegister

	/**
	 * Registers the $method as a call back for the Hook named $hookName
	 *
	 * @param $method The method which will be called back when the hook
	 * $hookName is triggered
	 *
	 * @param $hookName The name of the Hook.
	 *
	 * @param $allowMultiple Boolean that indicates if a method can be 
	 * registered several times for the same Hook.
	 *
	 */
    public function Register( $hookName, $method, $allowMultiple = false )
    {
		if ( ! is_array ( @ $this->listeners[ $hookName ] ) )
		{
			$this->listeners[ $hookName ] = array();
		}
	
		if ( ! $allowMultiple && in_array ( $this->listeners[ $hookName ], $method ) )
		{
			return;
		}
		
		$this->listeners[ $hookName ][] = $method;
    } //---- End of Register

	/**
	 * Calls back every listener previously registered by Register() method.
	 *
	 * If one of the callback is not callable anymore, an Exception is thrown
	 *
	 * @param $hookName The name of the Hook to be triggered.
	 *
	 * @param $params Array of parameters to be passed by reference to the
	 * call back methods
	 */
    public function Trigger( $hookName, $params )
    {
		if ( is_array ( @ $this->listeners[ $hookName ] ) )
		// if there is some listener for this Hook
		{
			foreach (  $this->listeners[ $hookName ] as $callBack )
			{
				if ( is_callable ( $callBack ) )
				{
					call_user_func_array ( $callBack, $params );
				}
				else
				{
					throw new Exception();
				}
			}
		}
    } //---- End of Trigger

	/**
	 * Build the name of the hook based on the instance $object and the name
	 * of the hook $hookName.
	 *
	 * @param $object The instance of the class to be hooked
	 * @param $hookName The name of the hook
	 *
	 * @return The name of the hook specific to the instance $object
	 *
	 */
    public function BuildInstanceHook( AbstractClass $object, $hookName )
    {
		return get_class($object).$hookName.$object;
    } //---- End of BuildInstanceHook

//-------------------------------------------- Constructeurs - destructeur
	/**
	 * Instanciates a HooksManager object.
	 *
	 */
    protected function __construct( )
    {
		$this->listeners = array();
    } //---- End of constructeur

	/**
	 * Destructs the listeners information.
	 */
    public function __destruct ( )
    {
		parent::__destruct();
		
		unset ( $this->listeners );
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
	/** Array of listeners organised by names of the hooks */
	protected $listeners;

}

//------------------------------------------------------ other definitions

?>