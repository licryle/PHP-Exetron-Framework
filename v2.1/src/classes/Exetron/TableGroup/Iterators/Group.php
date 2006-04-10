<?php

/*************************************************************************
                           |Group.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Group> (fichier Group.php) --------------
if (defined('GROUP_H'))
{
    return;
}
else
{

}
define('GROUP_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Group>
//Gestion d'une entrée de table Group
//
//------------------------------------------------------------------------ 

class Group extends BDDRecord
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
	//$siteTable doit etre une instance valide d'un BDDSiteGroup.
	//Les classes candidates implémentes l'interface TableGroupInterface.
	//
	// Renvoie :
	//- NULL si l'objet est validé. Il sera alors prêt pour une sauvegarde
	//- un objet de type Errors contenant les erreurs qui empêchent la validation
	//
    // Contrat :
    //
	{
		$errors = new Errors ();
	
		// login
			if ( empty( $this->row[ TableGroup::TABLE_COLUMN_NAME ] ) )
			{
				$errors->Add ( new GroupError ( GroupError::GROUP_NAME_EMPTY, 'Veuillez saisir un nom d\'utilisateur.') );
			}
	
		// referent IdSite
			if ( ! @in_array( 'TableSiteInterface', class_implements ( $siteTable ) ) )
			{
				$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table Site correcte.' ) );
			} 
			else
			{
				if ( ! $siteTable->IdSiteExists( $this->row[ TableSite::TABLE_COLUMN_IDSITE ]  ) )
				{
					$errors->Add ( new GroupError ( GroupError::GROUP_IDSITE_INEXISTANT, 'Le groupe n\'appartient à aucun site valide.') );
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
	}
	
//-----------------------------------------------Implémentation Iterator

//---------------------------------------------Fin implémentation Iterator

//-------------------------------------------- Constructeurs - destructeur

    function __construct( BDDRecord & $newRec )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Group à partir d'un objet de
	//type BDDRecord en faisant une copie en profondeur.
	//
    // Contrat :
    //
    {
		// initialisation
		$this->SetProperty ( TableGroup::TABLE_COLUMN_IDGROUP , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_NAME , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_OVERRIDE , '' );
		$this->SetProperty ( TableGroup::TABLE_COLUMN_IDSITE , '' );

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

//-------------------------------- Autres définitions dépendantes de <Group>

?>