<?php

/*************************************************************************
                           |MySQLTable.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <MySQLTable>
//
//
//------------------------------------------------------------------------ 

class MySQLTable extends BDDTable
{
//----------------------------------------------------------------- PUBLIC

	const TABLE_COLUMN_ALL = '*'; 
	// repr�sente l'ensemble des colonnes
	
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
	
	// caract�res magiques REGEX
		const MYSQL_SEEK_MULTICHARS = '%'; // remplace X chars diff�rents
		const MYSQL_SEEK_ANYCHAR = '_'; // remplace un char
	// fin des caract�res magiques REGEX
	
	const MYSQL_SEEK_STRICT = ' = ';// recherche stricte =
	const MYSQL_SEEK_SEPARATOR = '"';// char de s�paration
	// param�tre de recherche
	
	const MYSQL_STRUCTURE_FIELD_NAME = 'Field'; 
	// champ contenant le nom du champ dans le structure

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
    public function Select ( $champs, $options )
    // Mode d'emploi :
    //permet de r�cuperer le contenu d'une table selon diff�rents param�tres
	//sous forme d'un BDDRecordSet
	//
	//les donn�es sont d�cod�es de la base pour etre exploitables.
	//
	//$champs est un tableau ou une chaine de caract�res repr�sentant les champs
	//� selectionner.
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
    //permet d'ins�rer de nouveaux enregistrements dans la table
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
    //permet de mettre � jour le contenu de la table en mettant � jour
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
    //permet d'effacer une partie du contenu de la table en fonction des param�tres
	//pass�s
	//
    // Contrat :
    //
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'` WHERE '.$clause );
	} //---- Fin de Delete

    public function Clear (  )
    // Mode d'emploi :
    //Efface la totalit� du contenu de la table courante.
	//
    // Contrat :
    //
	{
		return $this->bDDConnection->Query ( 'DELETE FROM `'.$this->tableName.'`' );
	} //---- Fin de Clear
	
    public function Drop (  )
    // Mode d'emploi :
    //Supprime la table courante de la base de donn�es
	//pass�s
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
	// Renvoie par r�f�rence dans $errors :
	//- NULL si aucune erreur n'est intervenue
	//- un objet de type errors en cas d'erreur;
	//
    // Contrat :
	//- la connexion doit rester valable tout le temps de op�rations sur la table
	{
		parent::__construct ( $table, $connection, $errors );
	}
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
	protected function isValidProperty ( $property )
	// Mode d'emploi :
	//v�rifie dans la structure de la table si la propri�t� existe ou non
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
    //transforme l'enregistrement fourni en param�tre en un enregistrement
	//valable pour cette table. Cette fonction fait une intersection de l'
	//enregistrement et de la structure de la table.
	//
	//Chaque donn�e est par la meme encod�e de facon sure pour les requetes
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

//----------------------------------------------------- Attributs prot�g�s
}

//-------------------------------- Autres d�finitions d�pendantes de <MySQLTable>

?>