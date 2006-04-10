<?php

/*************************************************************************
                           |TableVariable.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableVariable> (fichier TableVariable.php) --------------
if (defined('TABLEVARIABLE_H'))
{
    return;
}
else
{

}
define('TABLEVARIABLE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableVariable>
//
//
//------------------------------------------------------------------------ 

class TableVariable
{
//----------------------------------------------------------------- PUBLIC

	const TABLE_COLUMN_IDVARIABLE = 'idvariable';
	// clef primaire identifiant de la var
	
	const TABLE_COLUMN_SCOPE = 'scope';
	// portée de la donnée. portées possibles : TABLE_COLUMN_SCOPE_SITE ou
	//	TABLE_COLUMN_SCOPE_SERVER
	
	// énumération TABLE_COLUMN_SCOPE
	
		const TABLE_COLUMN_SCOPE_SITE = 'SITE';
		// la donnée ne concernera que le site en question.
		// cette portée prévalue sur l'autre.
		
		const TABLE_COLUMN_SCOPE_SERVER = 'SERVER';
		// la donnée concernera tous les sites hébergés.
		
	// fin de l'énumération TABLE_COLUMN_SCOPE
	
	
	const TABLE_COLUMN_ACCESS = 'access';
	// défini quels sont les personnes qui peuvent modifier la donnée

	// énumération TABLE_COLUMN_ACCESS
	
		const TABLE_COLUMN_ACCESS_ROOT = 'ROOT';
		// la donnée ne pourra être modifiée que par les 
		//administrateurs des sites
		
		const TABLE_COLUMN_ACCESS_ADMIN = 'ADMIN';
		// la donnée pourra être modifiée par les administrateur du site
		
	// fin de l'énumération TABLE_COLUMN_ACCESS
	
	const TABLE_COLUMN_NAME = 'name';
	// nom de la donnée
	
	const TABLE_COLUMN_DATA = 'data';
	// donnée stockée échapée en addslashes().
	
	const TABLE_COLUMN_IDSITE = 'idsite';
	// clef étrangère définissant le site auquel la donnée est rattachée
	

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

//-------------------------------- Autres définitions dépendantes de <TableVariable>

?>