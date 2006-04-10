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
    public function __construct( BDDRecordSet $users )
    // Mode d'emploi (constructeur) :
    //instancie des Users à partir d'un BDDRecordSet
	//
    // Contrat :
    //
    {
		$this->users = array();
		
		foreach ( $users as $user )
		{
			$this->Add( new User ( $user ) );
		}		
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
	
	protected $users; // contient les users de user
	// sous forme de BDDRecord indexées par leur nom

}

//-------------------------------- Autres définitions dépendantes de <Users>

?>