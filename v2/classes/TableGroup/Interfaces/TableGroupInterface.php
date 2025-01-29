<?php

/*************************************************************************
                           |TableGroupInterface.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <TableGroupInterface>
//
//
//------------------------------------------------------------------------ 

interface TableGroupInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectGroups ();
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des groupes.
	//
    // Renvoie :
	//- l'ensemble des groupes sous forme d'objets Group dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectGroupByIdGroup ( $idGroup );
    // Mode d'emploi :
	//permet de s�lectionner le group d'id $idGroup.
	//
	// Renvoie :
    //- l'ensemble des groupes d'id $idGroup dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function FindGroupsByName ( $groupName );
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des groupes de nom $groupname.
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des groups de nom $groupName dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateGroupByIdGroup ( Group $new );
    // Mode d'emploi :
	//permet de mettre � jour une groupe en fonction de sa propri�t�
	// TABLE_COLUMN_IDGROUP
	//
	// Renvoie :
    //- NULL en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertGroup ( Group $group );
    // Mode d'emploi :
	//permet d'ajouter un nouveau groupe � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de r�ussite.
	//
	// Contrat :
	
	public function IdGroupExists ( $idGroup );
    // Mode d'emploi :
	//permet de connaitre si l'$idGroup existe dans la table
	//
	// Renvoie :
	//- true si $idGroup est pr�sent,
	//- false sinon.
	//
	// Contrat :
    

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

//-------------------------------- Autres d�finitions d�pendantes de <TableGroupInterface>

?>

