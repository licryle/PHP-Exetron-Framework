<?php

/*************************************************************************
                           |BDDTable.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <BDDTable> (fichier BDDTable.php) --------------
if (defined('BDDTABLE_H'))
{
    return;
}
else
{

}
define('BDDTABLE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDTable>
//
//
//------------------------------------------------------------------------ 

abstract class BDDTable extends AbstractClass implements BDDTableInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
    //abstract public function Select (  );
    // Mode d'emploi :
    //permet de récuperer le contenu d'une table selon différents paramètres
	//sous forme d'un BDDRecordSet
	//
    // Contrat :
    //
	
    //abstract public function Insert (  );
    // Mode d'emploi :
    //permet d'insérer de nouveaux enregistrements dans la table
	//
    // Contrat :
    //
	
    //abstract public function Update (  );
    // Mode d'emploi :
    //permet de mettre à jour le contenu de la table
	//
    // Contrat :
    //
	
    //abstract public function Delete (  );
    // Mode d'emploi :
    //permet d'effacer une partie du contenu de la table en fonction des paramètres
	//passés
	//
    // Contrat :
    //
	
    //abstract public function Clear (  );
    // Mode d'emploi :
    //Efface la totalité du contenu de la table courante.
	//
    // Contrat :
    //
	
    //abstract public function Drop (  );
    // Mode d'emploi :
    //Supprime la table courante de la base de données
	//passés
	//
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $table, BDDConnection $connection, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type BDDTable sur la table $table de la base
	//de $connection
	//
	// Renvoie par référence dans $errors :
	//- NULL si aucune erreur n'est intervenue
	//- un objet de type errors en cas d'erreur;
	//
    // Contrat :
	//- la connexion doit rester valable tout le temps de opérations sur la table
    //
	// Algorithme :
	//* vérification de la connexion
	//* vérification de la table
	//* chargement de la structure de la table
    {
		$errors = NULL;
		
    	if ( ! $connection->isConnected ( ) )
		{
			$errors = new Errors();
			$errors->Add( new BDDError( BDDError::CONNECTION_CLOSED, 'Connexion close, impossible d\'instancier une Table.') );
			
			return;
		}
		
		if ( ($tabex = $connection->TableExists ( $table ) ) instanceOf Errors )
		{
			$errors = $tabex;
			
			return;
		}
		unset ( $tabex );
		
		
		$this->structure = & $connection->TableDescription ( $table );
		$this->bDDConnection = $connection;
		$this->tableName = $table;
    } //---- Fin du constructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
	protected $tableName; // nom de la table gérée
	protected $bDDConnection; // class ressource connexion
	protected $structure; // contiendra la structure de la table
}

//-------------------------------- Autres définitions dépendantes de <BDDTable>

?>