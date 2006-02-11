<?php

/*************************************************************************
                           |BDDConnection.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <BDDConnection> (fichier BDDConnection.php) --------------
if (defined('BDDCONNECTION_H'))
{
    return;
}
else
{

}
define('BDDCONNECTION_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <BDDConnection>
// Fournir des m�thodes de base d'acc�s � une base MySQL
// Connexion + requetes
//
//------------------------------------------------------------------------ 

abstract class BDDConnection extends AbstractClass implements BDDConnectionInterface
{
//----------------------------------------------------------------- PUBLIC

	const CONNECTION_PERSISTENT = 'CONNECTION_PERSISTENT'; // for Open(), specifies a persistent connexion
	const CONNECTION_NOT_PERSISTENT = 'CONNECTION_NOT_PERSISTENT';

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    //public function tableExists ( $table );
    // Mode d'emploi :
    //recherche la table $table dans la base de donn�es
    //
    // Renvoie :
    //- true si la table est trouv�e
    //- un objet de type Errors en cas d'erreur
    //
    //
    
    public function SetServer ( $server )
    // Mode d'emploi :
    // Met � jour l'adresse du serveur
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de r�ussite
    //
    //
    // Contrat :
    //
    {
        if ( !$this->isConnected() )
        {
            $this->server = $server;
            
            return NULL;
        }
        else
        {
            // connexion non ferm�e
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'Vous ne pouvez modifier l\'adresse serveur lorsque la connexion n\'est pas ferm�e' ) );
                    
            return $errs;
        }
    } //----- Fin de SetServer
    
    public function GetServer ( )
    // Mode d'emploi :
    // R�cup�re l'adresse du serveur
    //
    // Contrat :
    //
    {
        return $this->server;
    } //----- Fin de GetServer
    
    public function SetUsername ( $username )
    // Mode d'emploi :
    // Met � jour l'utilisateur
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de r�ussite
    //
    //
    // Contrat :
    //
    {
        if ( !$this->isConnected() )
        {
            $this->username = $username;
            
            return NULL;
        }
        else
        {
            // connexion non ferm�e
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'Vous ne pouvez modifier l\'utilisateur lorsque la connexion n\'est pas ferm�e' ) );
            
            return $errs;
        }
    } //----- Fin de SetUsername
    
    public function GetUsername ( )
    // Mode d'emploi :
    // R�cup�re l'utilisateur
    //
    // Contrat :
    //
    {
        return $this->username;
    } //----- Fin de GetUsername
    
    public function SetPassword ( $password )
    // Mode d'emploi :
    // Met � jour le mot de passe
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de r�ussite
    //
    //
    // Contrat :
    //
    {
        if ( !$this->isConnected() )
        {
            $this->password = $password;
            
            return NULL;
        }
        else
        {
            // connexion non ferm�e
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'Vous ne pouvez modifier le mot de passe lorsque la connexion n\'est pas ferm�e' ) );
            
            return $errs;
        }
    } //----- Fin de SetPassword
    
    public function GetPassword ( )
    // Mode d'emploi :
    // R�cup�re le mot de passe
    //
    // Contrat :
    //
    {
        return $this->password;
    } //----- Fin de GetPassword
    
    //public function Open( );
    // Mode d'emploi :
    //Tente d'ouvrir la connexion
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de r�ussite
    //
    //
    // Contrat :
    //
    
    //public function SetDatabase( $database );
    // Mode d'emploi :
    //change la base courante
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de r�ussite
    //
    //
    //
    
    //public function Query( $query );
    // Mode d'emploi :
    //Effectue nune requete MySQL
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- en cas de succ�s, un objet de type BDDRessource contenant 
	//l'ensemble des entr�es sous forme de BDRessourceItem 
    //
    // Contrat :
    //
    
    public function GetQueriesCount ( )
    // Mode d'emploi :
    //permet de connaitre le nombre de requets effectu�es
    //depuis la cr�ation de l'objet
    //
    // Renvoie :
    //le nombre de requetes
    //
	{
		return $this->nombreRequetes;
	}
    
    //abstract public function Close( );
    // Mode d'emploi :
    //Ferme la connexion
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de r�ussite
    //
    // Contrat :
    //
    
    //abstract public function isConnected ( );
    // Mode d'emploi :
    //retourne si oui ou non la connexion est active
    //
    // Renvoie :
    //- true ou false selon l'�tat de la connexion
    //
    
//-------------------------------------------- Constructeurs - destructeur
    //abstract function __construct( $server = '' , $username = '' , $password = '' );
    // Mode d'emploi (constructeur) :
    //initialise les variables de la classe
    //interrompt l'execution si PHP ne supporte pas la BDD
    //
    // Contrat :
    //
    
//------------------------------------------------------ M�thodes Magiques

    public function __ToString ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    }

//------------------------------------------------------------------ PRIVE 
    protected $server;
    protected $username;
    protected $password;
    
    protected $connection; // contiendra  la connexion
    protected $database; // base de donn�es
    protected $nombreRequetes; // nombre de requetes execut�es
    
//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <BDDConnection>

?>