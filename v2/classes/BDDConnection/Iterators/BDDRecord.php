<?php

/*************************************************************************
                           |BDDRessourceItem.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <BDDRecord>
//Gestion d'une entr�e de table BDD
//
//------------------------------------------------------------------------ 

class BDDRecord extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function IsValid (  )
    // Mode d'emploi :
    //permettra de connaitre si l'objet a �t� valid�, en vue d'�tre sauvegard�
	//en base de donn�es
	//
	// Renvoie :
	//- vrai ou faux selon si l'objet est valide et pr�t pour une sauvegarde.
	//
    // Contrat :
    //
	{
		return true;
	}
	
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
		return NULL;
	}
	
    public function PropertyExists( $propertyName )
    // Mode d'emploi :
    //Retourne si la propri�t� existe ou non
    //
	// Renvoie :
	//- vrai si la propri�t� existe
	//- faux sinon
	//
    // Algorithme : 
    //trivial
    {
		return ( isset ( $this->row[ $propertyName ] ) );
    } //----- Fin de PropertyExists
	
    public function GetProperty( $propertyName )
    // Mode d'emploi :
    //Retourne la valeur de la propri�t�
    //
	// Renvoie :
	//- la valeur associ�e � la propri�t� si elle existe
	//- un objet de type Errors en cas d'�chec
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
			
			$errs->Add ( new BDDError ( BDDError::CONNECTION_COLUMN_INEXISTANT , 'Propri�t� inexistante' ) );
			
			return $errs;
		}
    } //----- Fin de GetProperty
	
    public function SetProperty( $propertyName , $propertyValue )
    // Mode d'emploi :
    //Affecte la valeur pass�e en param�tre � la propri�t�.
	//Celle-ci est cr��e automatiquement en cas de non existance
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
	//permet de connaitre le nombre de propri�t�s stock�es dans l'objet
	//
	// Renvoie :
	//- le nombre de propri�t�s stock�s
	//- le nombre de propri�t�s stock�s
	//
	//
	{
			return count ( $this->row );
	} //----- Fin de getPropertyCount
	
//-----------------------------------------------Impl�mentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au d�but de la liste
    //
    {
        reset( $this->row );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'�l�ment actuel de la liste
    //
    {
        return current( $this->row );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le code de l'erreur point�e par la liste
    //
    {
        return key( $this->row );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel �l�ment point�
    //
    {
        return next( $this->row );
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
//---------------------------------------------Fin impl�mentation Iterator

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
    
//------------------------------------------------------ M�thodes Magiques
    function __ToString ( )
    // Mode d'emploi :
    // permet l'affichage d l'item locator
    // Contrat :
    //
    {
        return (String)var_export( $this->row );
    } // Fin de __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s
    protected $row;
	
	protected $isValid; // contient true ou false selon si l'objet a �t� valid�.
	//protected $hasBeenModified; // contient true ou false selon si l'objet a �t� modifi�.
}

//-------------------------------- Autres d�finitions d�pendantes de <BDDRecord>

?>

