<?php

/*************************************************************************
                           |TableUser.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableUser> (fichier TableUser.php) --------------
if (defined('TABLEUSER_H'))
{
    return;
}
else
{

}
define('TABLEUSER_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <TableUser>
//
//
//------------------------------------------------------------------------ 

class TableUser
{
//----------------------------------------------------------------- PUBLIC

	const TABLE_COLUMN_IDUSER = 'iduser';
	// clef primaire d'un utilisateur
	
	const TABLE_COLUMN_NAME = 'name';
	// nom de l'utilisateur
	
	const TABLE_COLUMN_PASSWORD = 'pass';
	// mot de passe de l'utilisateur
	
	const TABLE_COLUMN_IDGROUP = 'idgroup';
	// clef �trang�re du groupe
	
//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
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

//-------------------------------- Autres d�finitions d�pendantes de <TableUser>

?>