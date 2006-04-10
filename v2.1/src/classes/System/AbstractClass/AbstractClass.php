<?php

/*************************************************************************
                           |AbstractClass.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <AbstractClass> (fichier AbstractClass.php) --------------
if (defined('ABSTRACTCLASS_H'))
{
    return;
}
else
{

}
define('ABSTRACTCLASS_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <AbstractClass>
//
//
//------------------------------------------------------------------------ 

abstract class AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    abstract public function __construct();
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //

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
    } // ENd of __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <AbstractClass>

?>