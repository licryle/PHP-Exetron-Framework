<?php

/*************************************************************************
                           |HTMLPageError.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <HTMLPageError> (fichier HTMLPageError.php) --------------
if (defined('HTMLPAGEERROR_H'))
{
    return;
}
else
{

}
define('HTMLPAGEERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <HTMLPageError>
// Extension de la classe Error, elle implémente les constantes spécifiques aux erreurs bdd
//
//------------------------------------------------------------------------ 

class HTMLPageError extends Error
{
//----------------------------------------------------------------- PUBLIC
    const PAGE_TAG_INEXISTANT = 'PAGE_TAG_INEXISTANT';
    const PAGE_MAQUETTE_INCORRECT = 'PAGE_MAQUETTE_INCORRECT';

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

//-------------------------------- Autres définitions dépendantes de <HTMLPageError>

?>