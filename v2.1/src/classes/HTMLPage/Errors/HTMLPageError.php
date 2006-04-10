<?php

/*************************************************************************
                           |HTMLPageError.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <HTMLPageError>
// Extension de la classe Error, elle impl�mente les constantes sp�cifiques aux erreurs bdd
//
//------------------------------------------------------------------------ 

class HTMLPageError extends Error
{
//----------------------------------------------------------------- PUBLIC
    const PAGE_TAG_INEXISTANT = 'PAGE_TAG_INEXISTANT';
    const PAGE_MAQUETTE_INCORRECT = 'PAGE_MAQUETTE_INCORRECT';

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <HTMLPageError>

?>