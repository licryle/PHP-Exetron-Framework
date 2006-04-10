<?php

/*************************************************************************
                           |MySQLTable.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLTable> (fichier MySQLTable.php) --------------
if (defined('MYSQLTABLE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <MySQLTable>
//
//
//------------------------------------------------------------------------ 

class MySQLTable extends BDDTable
{
//----------------------------------------------------------------- PUBLIC

	const TABLE_COLUMN_ALL = '*'; 
	// représente l'ensemble des colonnes
	
	const MYSQL_CLAUSE_WHERE = ' WHERE ';
	const MYSQL_CLAUSE_LIMIT = ' LIMIT ';
	
	const MYSQL_CLAUSE_AND = ' AND ';
	const MYSQL_CLAUSE_OR = ' OR ';
	
	const MYSQL_CLAUSE_ORDER = ' ORDER BY ';
	const MYSQL_CLAUSE_ORDER_ASCENDANT = ' ASC ';
	const MYSQL_CLAUSE_ORDER_DESCENDANT = ' DESC ';
	
	const MYSQL_CLAUSE_GROUP = ' GROUP BY ';
	const MYSQL_CLAUSE_HAVING = ' HAVING ';
	
	const MYSQL_SEEK_REGEX = ' LIKE '; // utilisation de LIKE
	
	// caractères magiques REGEX
		const MYSQL_SEEK_MULTICHARS = '%'; // remplace X chars différents
		const MYSQL_SEEK_ANYCHAR = '_'; // remplace un char
	// fin des caractères magiques REGEX
	
	const MYSQL_SEEK_STRICT = ' = ';// recherche stricte =
	const MYSQL_SEEK_SEPARATOR = '"';// char de séparation
	// paramètre de recherche
	
	const MYSQL_STRUCTURE_FIELD_NAME = 'Field'; 
	// champ contenant le nom du champ dans le structure

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
    public function Select ( $champs, $options )
    // Mode d'emploi :
    //permet de récuperer le contenu d'une table selon différents paramètres
	//sous forme d'un BDDRecordSet
	//
	//les données sont décodées de la base pour etre exploitables.
	//
	//$champs est un tableau ou une chaine de caractères représentant les champs
	//à selectionner.
	//$options contient les "where" "order" "limit" et autres sous forme de chaine...
	//
    // Contrat :
    //
	{
		$selectQuery = 'SELECT ';
		
		if ( is_array( $champs ) ) 
		{
			foreach( $champs as $champ ) 
			{
				$selectQuery .= $champ;
			}
			
			$selectQuery = substr( $selectQuery, 0, -1 ) ;
		}
		else
		{
			$selectQuery .= $champs;
		}
		
		$selectQuery .= ' FROM `'.$this->tableName.'` '.$options;
		
		return $this->bDDConnection->Query ( $selectQuery ) ;
	} //---- Fin de Select
	
    public function Insert ( BDDRecord $record )
    // Mode d'emploi :
    //permet d'insérer de nouveaux enregistrements dans la table
	//
    // Contrat :
    //
	{
		$newRecord = $this->bDDRecordToTableRecord ( $record );
		unset( $record );
		
		$insertQuery  = 'INSERT INTO `'.$this->tableName.'` SET ';
		
		foreach ( $newRecord as $champ  => $value )
		{
			$insertQuery .= $champ.' = "'. $value .'", ';
		}
		
		$insertQuery = substr ( $insertQuery , 0 , -2 );
		
		return $this->bDDConnection->Query ( $insertQuery ) ;
	} //---- Fin de Insert
	
    public function Update ( BDDRecord $updatedRec, $clause )
    // Mode d'emploi :
    //permet de mettre à jour le contenu de la table en mettant à jour
	//$updateRec en fonction des $clause
	//
    // Contrat :
    //
	{
		$newRecord = $this->bDDRecordToTableRecord ( $updatedRec );
		unset( $updatedRec );
		
		$updateQuery  = 'UPDATE `'.$this->tableName.'` SET ';
		
		foreach ( $newRecord as $champ  => $value )
		{
			$updateQuery .= $champ.' = "'. $value .'", ';
		}
		
		$updateQuery = substr ( $updateQuery , 0 , -2 ) . $clause;
		
		return $this->bDDConnection->Query ( $updateQuery ) ;
	
	} //---- Fin de Update
	
    public function Delete ( $clause )
    // Mode d'emploi :
    //permet d'effacer une partie du contenu de la table en fonction des paramètres
	//passés
	//
    // Contrat :
    //
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'` WHERE '.$clause );
	} //---- Fin de Delete

    public function Clear (  )
    // Mode d'emploi :
    //Efface la totalité du contenu de la table courante.
	//
    // Contrat :
    //
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'`' );
	} //---- Fin de Clear
	
    public function Drop (  )
    // Mode d'emploi :
    //Supprime la table courante de la base de données
	//passés
	//
    // Contrat :
	//
	{
		return $this->bDDConnection->Query ( 'DROP TABLE `'.$this->tableName.'`' );
	} //---- Fin de Drop
    
//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $table, MySQLConnection $connection, & $errors )
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
	{
		parent::__construct ( $table, $connection, $errors );
	}
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
	protected function isValidProperty ( $property )
	// Mode d'emploi :
	//vérifie dans la structure de la table si la propriété existe ou non
	//
	// Renvoie : 
	//- vrai si tel est le cas;
	//- faux sinon
	//
	// Contrat :
	//
	{
		foreach ( $this->structure as $champ )
		{
			if ( $champ->getProperty( MySQLTable::MYSQL_STRUCTURE_FIELD_NAME ) == $property )
			{
				return true;
			}
		}
		
		return false;
	}
	
	protected function bDDRecordToTableRecord ( BDDRecord $record )
    // Mode d'emploi :
    //transforme l'enregistrement fourni en paramètre en un enregistrement
	//valable pour cette table. Cette fonction fait une intersection de l'
	//enregistrement et de la structure de la table.
	//
	//Chaque donnée est par la meme encodée de facon sure pour les requetes
	//
	// Renvoie : 
	//un objet de type BDDRecord contenant un enregistrement correspondant
	//a la table
	//
    // Contrat :
    //
	{
		$tableRecord = new BDDRecord();
		
		foreach ( $record as $champ => $value ) 
		{
			if ( $this->isValidProperty( $champ ) )
			{
				$tableRecord->SetProperty ( $champ , mysql_real_escape_string ( $value, $this->bDDConnection ) );
			}
		}
		
		return $tableRecord;
	}

//----------------------------------------------------- Attributs protégés
}

//-------------------------------- Autres définitions dépendantes de <MySQLTable>

?>