<?php

/*************************************************************************
                           |Sites.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Sites> (fichier Sites.php) --------------
if (defined('SITES_H'))
{
    return;
}
else
{

}
define('SITES_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Sites>
//
//
//------------------------------------------------------------------------ 

class Sites extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques

    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveSites ( )
    // Mode d'emploi :
    //met à jour les éléments Valides de la liste
	//les ajoute si l'IdSites est inexistant
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un élément n'est pas validé
	//elle n'en tient simplement pas compte dans son traitement.
	//
    // Contrat :
    //
	{		
		foreach ( $this->sites as $site )
		{
			if ( $site->IsValid() )
			{
				if ( $this->siteTable->IdSiteExists ( $site->GetProperty( TableSite::TABLE_COLUMN_IDSITE ) ) )
				{
					if ( ( $errs = $this->siteTable->UpdateSiteByIdSite ( $site )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->siteTable->InsertSite( $site) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- Fin de SaveSites
	

    public function LoadSites ( )
    // Mode d'emploi :
    //charge dans l'objet Sites les objets Site de la table
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$conf = & $this->siteTable->SelectSites( );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}
		
		foreach ( $conf as $site )
		{
			$this->Add( new Site ( $site ) );
		}
		
		return NULL;
	} //---- Fin de LoadSites
	

    public function LoadSiteByIdSite ( $idSite )
    // Mode d'emploi :
    //charge dans l'objet Sites le Site d'idSite $idSite
	//
	// Renvoie :
	//- l'objet Site correspondant en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$site = & $this->siteTable->SelectSiteByIdSite ( $idSite );
		
		if ( $site instanceOf Errors )
		{
			return $site;
		}
		
		$newSite = new Site ( $site );
		$this->Add( $newSite );
		
		return $newSite;
	} //---- Fin de LoadSiteByIdSite

    public function LoadSitesByName ( $nameSite )
    // Mode d'emploi :
    //charge dans l'objet Sites les Sites de nom $nameSite
	//
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$sites = & $this->siteTable->FindSitesByName ( $nameSite );
		
		if ( $sites instanceOf Errors )
		{
			return $sites;
		}
		
		foreach ( $sites as $site )
		{
			$this->Add( new Site ( $site ) );
		}
		
		return NULL;
	} //---- Fin de LoadSitesBeName
	
	public function GetSiteByIdSite ( $idSite )
	// Mode d'emploi :
	//permet de récupérer le site d'id $idSite.
	//
	// Renvoie :
	//- un objet de type Site en cas de réussite
	//- un objet de type Errors si la site n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		if ( isset ( $this->sites [ $idSite ] ) )
		{
			return $this->sites [ $idSite ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new SiteError ( SiteError::SITE_NOT_LOADED, 'Site non chargé ou inexistant.' ) );
			
			return $errors;
		}
	} //---- Fin de GetSiteByIdSite
	
	public function GetSiteByName ( $nameSite )
	// Mode d'emploi :
	//permet de récupérer le site de nom $nameSite.
	//
	// Renvoie :
	//- un objet de type Site en cas de réussite
	//- un objet de type Errors si la site n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		foreach ( $this->sites as $site ) 
		{
			if ( $site->GetProperty ( TableSite::TABLE_COLUMN_NAME ) == $nameSite )
			{
				return $site;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new SiteError ( SiteError::SITE_NOT_LOADED, 'Site non chargé ou inexistant.' ) );
			
		return $errors;
	} //---- Fin de GetSiteByName
	
	public function SetSite ( Site $site )
	// Mode d'emploi :
	//permet de mettre en mémoire dans l'objet la site $site.
	//
	//Afin de la sauver dans la base de donnée, il est nécessaire d'appeler SaveSites().
	//
	// Algorithme :
	{
		$this->Add ( $site );
	} //---- Fin de SetSite
	
//------------------------------------------- Implémentation de MyIterator

    public function Add( Site $newVar )
    // Mode d'emploi :
    //Ajoute un site à la liste
    //
    {
		$key = $newVar->GetProperty ( TableSite::TABLE_COLUMN_IDSITE );
	
		if ( empty ( $key ) )
		{
			$this->sites [] = $newVar;		
		}
		else
		{
			$this->sites [ $key ] = $newVar;
		}
    } //---- Fin de Add

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des sites
    //
    {
        unset($this->sites);
        
        $this->sites = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre de sites contenus dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $this->sites );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->sites );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->sites );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'id du site pointé par la liste
    //
    {
        return Key ( $this->sites );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->sites );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid

//---------------------------------- Fin de l'implémentation de MyIterator

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $siteTable, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie une Sites à partir d'un objet de type BDDTableSite
	//où BDD représente le type de base actuellement à l'emploi
	//
	// Renvoie par référence dans $errors :
	//- un objet de type Errors en cas d'erreur,
	//- NULL si l'opération s'est parfaitement déroulée.
	//
	// Note : 
	//Un objet de type BDDTableSites est valide dès lors qu'il implémente
	//l'interface TableSiteInterface.
	//
    // Contrat :
    //
    {
		$errors = NULL;
		
    	if ( ! @in_array( 'TableSiteInterface', class_implements ( $siteTable ) ) )
		{
			$errors = new Errors ( );
			$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table Site correcte.' ) );
		}
		
		$this->siteTable = $siteTable;
		$this->sites = array();
		
    } //---- Fin du constructeur


    public function __destruct ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    } //---- Fin du destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

	protected $siteTable; // contient une instance de
	// BDDTableSite permettant l'execution des requetes
	
	protected $sites; // contient les sites de site
	// sous forme de BDDRecord indexées par leur nom

}

//-------------------------------- Autres définitions dépendantes de <Sites>

?>