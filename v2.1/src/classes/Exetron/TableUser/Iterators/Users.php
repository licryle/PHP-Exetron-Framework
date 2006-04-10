<?php

/*************************************************************************
                           |Users.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <Users>
//
//
//------------------------------------------------------------------------ 

class Users extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques

    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
	public function GetUserByIdUser ( $idUser )
	// Mode d'emploi :
	//permet de r�cup�rer le user d'id $idUser.
	//
	// Renvoie :
	//- un objet de type User en cas de r�ussite
	//- un objet de type Errors si la user n'est pas charg�e ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas r�f�rence.
	//
	{
		if ( isset ( $this->users [ $idUser ] ) )
		{
			return $this->users [ $idUser ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new UserError ( UserError::USER_NOT_LOADED, 'Utilisateur non charg� ou inexistant.' ) );
			
			return $errors;
		}
	} //---- Fin de GetUserByIdUser
	
	public function GetUserByName ( $nameUser )
	// Mode d'emploi :
	//permet de r�cup�rer le user de nom $nameUser.
	//
	// Renvoie :
	//- un objet de type User en cas de r�ussite
	//- un objet de type Errors si la user n'est pas charg�e ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas r�f�rence.
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
		$errors->Add ( new UserError ( UserError::USER_NOT_LOADED, 'User non charg� ou inexistant.' ) );
			
		return $errors;
	} //---- Fin de GetUserByName
	
	public function SetUser ( User $user )
	// Mode d'emploi :
	//permet de mettre en m�moire dans l'objet la user $user.
	//
	//Afin de la sauver dans la base de donn�e, il est n�cessaire d'appeler SaveUsers().
	//
	// Algorithme :
	{

		$this->Add ( $user );

	} //---- Fin de SetUser
	
//------------------------------------------- Impl�mentation de MyIterator

    public function Add( User $newVar )
    // Mode d'emploi :
    //Ajoute un utilisateurs � la liste
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
    //Remet � zero la liste des users
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
    
//-----------------------------------------------Impl�mentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au d�but de la liste
    //
    {
        reset( $this->users );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'�l�ment actuel de la liste
    //
    {
        return current( $this->users );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'id du user point� par la liste
    //
    {
        return Key ( $this->users );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel �l�ment point�
    //
    {
        return next( $this->users );
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
    public function __construct( BDDRecordSet $users )
    // Mode d'emploi (constructeur) :
    //instancie des Users � partir d'un BDDRecordSet
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
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s
	
	protected $users; // contient les users de user
	// sous forme de BDDRecord index�es par leur nom

}

//-------------------------------- Autres d�finitions d�pendantes de <Users>

?>