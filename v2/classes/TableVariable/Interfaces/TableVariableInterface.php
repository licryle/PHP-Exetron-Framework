<?php

/*************************************************************************
                           |TableVariableInterface.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableVariableInterface> (fichier TableVariableInterface.php) --------------
if (defined('TABLEVARIABLEINTERFACE_H'))
{
    return;
}
else
{

}
define('TABLEVARIABLEINTERFACE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <TableVariableInterface>
//
//
//------------------------------------------------------------------------ 

interface TableVariableInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	public function SelectServerVariables ();
    // Mode d'emploi :
	//permet de récupérer l'ensemble des variables de configuration liées
	//au serveur.
	//
    // Renvoie :
	//- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SERVER
	//dans un objet de type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectSiteVariables ( $idsite );
    // Mode d'emploi :
	//permet de récupérer l'ensemble des variables de configuration liées
	//à un site.
	//
	// Renvoie :
    //- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SITE
	//et de site n° $idsite en un objet de type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function SelectVariablesByName ( $varName );
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des variables de nom $varname.
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des variables de nom $varname dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	
	public function UpdateVariableByIdVariable ( Variable $new );
    // Mode d'emploi :
	//permet de mettre à jour une variable en fonction de sa clef IdVariable
	//disponible en tant que propriété TABLE_COLUMN_IDVARIABLE
	//
	// Renvoie :
    //- NULL en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	
	public function InsertVariable ( Variable $variable );
    // Mode d'emploi :
	//permet d'ajouter une nouvelle variable à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de réussite.
	//
	// Contrat :
	
	public function IdVariableExists ( $idVariable );
    // Mode d'emploi :
	//permet de connaitre si l'$idVariable existe dans la table
	//
	// Renvoie :
	//- true si $idVariable est présent,
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

//-------------------------------- Autres définitions dépendantes de <TableVariableInterface>

?>

