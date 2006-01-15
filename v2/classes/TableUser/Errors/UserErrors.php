<?php

/*************************************************************************
                           |UserError.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <UserError> (fichier UserError.php) --------------
if (defined('USERERROR_H'))
{
    return;
}
else
{

}
define('USERERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <UserError>
// Extension de la classe Error, elle implémente les constantes spécifiques aux erreurs User
//
//------------------------------------------------------------------------ 

class UserError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const USER_NOT_LOADED = 'USER_NOT_LOADED';

    const USER_IDGROUP_INEXISTANT = 'USER_IDGROUP_INEXISTANT'; // référent IdGroup inexistant
	const USER_LOGIN_EMPTY = 'USER_LOGIN_EMPTY'; // login vide
	
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

//-------------------------------- Autres définitions dépendantes de <UserError>

?>

