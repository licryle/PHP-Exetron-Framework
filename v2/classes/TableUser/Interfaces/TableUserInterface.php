<?php

/*************************************************************************
                           |TableUserInterface.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableUserInterface> (fichier TableUserInterface.php) --------------
if (defined('TABLEUSERINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEUSERINTERFACE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableUserInterface>
//
//
//------------------------------------------------------------------------ 

interface TableUserInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectUsers ();
    // Mode d'emploi :
	//permet de récupérer l'ensemble des users.
	//
    // Renvoie :
	//- l'ensemble des users sous forme d'objets User dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectUserByIdUser ( $idUser );
    // Mode d'emploi :
	//permet de sélectionner le user d'id $idUser.
	//
	// Renvoie :
    //- l'ensemble des users d'id $idUser dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function SelectUsersByIdGroup ( $idGroup );
    // Mode d'emploi :
	//permet de sélectionner les utilisateurs appartenant au groupe d'id $idGroup.
	//
	// Renvoie :
    //- l'ensemble des utilisateurs appartenant au groupe d'id $idGroup dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	
	public function FindUsersByName ( $userName );
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des users de nom $username.
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des users de nom $username dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateUserByIdUser ( User $new );
    // Mode d'emploi :
	//permet de mettre à jour une user en fonction de sa propriété
	// TABLE_COLUMN_IDUSER
	//
	// Renvoie :
    //- NULL en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertUser ( User $user );
    // Mode d'emploi :
	//permet d'ajouter une nouvelle user à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de réussite.
	//
	// Contrat :
	
	public function IdUserExists ( $idUser );
    // Mode d'emploi :
	//permet de connaitre si l'$idUser existe dans la table
	//
	// Renvoie :
	//- true si $idUser est présent,
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

//-------------------------------- Autres définitions dépendantes de <TableUserInterface>

?>

