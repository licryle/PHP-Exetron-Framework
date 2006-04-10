<?php

/*************************************************************************
                           |Session.php|  -  description
                             -------------------
    début                : |09.02.2006|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Session> (fichier Session.php) --------------
if (defined('SESSION_H'))
{
    return;
}
else
{

}
define('SESSION_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Session>
//fournir une abstraction pour la gestion de session basé sur le
//système de gestion de session PHP.
//
//------------------------------------------------------------------------ 

class Session extends AbstractSingleton implements Iterator//, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
    public static function GetInstance ( )
    // User's manual :
    //Getter of the unique instance. Create this if doesn't exist
	//Must appears in all children.
	//
    // Contract :
    //
	{	
		return parent::getThis( __CLASS__ );
	} // End of GetInstance
   
    public function Destruct( )
    // Mode d'emploi :
    //Détruit la session.
	//
    {
		session_destroy ( );
		
		unset ( $_SESSION );
		$_SESSION = array();
    } //---- Fin de Destruct 
	
    public function GetId( )
    // Mode d'emploi :
    //Permet de connaitre l'identifiant de la session.
	//
	// Retourne :
	//- l'identifiant de la session
	//
    {
		return session_id ( );
    } //---- Fin de GetId 
   
    public function SetId( $id )
    // Mode d'emploi :
    //Permet de mettre à jour l'identifiant de la session
	//
    {
		session_id ( $id );
    } //---- Fin de SetId

    public function IsSetVariable( $name )
    // Mode d'emploi :
    //Permet de connaitre si une variable de session existe ou non
    //
	// Retourne :
	//- vrai si la variable de session existe
	//- faux sinon
    {
		return isset( $_SESSION [ $name ] );
    } //---- Fin de IsSetVariable 
	
    public function UnSetVariable( $name )
    // Mode d'emploi :
    //Permet de connaitre si une variable de session existe ou non
    //
	// Retourne :
	//- un objet de type Errors en cas d'erreur
	//- true sinon
    {
		if ( ! $this->IsSetVariable ( $name ) )
		{
			$errors = new Errors();
			$errors->Add ( new SessionError ( SessionError::SESSION_VARIABLE_NOT_SET, 'Impossible de détruire une variable non mise en place.' ) ) ;
			
			return $errors;
		}
		else
		{
			unset ( $_SESSION [ $name ] );
			
			return true;
		}
    } //---- Fin de UnSetVariable 

    
    public function SetVariable(  $name, $value )
    // Mode d'emploi :
    //Met à jour le contenu de la variable de session de nom $name avec le
	//contenu $value
	//
	// Contrat :
	//- $name ne peut etre uniquement numérique ni un objet ni une ressource
    //
    {	
		$_SESSION [ $name ] = $value;
    } //---- Fin de SetVariable

    public function GetVariable( $name )
    // Mode d'emploi :
    //Récupère le contenu de la variable de session $name
	//
	// Retourne :
    //- un objet de type Errors en cas d'erreur
	//- le contenu de la variable de nom $name
    {
		if ( ! $this->IsSetVariable ( $name ) )
		{
			$errors = new Errors();
			$errors->Add ( new SessionError ( SessionError::SESSION_VARIABLE_NOT_SET, 'Impossible d\'obtenir une variable non mise en place.' ) ) ;
			
			return $errors;
		}
		else
		{
			return ( $_SESSION [ $name ] );
		}
    } //---- Fin de GetVariable

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des variables
    //
    {
        unset( $_SESSION );
        
        $_SESSION = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre de variables contenues dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $_SESSION );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $_SESSION );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $_SESSION );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le nom de la variable pointée par la liste
    //
    {
        return Key ( $_SESSION );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $_SESSION );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return Session::current( ) !== false;
    } //---- Fin de Valid

//------------------------------------ Fin de l'implémentation de Iterator

//-------------------------------------------- Constructeurs - destructeur
    protected function __construct( $sessId = '', $sessName = '' )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Session.
	//Si $sessId est fourni, celui-ci servira d'identifiant de session
	//Dans le cas contraire, l'identifiant sera celui récupéré via Cookie, 
	//Get ou Post.
	//Enfin, si aucun n'est récupéré, celui-ci sera généré.
	//
	//Si $sessName est fournit, celui est modifie le nom de la session.
	//
    // Contrat :
    //- l'instanciation doit s'effectuer avant toute sortie à l'écran afin de 
	//que les entetes cookie soient correctement envoyées.
	//- $sessName doit etre alphanumerique sinon le nom ne sera pas changé
    {
		// nom de session
		if ( ereg ( '[a-zA-Z0-9]+', $sessName ) )
		{
			session_name ( $sessName );
		}
		
		// id de session
		if ( !empty( $sessId ) )
		{
			session_id( $sessId );
		}

		// start session
    	session_start( );
    } //---- Fin du constructeur

/*
    public function __destruct ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    } //---- Fin du destructeur*/

//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <Session>

?>