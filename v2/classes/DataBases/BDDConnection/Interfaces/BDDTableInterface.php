<?php

/*************************************************************************
                           |BDDTableInterface.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLConnection> (fichier BDDTableInterface.php) --------------
if (defined('BDDTABLEINTERFACE_H'))
{
    return;
}
else
{

}
define('BDDTABLEINTERFACE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDTableInterface>
// Fournir des méthodes de base d'accès à une base
// Connexion + requetes
//
//------------------------------------------------------------------------ 

interface BDDTableInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    abstract public function Select ( $champs, $options );
    // Mode d'emploi :
    //permet de récuperer le contenu d'une table selon différents paramètres
	//sous forme d'un BDDRecordSet
	//
	//
	//$champs est un tableau ou une chaine de caractères représentant les champs
	//à selectionner.
	//$options contient les "where" "order" "limit" et autres sous forme de chaine...
	//
    // Contrat :
    //
	
    abstract public function Insert ( BDDRecord $record );
    // Mode d'emploi :
    //permet d'insérer de nouveaux enregistrements dans la table
	//
    // Contrat :
    //
	
    abstract public function Update ( BDDRecord $updatedRec, $clause );
    // Mode d'emploi :
    //permet de mettre à jour le contenu de la table en mettant à jour
	//$updateRec en fonction des $clause à construire en MySQL
	//
    // Contrat :
    //
	
    abstract public function Delete ( $clauses );
    // Mode d'emploi :
    //permet d'effacer une partie du contenu de la table en fonction des $clauses
	//passées
	//
    // Contrat :
    //
	
    abstract public function Clear (  );
    // Mode d'emploi :
    //Efface la totalité du contenu de la table courante.
	//
    // Contrat :
    //
	
    abstract public function Drop (  );
    // Mode d'emploi :
    //Supprime la table courante de la base de données
	//passés
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

//-------------------------------- Autres définitions dépendantes de <BDDTableInterface>

?>