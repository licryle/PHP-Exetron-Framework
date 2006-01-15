<?php

/*************************************************************************
                           |VariableError.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <VariableError> (fichier VariableError.php) --------------
if (defined('VARIABLEERROR_H'))
{
    return;
}
else
{

}
define('VARIABLEERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <VariableError>
// Extension de la classe Error, elle implémente les constantes spécifiques aux erreurs bdd
//
//------------------------------------------------------------------------ 

class VariableError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const VARIABLE_NOT_LOADED = 'VARIABLE_NOT_LOADED'; // variable recherchée inexistante
	
	
    const VARIABLE_NAME_EMPTY = 'VARIABLE_NAME_EMPTY'; // nom de variable inexistant
    const VARIABLE_SCOPE_INCORRECT = 'VARIABLE_SCOPE_INCORRECT'; // scope en dehors de l'énumeration
    const VARIABLE_ACCESS_INCORRECT = 'VARIABLE_ACCESS_INCORRECT'; // access en dehors de l'énumeration
    const VARIABLE_IDSITE_INEXISTANT = 'VARIABLE_IDSITE_INEXISTANT'; // référent IdSite inexistant

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <VariableError>

?>

