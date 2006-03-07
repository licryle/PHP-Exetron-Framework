<?php

/*************************************************************************
                           |Site.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <Site>
//Gestion d'une entr�e de table Site
//
//------------------------------------------------------------------------ 

class Site extends BDDRecord
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function Validate (  )
    // Mode d'emploi :
    //permettra de valider l'objet courant en vue d'une sauvegarde dans la base
	//de donn�es
	//
	// Renvoie :
	//- NULL si l'objet est valid�. Il sera alors pr�t pour une sauvegarde
	//- un objet de type Errors contenant les erreurs qui emp�chent la validation
	//
    // Contrat :
    //
	{
		$this->isValid = ! empty( $this->row[ TableSite::TABLE_COLUMN_NAME ] );
		
		return NULL;
	}
	
//-----------------------------------------------Impl�mentation Iterator

//---------------------------------------------Fin impl�mentation Iterator

//-------------------------------------------- Constructeurs - destructeur

    function __construct( BDDRecord & $newRec )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Site � partir d'un objet de
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

//-------------------------------- Autres d�finitions d�pendantes de <Site>

?>