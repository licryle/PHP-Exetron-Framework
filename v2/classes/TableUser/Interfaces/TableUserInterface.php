<?php

/*************************************************************************
                           |TableUserInterface.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <TableUserInterface>
//
//
//------------------------------------------------------------------------ 

interface TableUserInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectUsers ();
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des users.
	//
    // Renvoie :
	//- l'ensemble des users sous forme d'objets User dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectUserByIdUser ( $idUser );
    // Mode d'emploi :
	//permet de s�lectionner le user d'id $idUser.
	//
	// Renvoie :
    //- l'ensemble des users d'id $idUser dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function SelectUsersByIdGroup ( $idGroup );
    // Mode d'emploi :
	//permet de s�lectionner les utilisateurs appartenant au groupe d'id $idGroup.
	//
	// Renvoie :
    //- l'ensemble des utilisateurs appartenant au groupe d'id $idGroup dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	
	public function FindUsersByName ( $userName );
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des users de nom $username.
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des users de nom $username dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateUserByIdUser ( User $new );
    // Mode d'emploi :
	//permet de mettre � jour une user en fonction de sa propri�t�
	// TABLE_COLUMN_IDUSER
	//
	// Renvoie :
    //- NULL en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertUser ( User $user );
    // Mode d'emploi :
	//permet d'ajouter une nouvelle user � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de r�ussite.
	//
	// Contrat :
	
	public function IdUserExists ( $idUser );
    // Mode d'emploi :
	//permet de connaitre si l'$idUser existe dans la table
	//
	// Renvoie :
	//- true si $idUser est pr�sent,
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

//-------------------------------- Autres d�finitions d�pendantes de <TableUserInterface>

?>

