<?php

/*************************************************************************
                           |Sites.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <Sites>
//
//
//------------------------------------------------------------------------ 

class Sites extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques

    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveSites ( )
    // Mode d'emploi :
    //met � jour les �l�ments Valides de la liste
	//les ajoute si l'IdSites est inexistant
	//
	// Renvoie :
	//- NULL en cas de r�ussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un �l�ment n'est pas valid�
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
	//- NULL en cas de r�ussite
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
	//- l'objet Site correspondant en cas de r�ussite
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
	//Il est possible ici d'utiliser les caract�res magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
	//- NULL en cas de r�ussite
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
	//permet de r�cup�rer le site d'id $idSite.
	//
	// Renvoie :
	//- un objet de type Site en cas de r�ussite
	//- un objet de type Errors si la site n'est pas charg�e ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas r�f�rence.
	//
	{
		if ( isset ( $this->sites [ $idSite ] ) )
		{
			return $this->sites [ $idSite ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new SiteError ( SiteError::SITE_NOT_LOADED, 'Site non charg� ou inexistant.' ) );
			
			return $errors;
		}
	} //---- Fin de GetSiteByIdSite
	
	public function GetSiteByName ( $nameSite )
	// Mode d'emploi :
	//permet de r�cup�rer le site de nom $nameSite.
	//
	// Renvoie :
	//- un objet de type Site en cas de r�ussite
	//- un objet de type Errors si la site n'est pas charg�e ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas r�f�rence.
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
		$errors->Add ( new SiteError ( SiteError::SITE_NOT_LOADED, 'Site non charg� ou inexistant.' ) );
			
		return $errors;
	} //---- Fin de GetSiteByName
	
	public function SetSite ( Site $site )
	// Mode d'emploi :
	//permet de mettre en m�moire dans l'objet la site $site.
	//
	//Afin de la sauver dans la base de donn�e, il est n�cessaire d'appeler SaveSites().
	//
	// Algorithme :
	{
		$this->Add ( $site );
	} //---- Fin de SetSite
	
//------------------------------------------- Impl�mentation de MyIterator

    public function Add( Site $newVar )
    // Mode d'emploi :
    //Ajoute un site � la liste
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
    //Remet � zero la liste des sites
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
    
//-----------------------------------------------Impl�mentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au d�but de la liste
    //
    {
        reset( $this->sites );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'�l�ment actuel de la liste
    //
    {
        return current( $this->sites );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'id du site point� par la liste
    //
    {
        return Key ( $this->sites );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel �l�ment point�
    //
    {
        return next( $this->sites );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'�l�ment est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid

//---------------------------------- Fin de l'impl�mentation de MyIterator

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $siteTable, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie une Sites � partir d'un objet de type BDDTableSite
	//o� BDD repr�sente le type de base actuellement � l'emploi
	//
	// Renvoie par r�f�rence dans $errors :
	//- un objet de type Errors en cas d'erreur,
	//- NULL si l'op�ration s'est parfaitement d�roul�e.
	//
	// Note : 
	//Un objet de type BDDTableSites est valide d�s lors qu'il impl�mente
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
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

	protected $siteTable; // contient une instance de
	// BDDTableSite permettant l'execution des requetes
	
	protected $sites; // contient les sites de site
	// sous forme de BDDRecord index�es par leur nom

}

//-------------------------------- Autres d�finitions d�pendantes de <Sites>

?>