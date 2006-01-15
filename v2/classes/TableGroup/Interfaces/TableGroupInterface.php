<?php

/*************************************************************************
                           |TableGroupInterface.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableGroupInterface> (fichier TableGroupInterface.php) --------------
if (defined('TABLEGROUPINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEGROUPINTERFACE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableGroupInterface>
//
//
//------------------------------------------------------------------------ 

interface TableGroupInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectGroups ();
    // Mode d'emploi :
	//permet de récupérer l'ensemble des groupes.
	//
    // Renvoie :
	//- l'ensemble des groupes sous forme d'objets Group dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectGroupByIdGroup ( $idGroup );
    // Mode d'emploi :
	//permet de sélectionner le group d'id $idGroup.
	//
	// Renvoie :
    //- l'ensemble des groupes d'id $idGroup dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function FindGroupsByName ( $groupName );
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des groupes de nom $groupname.
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des groups de nom $groupName dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateGroupByIdGroup ( Group $new );
    // Mode d'emploi :
	//permet de mettre à jour une groupe en fonction de sa propriété
	// TABLE_COLUMN_IDGROUP
	//
	// Renvoie :
    //- NULL en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertGroup ( Group $group );
    // Mode d'emploi :
	//permet d'ajouter un nouveau groupe à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de réussite.
	//
	// Contrat :
	
	public function IdGroupExists ( $idGroup );
    // Mode d'emploi :
	//permet de connaitre si l'$idGroup existe dans la table
	//
	// Renvoie :
	//- true si $idGroup est présent,
	//- false sinon.
	//
	// Contrat :
    

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

//-------------------------------- Autres définitions dépendantes de <TableGroupInterface>

?>

