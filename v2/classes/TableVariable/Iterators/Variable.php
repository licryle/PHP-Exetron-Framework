<?php

/*************************************************************************
                           |Variable.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Variable> (fichier Variable.php) --------------
if (defined('VARIABLE_H'))
{
    return;
}
else
{

}
define('VARIABLE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Variable>
//Gestion d'une entrée de table BDD
//
//------------------------------------------------------------------------ 

class Variable extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function Validate ( $siteTable )
    // Mode d'emploi :
    //permettra de valider l'objet courant en vue d'une sauvegarde dans la base
	//de données
	//
	//$siteTable doit etre une instance valide d'un BDDTableSite.
	//Les classes candidates implémentes l'interface TableSiteInterface.
	//
	// Renvoie :
	//- NULL si l'objet est validé. Il sera alors prêt pour une sauvegarde
	//- un objet de type Errors contenant les erreurs qui empêchent la validation
	//
    // Contrat :
    //
	{
		$errors = new Errors ();
	
		// nom de variable
			if ( empty( $this->row[ TableVariable::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_NAME_EMPTY, 'Veuillez saisir un nom de variable.') );
			}
	
		// scope
			if ( $this->row[ TableVariable::TABLE_COLUMN_SCOPE ] != TableVariable::TABLE_COLUMN_SCOPE_SERVER && $this->row[ TableVariable::TABLE_COLUMN_SCOPE ] != TableVariable::TABLE_COLUMN_SCOPE_SITE  )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_SCOPE_INCORRECT, 'La portée de la variable n\'est pas définie correctement.') );
			}
		
		// access
			if ( $this->row[ TableVariable::TABLE_COLUMN_ACCESS ] != TableVariable::TABLE_COLUMN_ACCESS_ROOT && $this->row[ TableVariable::TABLE_COLUMN_ACCESS ] != TableVariable::TABLE_COLUMN_ACCESS_ADMIN )
			{
				$errors->Add ( new VariableError ( VariableError::VARIABLE_ACCESS_INCORRECT, 'Les accès de la variables ne sont pas définis correctement.') );
			}
		
		// referent IdSite
			if ( ! @in_array( 'TableSiteInterface', class_implements ( $siteTable ) ) )
			{
				$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table Site correcte.' ) );
			} 
			else
			{	
				if ( ! $siteTable->IdSiteExists( $this->row[ TableVariable::TABLE_COLUMN_IDSITE ]  ) )
				{
					$errors->Add ( new VariableError ( VariableError::VARIABLE_IDSITE_INEXISTANT, 'La variable n\'appartient à aucun site valide.') );
				}
			}
		
		// résultat
		if ( $errors->GetCount() == 0 )
		{
			$this->isValid = true;
			return NULL;		
		}
		
		
		$this->isValid = false;
		return $errors;
	} //---- Fin de Validate
	
//-----------------------------------------------Implémentation Iterator

//---------------------------------------------Fin implémentation Iterator

//-------------------------------------------- Constructeurs - destructeur

    function __construct( BDDRecord & $newRec )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Variable à partir d'un objet de
	//type BDDRecord en faisant une copie en profondeur.
	//
    // Contrat :
    //
    {
		// initialisation
		$this->SetProperty ( TableVariable::TABLE_COLUMN_IDVARIABLE , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_NAME , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_DATA , NULL );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_SCOPE , TableVariable::TABLE_COLUMN_SCOPE_SITE );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_ACCESS , TableVariable::TABLE_COLUMN_ACCESS_ADMIN );
		$this->SetProperty ( TableVariable::TABLE_COLUMN_IDSITE , NULL );
	
			
		if ( $newRec != NULL )
		{
			$obj = (array)( $newRec);
			
			$this->row = array_merge ( $this->row, $obj[chr(0).'*'.chr(0).'row'] ); // hack php pour acceder
			// a la prop protected $newRec->row
		}
		
		$this->isValid = false;
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
}

//-------------------------------- Autres définitions dépendantes de <Variable>

?>