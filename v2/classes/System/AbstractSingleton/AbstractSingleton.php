<?php

/*************************************************************************
                           |AbstractSingleton.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <AbstractSingleton> (fichier AbstractSingleton.php) --------------
if (defined('ABSTRACTSINGLETON_H'))
{
    return;
}
else
{

}
define('ABSTRACTSINGLETON_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <AbstractSingleton>
//
//
//------------------------------------------------------------------------ 

abstract class AbstractSingleton
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
	abstract public static function GetInstance ( );
	// User's manual :
    //Getter of the unique instance. Create this if doesn't exist
	//Must call parent::getInstance( ) in the code with the given name
	//of the class : __CLASS__
	//
	//Must appears in all children.
	//
    // Contract :
    //
	//{
	//	return parent::getThis ( __CLASS__ );
	//}

//-------------------------------------------- Constructeurs - destructeur
    protected function __construct()
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
	{
	
	} // End of __construct

    public function __destruct ( )
    // Mode d'emploi :
    //Lib�re l'espace m�moire des variables de la classe
    // Contrat :
    //
    {
        /*$vars = get_object_vars($this);
        
        foreach($vars as $key => $var)
        {
          //  unset($this->{$key});
        }
        
        unset($vars);   */     
    } //---- Fin du destructeur

//------------------------------------------------------ M�thodes Magiques

    public function __ToString ( )
    // Mode d'emploi :
    //Si non red�finie, imprime un etat de l'objet
    //
    // Contrat :
    //
    {
        return (string)var_export($this);
    } // End of __ToString
	
//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
    protected static function getThis ( $class )
    // User's manual :
    //Getter of the unique instance of the class named $class. 
	//Create this if doesn't exist
	//
    // Contract :
    //
	{
		if ( ! IsSet ( self::$instance ) )
		// instance creation
		{
			self::$instance = new $class();
		}
		
		return self::$instance;
	} // End of getThis

//----------------------------------------------------- Attributs prot�g�s
	protected static $instance; // handler of instance
}

//-------------------------------- Autres d�finitions d�pendantes de <AbstractSingleton>

?>