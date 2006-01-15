<?php

/*************************************************************************
                           |TableGroup.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableGroup>
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
	// clef étrangère du site
	
//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
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

//-------------------------------- Autres définitions dépendantes de <TableGroup>

?>

