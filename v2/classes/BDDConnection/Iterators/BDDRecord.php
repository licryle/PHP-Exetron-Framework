<?php

/*************************************************************************
                           |BDDRessourceItem.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <BDDRecord> (fichier BDDRecord.php) --------------
if (defined('BDDRECORD_H'))
{
    return;
}
else
{

}
define('BDDRECORD_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDRecord>
//Gestion d'une entrée de table BDD
//
//------------------------------------------------------------------------ 

class BDDRecord extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function IsValid (  )
    // Mode d'emploi :
    //permettra de connaitre si l'objet a été validé, en vue d'être sauvegardé
	//en base de données
	//
	// Renvoie :
	//- vrai ou faux selon si l'objet est valide et prêt pour une sauvegarde.
	//
    // Contrat :
    //
	{
		return true;
	}
	
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
		return NULL;
	}
	
    public function PropertyExists( $propertyName )
    // Mode d'emploi :
    //Retourne si la propriété existe ou non
    //
	// Renvoie :
	//- vrai si la propriété existe
	//- faux sinon
	//
    // Algorithme : 
    //trivial
    {
		return ( isset ( $this->row[ $propertyName ] ) );
    } //----- Fin de PropertyExists
	
    public function GetProperty( $propertyName )
    // Mode d'emploi :
    //Retourne la valeur de la propriété
    //
	// Renvoie :
	//- la valeur associée à la propriété si elle existe
	//- un objet de type Errors en cas d'échec
	//
    // Algorithme : 
    //trivial
    {
		if ( $this->PropertyExists( $propertyName ) )
		{
			return $this->row [ $propertyName ];
		}
		else
		{
			$errs = new Errors ( );
			
			$errs->Add ( new BDDError ( BDDError::CONNECTION_COLUMN_INEXISTANT , 'Propriété inexistante' ) );
			
			return $errs;
		}
    } //----- Fin de GetProperty
	
    public function SetProperty( $propertyName , $propertyValue )
    // Mode d'emploi :
    //Affecte la valeur passée en paramètre à la propriété.
	//Celle-ci est créée automatiquement en cas de non existance
    //
	// Renvoie :
	//
    // Algorithme : 
    //trivial
    {
		$this->row [ $propertyName ] = $propertyValue;
		
		$this->isValid = false;
    } //----- Fin de SetProperty
	
	public function GetPropertyCount ( )
	// Mode d'emploi :
	//permet de connaitre le nombre de propriétés stockées dans l'objet
	//
	// Renvoie :
	//- le nombre de propriétés stockés
	//- le nombre de propriétés stockés
	//
	//
	{
			return count ( $this->row );
	} //----- Fin de getPropertyCount
	
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->row );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->row );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le code de l'erreur pointée par la liste
    //
    {
        return key( $this->row );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->row );
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
//---------------------------------------------Fin implémentation Iterator

//-------------------------------------------- Constructeurs - destructeur
    function __construct( $row = NULL )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
		if ( is_array( $row ) )
		{
			$this->row = $row;
		}
		else
		{
			$this->row = array();
		}
		
		$this->isValid = false;
    } //---- Fin du constructeur
    
//------------------------------------------------------ Méthodes Magiques
    function __ToString ( )
    // Mode d'emploi :
    // permet l'affichage d l'item locator
    // Contrat :
    //
    {
        return (String)var_export( $this->row );
    } // Fin de __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
    protected $row;
	
	protected $isValid; // contient true ou false selon si l'objet a été validé.
	//protected $hasBeenModified; // contient true ou false selon si l'objet a été modifié.
}

//-------------------------------- Autres définitions dépendantes de <BDDRecord>

?>

