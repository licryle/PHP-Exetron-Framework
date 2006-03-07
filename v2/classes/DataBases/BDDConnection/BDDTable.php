<?php

/*************************************************************************
                           |BDDTable.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <BDDTable>
//
//
//------------------------------------------------------------------------ 

abstract class BDDTable extends AbstractClass implements BDDTableInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
    //abstract public function Select (  );
    // Mode d'emploi :
    //permet de r�cuperer le contenu d'une table selon diff�rents param�tres
	//sous forme d'un BDDRecordSet
	//
    // Contrat :
    //
	
    //abstract public function Insert (  );
    // Mode d'emploi :
    //permet d'ins�rer de nouveaux enregistrements dans la table
	//
    // Contrat :
    //
	
    //abstract public function Update (  );
    // Mode d'emploi :
    //permet de mettre � jour le contenu de la table
	//
    // Contrat :
    //
	
    //abstract public function Delete (  );
    // Mode d'emploi :
    //permet d'effacer une partie du contenu de la table en fonction des param�tres
	//pass�s
	//
    // Contrat :
    //
	
    //abstract public function Clear (  );
    // Mode d'emploi :
    //Efface la totalit� du contenu de la table courante.
	//
    // Contrat :
    //
	
    //abstract public function Drop (  );
    // Mode d'emploi :
    //Supprime la table courante de la base de donn�es
	//pass�s
	//
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $table, BDDConnection $connection, & $errors )
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
    //
	// Algorithme :
	//* v�rification de la connexion
	//* v�rification de la table
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
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s
	protected $tableName; // nom de la table g�r�e
	protected $bDDConnection; // class ressource connexion
	protected $structure; // contiendra la structure de la table
}

//-------------------------------- Autres d�finitions d�pendantes de <BDDTable>

?>