<?php

/*************************************************************************
                           |BDDConnectionInterface.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLConnection> (fichier BDDConnectionInterface.php) --------------
if (defined('BDDCONNECTIONINTERFACE_H'))
{
    return;
}
else
{

}
define('BDDCONNECTIONINTERFACE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <BDDConnectionInterface>
// Fournir des méthodes de base d'accès à une base
// Connexion + requetes
//
//------------------------------------------------------------------------ 

interface BDDConnectionInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
	public function TableExists ( $table );
    // Mode d'emploi :
    //recherche la table $table dans la base de données
    //
    // Renvoie :
    //- true si la table est trouvée
    //- un objet de type Errors en cas d'erreur
    //
    //
    
	public function TableDescription ( $table );
    // Mode d'emploi :
    //permet de connaitre la structure de la table en paramètre
    //
    // Renvoie :
    //- un objet de type BDDRecordSet dont chaque BDDRecord est un champ de la base
    //- un objet de type Errors en cas d'erreur
    //
    //
    
    public function SetServer ( $server );
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
    
    public function GetServer ( );
    // Mode d'emploi :
    // Récupère l'adresse du serveur
    //
    // Contrat :
    //
    
    public function SetUsername ( $username );
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
    
    public function GetUsername ( );
    // Mode d'emploi :
    // Récupère l'utilisateur
    //
    // Contrat :
    //
    
    public function SetPassword ( $password );
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
    
    public function GetPassword ( );
    // Mode d'emploi :
    // Récupère le mot de passe
    //
    // Contrat :
    //
    
    public function Open( );
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
    
    public function SetDatabase( $database );
    // Mode d'emploi :
    //change la base courante
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    //
    
    public function Query( $query );
    // Mode d'emploi :
    //Effectue une requete BDD
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- la ressource résultat
    //
    // Contrat :
    //
    
    public function Close( );
    // Mode d'emploi :
    //Ferme la connexion
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    // Contrat :
    //
    
    public function isConnected ( );
    // Mode d'emploi :
    //retourne si oui ou non la connexion est active
    //
    // Renvoie :
    //- true ou false selon l'état de la connexion
    //
    
//-------------------------------------------- Constructeurs - destructeur

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

//-------------------------------- Autres définitions dépendantes de <BDDConnectionInterface>

?>

