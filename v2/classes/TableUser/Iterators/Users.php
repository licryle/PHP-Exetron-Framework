<?php

/*************************************************************************
                           |Users.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Users> (fichier Users.php) --------------
if (defined('USERS_H'))
{
    return;
}
else
{

}
define('USERS_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Users>
//
//
//------------------------------------------------------------------------ 

class Users extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques

    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveUsers ( )
    // Mode d'emploi :
    //met à jour les éléments Valides de la liste
	//les ajoute si l'IdUser est inexistant
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
		foreach ( $this->users as $user )
		{
			if ( $user->IsValid() )
			{
				if ( $this->userTable->IdUserExists ( $user->GetProperty( TableUser::TABLE_COLUMN_IDUSER ) ) )
				{
					if ( ( $errs = $this->userTable->UpdateUserByIdUser ( $user )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->userTable->InsertUser( $user) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- Fin de SaveUsers
	

    public function LoadUsers ( )
    // Mode d'emploi :
    //charge dans l'objet Users les objets User de la table
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$conf = & $this->userTable->SelectUsers( );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}
		
		foreach ( $conf as $user )
		{
			$this->Add( new User ( $user ) );
		}
		
		return NULL;
	} //---- Fin de LoadUsers
	

    public function LoadUsersByIdGroup ( $idGroup )
    // Mode d'emploi :
    //charge dans l'objet Users les objets User de la table ayant pour
	//groupe le groupe d'id $idGroup
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$conf = & $this->userTable->SelectUsersByIdGroup( $idGroup );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}

		foreach ( $conf as $user )
		{
			$this->Add( new User ( $user ) );
		}
		
		return NULL;
	} //---- Fin de LoadUsersByIdGroup
	

    public function LoadUserByIdUser ( $idUser )
    // Mode d'emploi :
    //charge dans l'objet Users le User d'idUser $idUser
	//
	// Renvoie :
	//- l'objet User correspondant en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
    // Contrat :
    //
	{
		$user = & $this->userTable->SelectUserByIdUser( $idUser );
		
		if ( $user instanceOf Errors )
		{
			return $user;
		}
		
		$newUser = new User ( $user );
		$this->Add( $newUser );
		
		return $newUser;
	} //---- Fin de LoadUserByIdUser

    public function LoadUsersByName ( $nameUser )
    // Mode d'emploi :
    //charge dans l'objet Users les Users de nom $nameUser
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
		$users = & $this->userTable->FindUsersByName( $nameUser );
		
		if ( $users instanceOf Errors )
		{
			return $users;
		}
		
		foreach ( $users as $user )
		{
			$this->Add( new User ( $user ) );
		}
		
		return NULL;
	} //---- Fin de LoadUsersByName
	
	public function GetUserByIdUser ( $idUser )
	// Mode d'emploi :
	//permet de récupérer le user d'id $idUser.
	//
	// Renvoie :
	//- un objet de type User en cas de réussite
	//- un objet de type Errors si la user n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		if ( isset ( $this->users [ $idUser ] ) )
		{
			return $this->users [ $idUser ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new UserError ( UserError::USER_NOT_LOADED, 'Utilisateur non chargé ou inexistant.' ) );
			
			return $errors;
		}
	} //---- Fin de GetUserByIdUser
	
	public function GetUserByName ( $nameUser )
	// Mode d'emploi :
	//permet de récupérer le user de nom $nameUser.
	//
	// Renvoie :
	//- un objet de type User en cas de réussite
	//- un objet de type Errors si la user n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		foreach ( $this->users as $user ) 
		{
			if ( $user->GetProperty ( TableUser::TABLE_COLUMN_NAME ) == $nameUser )
			{
				return $user;
			}
		}
		
		$errors = new Errors ( );
		$errors->Add ( new UserError ( UserError::USER_NOT_LOADED, 'User non chargé ou inexistant.' ) );
			
		return $errors;
	} //---- Fin de GetUserByName
	
	public function SetUser ( User $user )
	// Mode d'emploi :
	//permet de mettre en mémoire dans l'objet la user $user.
	//
	//Afin de la sauver dans la base de donnée, il est nécessaire d'appeler SaveUsers().
	//
	// Algorithme :
	{

		$this->Add ( $user );

	} //---- Fin de SetUser
	
//------------------------------------------- Implémentation de MyIterator

    public function Add( User $newVar )
    // Mode d'emploi :
    //Ajoute un utilisateurs à la liste
    //
    {
		$key = $newVar->GetProperty ( TableUser::TABLE_COLUMN_IDUSER );
	
		if ( empty ( $key ) )
		{
			$this->users [] = $newVar;		
		}
		else
		{
			$this->users [ $key ] = $newVar;
		}
    } //---- Fin de Add

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des users
    //
    {
        unset($this->users);
        
        $this->users = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre de users contenus dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $this->users );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->users );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->users );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'id du user pointé par la liste
    //
    {
        return Key ( $this->users );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->users );
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
    public function __construct( $userTable, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie une Users à partir d'un objet de type BDDTableUser
	//où BDD représente le type de base actuellement à l'emploi
	//
	// Renvoie par référence dans $errors :
	//- un objet de type Errors en cas d'erreur,
	//- NULL si l'opération s'est parfaitement déroulée.
	//
	// Note : 
	//Un objet de type BDDTableUsers est valide dès lors qu'il implémente
	//l'interface TableUserInterface.
	//
    // Contrat :
    //
    {
		$errors = NULL;
		
    	if ( ! @in_array( 'TableUserInterface', class_implements ( $userTable ) ) )
		{
			$errors = new Errors ( );
			$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table User correcte.' ) );
		}
		
		$this->userTable = $userTable;
		$this->users = array();
		
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

	protected $userTable; // contient une instance de
	// BDDTableUser permettant l'execution des requetes
	
	protected $users; // contient les users de user
	// sous forme de BDDRecord indexées par leur nom

}

//-------------------------------- Autres définitions dépendantes de <Users>

?>

