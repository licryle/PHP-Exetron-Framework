<?php

/*************************************************************************
                           |MySQLTableVariable.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLTableVariable> (fichier MySQLTableVariable.php) --------------
if (defined('MYSQLTABLEVARIABLE_H'))
{
    return;
}
else
{

}
define('MYSQLTABLEVARIABLE_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <MySQLTableVariable>
//
//
//------------------------------------------------------------------------ 

class MySQLTableVariable extends MySQLTable implements TableVariableInterface
{
//----------------------------------------------------------------- PUBLIC	

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
	public function SelectServerVariables ()
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des variables de configuration li�es
	//au serveur.
	//
    // Renvoie :
	//- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SERVER
	//dans un objet de type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		return $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , MySQLTABLE::MYSQL_CLAUSE_WHERE . TableVariable::TABLE_COLUMN_SCOPE . MySQLTABLE::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR . TableVariable::TABLE_COLUMN_SCOPE_SERVER .MySQLTABLE::MYSQL_SEEK_SEPARATOR );
	} //---- Fin de SelectServerVariable
	
	public function SelectSiteVariables ( $idsite )
    // Mode d'emploi :
	//permet de r�cup�rer l'ensemble des variables de configuration li�es
	//� un site.
	//
	// Renvoie :
    //- l'ensemble des variables de scope TABLE_COLUMN_SCOPE_SITE
	//et de site n� $idsite en un objet de type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		return $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableVariable::TABLE_COLUMN_SCOPE.MySQLTABLE::MYSQL_SEEK_STRICT . MySQLTABLE::MYSQL_SEEK_SEPARATOR.TABLE_COLUMN_SCOPE_SITE . MySQLTABLE::MYSQL_SEEK_SEPARATOR .
						MySQLTABLE::MYSQL_CLAUSE_AND.
								TableVariable::TABLE_COLUMN_SITE.MySQLTABLE::MYSQL_SEEK_STRICT.MySQLTABLE::MYSQL_SEEK_SEPARATOR.$idsite.MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);
	} //---- Fin de SelectSiteVariable
	
	public function SelectVariablesByName ( $varName )
    // Mode d'emploi :
	//permet de s�lectionner l'ensemble des variables de nom $varname.
	//Il est possible ici d'utiliser les caract�res magiques MYSQL_SEEK_MULTICHARS et MYSQL_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des variables de nom $varname dans un objet de 
	//type BDDRecordSet en cas de r�ussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		return $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableVariable::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR.$varName.MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);	
	} //---- Fin de SelectVariablesByName
	
	public function UpdateVariableByIdVariable ( Variable $new )
    // Mode d'emploi :
	//permet de mettre � jour une variable en fonction de sa clef IdVariable
	//disponible en tant que propri�t� TABLE_COLUMN_IDVARIABLE
	//
	// Renvoie :
    //- un objet de type BDDRecordSet en cas de r�ussite
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de Variable non valid�, merci de le valider avant de lancer une mise � jour') ) ;
			
			return $errors;
		}

		// record valid�, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableVariable::TABLE_COLUMN_IDVARIABLE . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE ) );
		
		if ( ! ($res = $this->IdVariableExists( intval ($new->GetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre � jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- Fin de UpdateVariableByIdVariable
	
	public function InsertVariable ( Variable $variable )
    // Mode d'emploi :
	//permet d'ajouter une nouvelle variable � l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- un objet de type BDDRecordSet en cas de r�ussite.
	//
	// Contrat :
	{
		return $this->Insert ( $variable );
	} //---- Fin de InsertVariable
	
	public function IdVariableExists ( $idVariable )
    // Mode d'emploi :
	//permet de connaitre si l'$idVariable existe dans la table
	//
	// Renvoie :
	//- true si $idVariable est pr�sent,
	//- false sinon.
	//
	// Contrat :
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableVariable::TABLE_COLUMN_IDVARIABLE . MySQLTABLE::MYSQL_SEEK_SEPARATOR . MySQLTable::MYSQL_SEEK_STRICT . intval( $idVariable ) . MySQLTABLE::MYSQL_SEEK_SEPARATOR;
		
		$res = $this->Select( TableVariable::TABLE_COLUMN_IDVARIABLE, $clauses);

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

//-------------------------------- Autres d�finitions d�pendantes de <MySQLTableVariable>

?>