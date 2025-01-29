<?php

/*************************************************************************
                           |UserError.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <UserError>
// Extension de la classe Error, elle impl�mente les constantes sp�cifiques aux erreurs User
//
//------------------------------------------------------------------------ 

class UserError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const USER_NOT_LOADED = 'USER_NOT_LOADED';

    const USER_IDGROUP_INEXISTANT = 'USER_IDGROUP_INEXISTANT'; // r�f�rent IdGroup inexistant
	const USER_LOGIN_EMPTY = 'USER_LOGIN_EMPTY'; // login vide
	
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

//-------------------------------- Autres d�finitions d�pendantes de <UserError>

?>

