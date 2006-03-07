<?php

/*************************************************************************
                           |TableSiteInterface.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableSiteInterface> (fichier TableSiteInterface.php) --------------
if (defined('TABLESITEINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLESITEINTERFACE_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <TableSiteInterface>
//
//
//------------------------------------------------------------------------ 

interface TableSiteInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectSites ();
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des sites.
	//
    // Renvoie :
	//- l'ensemble des sites sous forme d'objets Site dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectSiteByIdSite ( $idSite );
    // Mode d'emploi :
	//permet de s�lectionner le site d'id $idSite.
	//
	// Renvoie :
    //- l'ensemble des sites d'id $idSite dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function FindSitesByName ( $siteName );
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des sites de nom $sitename.
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des sites de nom $sitename dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateSiteByIdSite ( Site $new );
    // Mode d'emploi :
	//permet de mettre � jour une site en fonction de sa propri�t�
	// TABLE_COLUMN_IDSITE
	//
	// Renvoie :
    //- NULL en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertSite ( Site $site );
    // Mode d'emploi :
	//permet d'ajouter une nouvelle site � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de r�ussite.
	//
	// Contrat :
	
	public function IdSiteExists ( $idSite );
    // Mode d'emploi :
	//permet de connaitre si l'$idSite existe dans la table
	//
	// Renvoie :
	//- true si $idSite est pr�sent,
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

//-------------------------------- Autres d�finitions d�pendantes de <TableSiteInterface>

?>