<?php

/*************************************************************************
                           |MySQLTableSite.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLTableSite> (fichier MySQLTableSite.php) --------------
if (defined('MYSQLTABLESITE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLESITE_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <MySQLTableSite>
//
//
//------------------------------------------------------------------------ 

class MySQLTableSite extends MySQLTable
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

	public function SelectSites ()
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des sites.
	//
    // Renvoie :
	//- l'ensemble des sites sous forme d'objets Site dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		return $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , '' );
	} //---- Fin de SelectSites
	
	
	public function SelectSiteByIdSite ( $idSite )
    // Mode d'emploi :
	//permet de s�lectionner le site d'id $idSite.
	//
	// Renvoie :
    //- le site d'id $idSite dans un objet de type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableSite::TABLE_COLUMN_IDSITE . MySQLTABLE::MYSQL_SEEK_STRICT. intval( $idSite )
				);	
	} //---- Fin de SelectSiteByIdSite
	
	public function FindSitesByName ( $siteName )
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des sites de nom $siteName.
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des sites de nom $sitename dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableSite::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR. addslashes( $siteName ).MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);	
	} //---- Fin de FindSitesByName
	
	public function UpdateSiteByIdSite ( Site $new )
    // Mode d'emploi :
	//permet de mettre � jour une site en fonction de sa propri�t�
	// TABLE_COLUMN_IDSITE (clef primaire)
	//
	// Renvoie :
    //- NULL en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Site non valid�, merci de le valider avant de lancer une mise � jour') ) ;
			
			return $errors;
		}

		// record valid�, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableSite::TABLE_COLUMN_IDSITE . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableSite::TABLE_COLUMN_IDSITE ) );
		
		if ( ! ($res = $this->IdSiteExists( intval ($new->GetProperty ( TableSite::TABLE_COLUMN_IDSITE ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre � jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- Fin de UpdateSite
	
	public function InsertSite ( Site $site )
    // Mode d'emploi :
	//permet d'ajouter une nouvelle site � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de r�ussite.
	//
	// Contrat :
	{
		return $this->Insert ( $site );
	} //---- Fin de InsertSite
	
	public function IdSiteExists ( $idSite )
    // Mode d'emploi :
	//permet de connaitre si l'$idSite existe dans la table
	//
	// Renvoie :
	//- true si $idSite est pr�sent,
	//- false sinon.
	//
	// Contrat :
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableSite::TABLE_COLUMN_IDSITE . MySQLTable::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR . intval( $idSite ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR;
		
		$res = $this->Select( TableSite::TABLE_COLUMN_IDSITE, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	}
	
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

//-------------------------------- Autres d�finitions d�pendantes de <MySQLTableSite>

?>

