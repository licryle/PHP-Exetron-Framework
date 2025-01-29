<?php

/*************************************************************************
                           |TableGroup.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableGroup> (fichier TableGroup.php) --------------
if (defined('TABLEGROUP_H'))
{
    return;
}
else
{

}
define('TABLEGROUP_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <TableGroup>
//
//
//------------------------------------------------------------------------ 

class TableGroup
{
//----------------------------------------------------------------- PUBLIC

	const TABLE_COLUMN_IDGROUP = 'idgroup';
	// clef primaire d'un utilisateur
	
	const TABLE_COLUMN_NAME = 'name';
	// nom de l'utilisateur
	
	const TABLE_COLUMN_OVERRIDE = 'override';
	// ce groupe est-il omniscient et omnipotent
	
	const TABLE_COLUMN_IDSITE = 'idsite';
	// clef �trang�re du site
	
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

//-------------------------------- Autres d�finitions d�pendantes de <TableGroup>

?>

