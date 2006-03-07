<?php

/*************************************************************************
                           |Site.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Site> (fichier Site.php) --------------
if (defined('SITE_H'))
{
    return;
}
else
{

}
define('SITE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Site>
//Gestion d'une entrée de table Site
//
//------------------------------------------------------------------------ 

class Site extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function Validate (  )
    // Mode d'emploi :
    //permettra de valider l'objet courant en vue d'une sauvegarde dans la base
	//de données
	//
	// Renvoie :
	//- NULL si l'objet est validé. Il sera alors prêt pour une sauvegarde
	//- un objet de type Errors contenant les erreurs qui empêchent la validation
	//
    // Contrat :
    //
	{
		$this->isValid = ! empty( $this->row[ TableSite::TABLE_COLUMN_NAME ] );
		
		return NULL;
	}
	
//-----------------------------------------------Implémentation Iterator

//---------------------------------------------Fin implémentation Iterator

//-------------------------------------------- Constructeurs - destructeur

    function __construct( BDDRecord & $newRec )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Site à partir d'un objet de
	//type BDDRecord en faisant une copie en profondeur.
	//
    // Contrat :
    //
    {
		// initialisation
		$this->SetProperty ( TableSite::TABLE_COLUMN_IDSITE , '' );
		$this->SetProperty ( TableSite::TABLE_COLUMN_NAME , '' );

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

//-------------------------------- Autres définitions dépendantes de <Site>

?>