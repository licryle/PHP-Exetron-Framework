<?php

/*************************************************************************
                           |AbstractSingleton.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <AbstractSingleton>
//
//
//------------------------------------------------------------------------ 

abstract class AbstractSingleton
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
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
    //Libère l'espace mémoire des variables de la classe
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

//------------------------------------------------------ Méthodes Magiques

    public function __ToString ( )
    // Mode d'emploi :
    //Si non redéfinie, imprime un etat de l'objet
    //
    // Contrat :
    //
    {
        return (string)var_export($this);
    } // End of __ToString
	
//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
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

//----------------------------------------------------- Attributs protégés
	protected static $instance; // handler of instance
}

//-------------------------------- Autres définitions dépendantes de <AbstractSingleton>

?>