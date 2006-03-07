<?php

/*************************************************************************
                           |BDDConnection.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDConnection>
// Fournir des méthodes de base d'accès à une base MySQL
// Connexion + requetes
//
//------------------------------------------------------------------------ 

abstract class BDDConnection extends AbstractClass implements BDDConnectionInterface
{
//----------------------------------------------------------------- PUBLIC

	const CONNECTION_PERSISTENT = 'CONNECTION_PERSISTENT'; // for Open(), specifies a persistent connexion
	const CONNECTION_NOT_PERSISTENT = 'CONNECTION_NOT_PERSISTENT';

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    //public function tableExists ( $table );
    // Mode d'emploi :
    //recherche la table $table dans la base de données
    //
    // Renvoie :
    //- true si la table est trouvée
    //- un objet de type Errors en cas d'erreur
    //
    //
    
    public function SetServer ( $server )
    // Mode d'emploi :
    // Met à jour l'adresse du serveur
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
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
            // connexion non fermée
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'Vous ne pouvez modifier l\'adresse serveur lorsque la connexion n\'est pas fermée' ) );
                    
            return $errs;
        }
    } //----- Fin de SetServer
    
    public function GetServer ( )
    // Mode d'emploi :
    // Récupère l'adresse du serveur
    //
    // Contrat :
    //
    {
        return $this->server;
    } //----- Fin de GetServer
    
    public function SetUsername ( $username )
    // Mode d'emploi :
    // Met à jour l'utilisateur
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
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
            // connexion non fermée
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'Vous ne pouvez modifier l\'utilisateur lorsque la connexion n\'est pas fermée' ) );
            
            return $errs;
        }
    } //----- Fin de SetUsername
    
    public function GetUsername ( )
    // Mode d'emploi :
    // Récupère l'utilisateur
    //
    // Contrat :
    //
    {
        return $this->username;
    } //----- Fin de GetUsername
    
    public function SetPassword ( $password )
    // Mode d'emploi :
    // Met à jour le mot de passe
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
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
            // connexion non fermée
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NOT_CLOSED , 'Vous ne pouvez modifier le mot de passe lorsque la connexion n\'est pas fermée' ) );
            
            return $errs;
        }
    } //----- Fin de SetPassword
    
    public function GetPassword ( )
    // Mode d'emploi :
    // Récupère le mot de passe
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
    //- NULL en cas de réussite
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
    //- NULL en cas de réussite
    //
    //
    //
    
    //public function Query( $query );
    // Mode d'emploi :
    //Effectue nune requete MySQL
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- en cas de succès, un objet de type BDDRessource contenant 
	//l'ensemble des entrées sous forme de BDRessourceItem 
    //
    // Contrat :
    //
    
    public function GetQueriesCount ( )
    // Mode d'emploi :
    //permet de connaitre le nombre de requets effectuées
    //depuis la création de l'objet
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
    //- NULL en cas de réussite
    //
    // Contrat :
    //
    
    //abstract public function isConnected ( );
    // Mode d'emploi :
    //retourne si oui ou non la connexion est active
    //
    // Renvoie :
    //- true ou false selon l'état de la connexion
    //
    
//-------------------------------------------- Constructeurs - destructeur
    //abstract function __construct( $server = '' , $username = '' , $password = '' );
    // Mode d'emploi (constructeur) :
    //initialise les variables de la classe
    //interrompt l'execution si PHP ne supporte pas la BDD
    //
    // Contrat :
    //
    
//------------------------------------------------------ Méthodes Magiques

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
    protected $database; // base de données
    protected $nombreRequetes; // nombre de requetes executées
    
//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <BDDConnection>

?>