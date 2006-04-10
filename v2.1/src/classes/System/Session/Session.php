<?php

/*************************************************************************
                           |Session.php|  -  description
                             -------------------
    d�but                : |09.02.2006|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <Session>
//fournir une abstraction pour la gestion de session bas� sur le
//syst�me de gestion de session PHP.
//
//------------------------------------------------------------------------ 

class Session extends AbstractSingleton implements Iterator//, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
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
    //D�truit la session.
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
    //Permet de mettre � jour l'identifiant de la session
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
			$errors->Add ( new SessionError ( SessionError::SESSION_VARIABLE_NOT_SET, 'Impossible de d�truire une variable non mise en place.' ) ) ;
			
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
    //Met � jour le contenu de la variable de session de nom $name avec le
	//contenu $value
	//
	// Contrat :
	//- $name ne peut etre uniquement num�rique ni un objet ni une ressource
    //
    {	
		$_SESSION [ $name ] = $value;
    } //---- Fin de SetVariable

    public function GetVariable( $name )
    // Mode d'emploi :
    //R�cup�re le contenu de la variable de session $name
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
    //Remet � zero la liste des variables
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
    
//-----------------------------------------------Impl�mentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au d�but de la liste
    //
    {
        reset( $_SESSION );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'�l�ment actuel de la liste
    //
    {
        return current( $_SESSION );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le nom de la variable point�e par la liste
    //
    {
        return Key ( $_SESSION );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel �l�ment point�
    //
    {
        return next( $_SESSION );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'�l�ment est valide
    //
    {
        return Session::current( ) !== false;
    } //---- Fin de Valid

//------------------------------------ Fin de l'impl�mentation de Iterator

//-------------------------------------------- Constructeurs - destructeur
    protected function __construct( $sessId = '', $sessName = '' )
    // Mode d'emploi (constructeur) :
    //instancie un objet de type Session.
	//Si $sessId est fourni, celui-ci servira d'identifiant de session
	//Dans le cas contraire, l'identifiant sera celui r�cup�r� via Cookie, 
	//Get ou Post.
	//Enfin, si aucun n'est r�cup�r�, celui-ci sera g�n�r�.
	//
	//Si $sessName est fournit, celui est modifie le nom de la session.
	//
    // Contrat :
    //- l'instanciation doit s'effectuer avant toute sortie � l'�cran afin de 
	//que les entetes cookie soient correctement envoy�es.
	//- $sessName doit etre alphanumerique sinon le nom ne sera pas chang�
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

//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <Session>

?>