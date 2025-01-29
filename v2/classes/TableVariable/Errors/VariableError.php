<?php

/*************************************************************************
                           |VariableError.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <VariableError>
// Extension de la classe Error, elle impl�mente les constantes sp�cifiques aux erreurs bdd
//
//------------------------------------------------------------------------ 

class VariableError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const VARIABLE_NOT_LOADED = 'VARIABLE_NOT_LOADED'; // variable recherch�e inexistante
	
	
    const VARIABLE_NAME_EMPTY = 'VARIABLE_NAME_EMPTY'; // nom de variable inexistant
    const VARIABLE_SCOPE_INCORRECT = 'VARIABLE_SCOPE_INCORRECT'; // scope en dehors de l'�numeration
    const VARIABLE_ACCESS_INCORRECT = 'VARIABLE_ACCESS_INCORRECT'; // access en dehors de l'�numeration
    const VARIABLE_IDSITE_INEXISTANT = 'VARIABLE_IDSITE_INEXISTANT'; // r�f�rent IdSite inexistant

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

//-------------------------------- Autres d�finitions d�pendantes de <VariableError>

?>

