<?php

/*************************************************************************
                           |GroupError.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <GroupError> (fichier GroupError.php) --------------
if (defined('GROUPERROR_H'))
{
    return;
}
else
{

}
define('GROUPERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <GroupError>
// Extension de la classe Error, elle implémente les constantes spécifiques aux erreurs Group
//
//------------------------------------------------------------------------ 

class GroupError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const GROUP_NOT_LOADED = 'GROUP_NOT_LOADED';

    const GROUP_IDSITE_INEXISTANT = 'GROUP_IDSITE_INEXISTANT'; // référent IdSite inexistant
	const GROUP_NAME_EMPTY = 'GROUP_NAME_EMPTY'; // nom de groupe vide
	
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

//-------------------------------- Autres définitions dépendantes de <GroupError>

?>

