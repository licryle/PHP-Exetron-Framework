<?php

/*************************************************************************
                           |Groups.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Groups>
//
//
//------------------------------------------------------------------------ 

class Groups extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques

    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveGroups ( )
    // Mode d'emploi :
    //met à jour les éléments Valides de la liste
	//les ajoute si l'IdGroup est inexistant
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
		foreach ( $this->groups as $group )
		{
			if ( $group->IsValid() )
			{
				if ( $this->groupTable->IdGroupExists ( $group->GetProperty( TableGroup::TABLE_COLUMN_IDGROUP ) ) )
				{
					if ( ( $errs = $this->groupTable->UpdateGroupByIdGroup ( $group )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->groupTable->InsertGroup( $group) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- Fin de SaveGroups
	

    public function LoadGroups ( )
    // Mode d'emploi :
    //charge dans l'objet Groups les objets Group de la table
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$conf = & $this->groupTable->SelectGroups( );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}
		
		foreach ( $conf as $group )
		{
			$this->Add( new Group ( $group ) );
		}
		
		return NULL;
	} //---- Fin de LoadGroups
	

    public function LoadGroupByIdGroup ( $idGroup )
    // Mode d'emploi :
    //charge dans l'objet Groups le Groupe d'idGroup $idGroup
	//
	// Renvoie :
	//- l'objet Group correspondant en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$group = & $this->groupTable->SelectGroupByIdGroup( $idGroup );
		
		if ( $group instanceOf Errors )
		{
			return $group;
		}
		
		$newGroup = new Group ( $group );
		$this->Add( $newGroup );
		
		return $newGroup;
	} //---- Fin de LoadGroupByIdGroup

    public function LoadGroupsByName ( $nameGroup )
    // Mode d'emploi :
    //charge dans l'objet Groups les Groups de nom $nameGroup
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
		$groups = & $this->groupTable->FindGroupsByName( $nameGroup );
		
		if ( $groups instanceOf Errors )
		{
			return $groups;
		}
		
		foreach ( $groups as $group )
		{
			$this->Add( new Group ( $group ) );
		}
		
		return NULL;
	} //---- Fin de LoadGroupsByName
	
	public function GetGroupByIdGroup ( $idGroup )
	// Mode d'emploi :
	//permet de récupérer le groupe d'id $idGroup.
	//
	// Renvoie :
	//- un objet de type Group en cas de réussite
	//- un objet de type Errors si la group n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		if ( isset ( $this->groups [ $idGroup ] ) )
		{
			return $this->groups [ $idGroup ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new GroupError ( GroupError::GROUP_NOT_LOADED, 'Group non chargé ou inexistant.' ) );
			
			return $errors;
		}
	} //---- Fin de GetGroupByIdGroup
	
	public function GetGroupByName ( $nameGroup )
	// Mode d'emploi :
	//permet de récupérer le group de nom $nameGroup.
	//
	// Renvoie :
	//- un objet de type Group en cas de réussite
	//- un objet de type Errors si la group n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
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
		$errors->Add ( new GroupError ( GroupError::GROUP_NOT_LOADED, 'Group non chargé ou inexistant.' ) );
			
		return $errors;
	} //---- Fin de GetGroupByName
	
	public function SetGroup ( Group $group )
	// Mode d'emploi :
	//permet de mettre en mémoire dans l'objet le groupe $group.
	//
	//Afin de la sauver dans la base de donnée, il est nécessaire d'appeler SaveGroups().
	//
	// Algorithme :
	{

		$this->Add ( $group );

	} //---- Fin de SetGroup
	
//------------------------------------------- Implémentation de MyIterator

    public function Add( Group $newVar )
    // Mode d'emploi :
    //Ajoute un group à la liste
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
    //Remet à zero la liste des groupes
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
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->groups );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->groups );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'id du groupe pointé par la liste
    //
    {
        return Key ( $this->groups );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->groups );
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
    public function __construct( $groupTable, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie un Groups à partir d'un objet de type BDDTableGroup
	//où BDD représente le type de base actuellement à l'emploi
	//
	// Renvoie par référence dans $errors :
	//- un objet de type Errors en cas d'erreur,
	//- NULL si l'opération s'est parfaitement déroulée.
	//
	// Note : 
	//Un objet de type BDDTableGroups est valide dès lors qu'il implémente
	//l'interface TableGroupInterface.
	//
    // Contrat :
    //
    {
		$errors = NULL;
		
    	if ( ! @in_array( 'TableGroupInterface', class_implements ( $groupTable ) ) )
		{
			$errors = new Errors ( );
			$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table Group correcte.' ) );
		}
		
		$this->groupTable = $groupTable;
		$this->groups = array();
		
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

	protected $groupTable; // contient une instance de
	// BDDTableGroup permettant l'execution des requetes
	
	protected $groups; // contient les groups de group
	// sous forme de BDDRecord indexées par leur nom

}

//-------------------------------- Autres définitions dépendantes de <Groups>

?>

