<?php

/*************************************************************************
                           |BDDError.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <BDDError> (fichier BDDError.php) --------------
if (defined('BDDERROR_H'))
{
    return;
}
else
{

}
define('BDDERROR_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <BDDError>
// Extension de la classe Error, elle impl�mente les constantes sp�cifiques aux erreurs bdd
//
//------------------------------------------------------------------------ 

class BDDError extends Error
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes
    const CONNECTION_NOT_CLOSED = 'CONNECTION_NOT_CLOSED';
    const CONNECTION_CLOSED = 'CONNECTION_CLOSED';
    const CONNECTION_ALREADY_OPENED = 'CONNECTION_ALREADY_OPENED';
    const CONNECTION_CANNOT_OPEN = 'CONNECTION_CANNOT_OPEN';
    const CONNECTION_CANNOT_CHANGE_DB = 'CONNECTION_CANNOT_CHANGE_DB';
    const CONNECTION_QUERY_FAILED = 'CONNECTION_QUERY_FAILED';
    const CONNECTION_TABLE_INEXISTANT = 'CONNECTION_TABLE_INEXISTANT';
	
    const CONNECTION_COLUMN_INEXISTANT = 'CONNECTION_COLUMN_INEXISTANT';
	
	const TABLE_CLASS_INCORRECT = 'TABLE_CLASS_INCORRECT';
	
	const RECORD_NOT_VALID = 'RECORD_NOT_VALID';
	const RECORD_UPDATE_DOESNT_EXIST = 'RECORD_UPDATE_DOESNT_EXIST';

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

//-------------------------------- Autres d�finitions d�pendantes de <BDDError>

?>

