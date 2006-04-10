<?php

/*************************************************************************
                           |BDDTableInterface.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <BDDTableInterface>
// Fournir des m�thodes de base d'acc�s � une base
// Connexion + requetes
//
//------------------------------------------------------------------------ 

interface BDDTableInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    abstract public function Select ( $champs, $options );
    // Mode d'emploi :
    //permet de r�cuperer le contenu d'une table selon diff�rents param�tres
	//sous forme d'un BDDRecordSet
	//
	//
	//$champs est un tableau ou une chaine de caract�res repr�sentant les champs
	//� selectionner.
	//$options contient les "where" "order" "limit" et autres sous forme de chaine...
	//
    // Contrat :
    //
	
    abstract public function Insert ( BDDRecord $record );
    // Mode d'emploi :
    //permet d'ins�rer de nouveaux enregistrements dans la table
	//
    // Contrat :
    //
	
    abstract public function Update ( BDDRecord $updatedRec, $clause );
    // Mode d'emploi :
    //permet de mettre � jour le contenu de la table en mettant � jour
	//$updateRec en fonction des $clause � construire en MySQL
	//
    // Contrat :
    //
	
    abstract public function Delete ( $clauses );
    // Mode d'emploi :
    //permet d'effacer une partie du contenu de la table en fonction des $clauses
	//pass�es
	//
    // Contrat :
    //
	
    abstract public function Clear (  );
    // Mode d'emploi :
    //Efface la totalit� du contenu de la table courante.
	//
    // Contrat :
    //
	
    abstract public function Drop (  );
    // Mode d'emploi :
    //Supprime la table courante de la base de donn�es
	//pass�s
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

//-------------------------------- Autres d�finitions d�pendantes de <BDDTableInterface>

?>