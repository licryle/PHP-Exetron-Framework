<?php

/*************************************************************************
                           |SessionError.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <SessionError> (fichier SessionError.php) --------------
if (defined('SESSIONERROR_H'))
{
    return;
}
else
{

}
define('SESSIONERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <SessionError>
// Extension de la classe Error, elle implémente les constantes spécifiques aux erreurs Session
//
//------------------------------------------------------------------------ 

class SessionError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const SESSION_VARIABLE_NOT_SET = 'SESSION_VARIABLE_NOT_SET';

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

//-------------------------------- Autres définitions dépendantes de <SessionError>

?>