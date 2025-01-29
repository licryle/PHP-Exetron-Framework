<?php

/*************************************************************************
                           |BDDConnectionInterface.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <BDDConnectionInterface>
// Fournir des m�thodes de base d'acc�s � une base
// Connexion + requetes
//
//------------------------------------------------------------------------ 

interface BDDConnectionInterface
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
	public function TableExists ( $table );
    // Mode d'emploi :
    //recherche la table $table dans la base de donn�es
    //
    // Renvoie :
    //- true si la table est trouv�e
    //- un objet de type Errors en cas d'erreur
    //
    //
    
	public function TableDescription ( $table );
    // Mode d'emploi :
    //permet de connaitre la structure de la table en param�tre
    //
    // Renvoie :
    //- un objet de type BDDRecordSet dont chaque BDDRecord est un champ de la base
    //- un objet de type Errors en cas d'erreur
    //
    //
    
    public function SetServer ( $server );
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
    
    public function GetServer ( );
    // Mode d'emploi :
    // R�cup�re l'adresse du serveur
    //
    // Contrat :
    //
    
    public function SetUsername ( $username );
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
    
    public function GetUsername ( );
    // Mode d'emploi :
    // R�cup�re l'utilisateur
    //
    // Contrat :
    //
    
    public function SetPassword ( $password );
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
    
    public function GetPassword ( );
    // Mode d'emploi :
    // R�cup�re le mot de passe
    //
    // Contrat :
    //
    
    public function Open( );
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
    
    public function SetDatabase( $database );
    // Mode d'emploi :
    //change la base courante
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de r�ussite
    //
    //
    //
    
    public function Query( $query );
    // Mode d'emploi :
    //Effectue une requete BDD
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- la ressource r�sultat
    //
    // Contrat :
    //
    
    public function Close( );
    // Mode d'emploi :
    //Ferme la connexion
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de r�ussite
    //
    // Contrat :
    //
    
    public function isConnected ( );
    // Mode d'emploi :
    //retourne si oui ou non la connexion est active
    //
    // Renvoie :
    //- true ou false selon l'�tat de la connexion
    //
    
//-------------------------------------------- Constructeurs - destructeur

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

//-------------------------------- Autres d�finitions d�pendantes de <BDDConnectionInterface>

?>

