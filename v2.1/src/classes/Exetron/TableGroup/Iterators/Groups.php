<?php

/*************************************************************************
                           |Groups.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Groups> (fichier Groups.php) --------------
if (defined('GROUPS_H'))
{
    return;
}
else
{

}
define('GROUPS_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <Groups>
//
//
//------------------------------------------------------------------------ 

class Groups extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques

    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
	public function GetGroupByIdGroup ( $idGroup )
	// Mode d'emploi :
	//permet de r�cup�rer le groupe d'id $idGroup.
	//
	// Renvoie :
	//- un objet de type Group en cas de r�ussite
	//- un objet de type Errors si la group n'est pas charg�e ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas r�f�rence.
	//
	{
		if ( isset ( $this->groups [ $idGroup ] ) )
		{
			return $this->groups [ $idGroup ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new GroupError ( GroupError::GROUP_NOT_LOADED, 'Group non charg� ou inexistant.' ) );
			
			return $errors;
		}
	} //---- Fin de GetGroupByIdGroup
	
	public function GetGroupByName ( $nameGroup )
	// Mode d'emploi :
	//permet de r�cup�rer le group de nom $nameGroup.
	//
	// Renvoie :
	//- un objet de type Group en cas de r�ussite
	//- un objet de type Errors si la group n'est pas charg�e ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas r�f�rence.
	//
	{
		foreach ( $this->groups as $group ) 
		{
			if ( $group->GetProperty ( TableGroup::TABLE_COLUMN_NAME ) == $nameGroup )
			{
				return $group;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new GroupError ( GroupError::GROUP_NOT_LOADED, 'Group non charg� ou inexistant.' ) );
			
		return $errors;
	} //---- Fin de GetGroupByName
	
	public function SetGroup ( Group $group )
	// Mode d'emploi :
	//permet de mettre en m�moire dans l'objet le groupe $group.
	//
	//Afin de la sauver dans la base de donn�e, il est n�cessaire d'appeler SaveGroups().
	//
	// Algorithme :
	{

		$this->Add ( $group );

	} //---- Fin de SetGroup
	
//------------------------------------------- Impl�mentation de MyIterator

    public function Add( Group $newVar )
    // Mode d'emploi :
    //Ajoute un group � la liste
    //
    {
		$key = $newVar->GetProperty ( TableGroup::TABLE_COLUMN_IDGROUP );
	
		if ( empty ( $key ) )
		{
			$this->groups [] = $newVar;		
		}
		else
		{
			$this->groups [ $key ] = $newVar;
		}
    } //---- Fin de Add

    public function DelAll( )
    // Mode d'emploi :
    //Remet � zero la liste des groupes
    //
    {
        unset($this->groups);
        
        $this->groups = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre de groupes contenus dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $this->groups );
    } //---- Fin de GetCount
    
//-----------------------------------------------Impl�mentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au d�but de la liste
    //
    {
        reset( $this->groups );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'�l�ment actuel de la liste
    //
    {
        return current( $this->groups );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'id du groupe point� par la liste
    //
    {
        return Key ( $this->groups );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel �l�ment point�
    //
    {
        return next( $this->groups );
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
    public function __construct( BDDRecordSet $groups )
    // Mode d'emploi (constructeur) :
    //instancie des Groups � partir d'un BDDRecordSet
	//
    // Contrat :
    //
    {
		$this->groups = array();
		
		foreach ( $groups as $group )
		{
			$this->Add( new Group ( $group ) );
		}		
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
	
	protected $groups; // contient les groups de group
	// sous forme de BDDRecord index�es par leur nom

}

//-------------------------------- Autres d�finitions d�pendantes de <Groups>

?>