<?php

/*************************************************************************
                           |MySQLConnection.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLConnection> (fichier MySQLConnection.php) --------------
if (defined('MYSQLCONNECTION_H'))
{
    return;
}
else
{

}
define('MYSQLCONNECTION_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <MySQLConnection>
// Fournir des méthodes de base d'accès à une base MySQL
// Connexion + requetes
//
//------------------------------------------------------------------------ 

class MySQLConnection extends BDDConnection
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    public function TableExists ( $table )
    // Mode d'emploi :
    //recherche la table $table dans la base de données
    //
    // Renvoie :
    //- true si la table est trouvée
    //- un objet de type Errors en cas d'erreur
    //
    //
	// Algorithme :
	//* vérification du choix de la base
	//* SHOW TABLE
	//* recherche dans le résultat
    {
        if ( $this->database == '' )
        // aucune base sélectionnée
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'Aucune base de données sélectionnée' ) );
            
            return $errs;            
        }
        else
        {
        	if ( ( $tableList = & $this->Query( 'SHOW TABLES FROM '.$this->database ) instanceof Errors ) )
            // la requete à échoué
            {
                return $tableList;
            }
            else
            // recherche de la table
            {
				foreach ( $tableList as $currentTable )
				{
					if ( $table == $currentTable->GetProperty( 'Tables_in_'.$this->database ) )
                    {
                        unset ( $tableList );
                        return True;
                    }
                }
				
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_TABLE_INEXISTANT , 'Cette table n\'existe pas' ) );
                
                return $errs;                 
            }
        }
    } //----- Fin de TableExists
    
	public function TableDescription ( $table )
    // Mode d'emploi :
    //permet de connaitre la structure de la table en paramètre
    //
    // Renvoie :
    //- un objet de type BDDRecordSet dont chaque BDDRecord est un champ de la base
    //- un objet de type Errors en cas d'erreur
    //
    //
    {
        if ( $this->database == '' )
        // aucune base sélectionnée
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'Aucune base de données sélectionnée' ) );
            
            return $errs;            
        }
        else
        {
			$ressource = & $this->Query( 'DESC `'.$table.'`' );
			
        	return $ressource;
        }
    } //----- Fin de TableDescription
    
    //public function SetServer ( $server )
    // Mode d'emploi :
    // Met à jour l'adresse du serveur
    
    // Renvoie :
    // - un objet de type Errors en cas d'erreur(s)
    // - NULL en cas de réussite
    
    
    // Contrat :

    
    //public function GetServer ( )
    // Mode d'emploi :
    // Récupère l'adresse du serveur
    
    // Contrat :
    
    //public function SetUsername ( $username )
    // Mode d'emploi :
    // Met à jour l'utilisateur
    
    // Renvoie :
    // - un objet de type Errors en cas d'erreur(s)
    // - NULL en cas de réussite
    
    
    // Contrat :
    
    //public function GetUsername ( )
    // Mode d'emploi :
    // Récupère l'utilisateur
    
    // Contrat :
    
    //public function SetPassword ( $password )
    // Mode d'emploi :
    // Met à jour le mot de passe
    
    // Renvoie :
    // - un objet de type Errors en cas d'erreur(s)
    // - NULL en cas de réussite
    
    
    // Contrat :
    
    //public function GetPassword ( )
    // Mode d'emploi :
    // Récupère le mot de passe
    
    // Contrat :
    
    public function Open( $isPersistent )
    // Mode d'emploi :
    //Tente d'ouvrir la connexion
    //si $isPersistent est égal à BDDConnection::CONNECTION_PERSISTENT, la connexion sera ouverte en mode persistant
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
			if ( $isPersistent == BDDConnection::CONNECTION_PERSISTENT )
			{
				$connectFunction = 'mysql_pconnect';
			}
			else
			{
				$connectFunction = 'mysql_connect';
			}
		
            if ( ($this->connection = @$connectFunction( $this->server , $this->username , $this->password )) )
            {
                return NULL;
            }
            else
            {
                // connexion échouée
                $this->connection = NULL;
                
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_CANNOT_OPEN , 'Impossible d\'ouvrir la connexion, vérifiez vos accès' ) );
                
                return $errs;
            }
        }
        else
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_ALREADY_OPENED , 'Une connexion est déjà en cours' ) );
            
            return $errs;
        }
    } //----- Fin de Open
    
    public function SetDatabase( $database ) 
    // Mode d'emploi :
    //change la base courante
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    //
    //
    {
        if ( !$this->isConnected() )
        {
            // connexion inexistante
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_CLOSED , 'Connexion fermée' ) );
            
            return $errs;
        }
        else
        {
            if ( !@mysql_select_db ( $database , $this->connection ) )
            // change échoué
            {
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_CANNOT_CHANGE_DB , 'Impossible de changer de base de données : '.mysql_error( $this->connection ) ) );
                
                return $errs;
            }
            else
            {
                $this->database = $database;
            
                return NULL;
            }
        }
    } //----- Fin de SetDabase
    
    public function Query( $query )
    // Mode d'emploi :
    //Effectue nune requete MySQL
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- en cas de succès, un objet de type BDDRessource contenant 
	//l'ensemble des entrées sous forme de BDRessourceItem. Afin d'éviter
	//un dépassement de capacité, il est nécessaire de récupérer le résultat
	//via référence.
    //
    // Contrat :
    //
    {
        if ( $this->database == '' )
        // aucune base sélectionnée
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'Aucune base de données sélectionnée' ) );
            
            return $errs;            
        }
        else
        {
            if ( ( $result = @mysql_query( $query , $this->connection ) ) === false ) 
            // requete échouée
            {
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_QUERY_FAILED , 'La requete a échoué ('.$query.') : '.mysql_error( $this->connection ) ) );
                
                return $errs;
            }
            else
            {
                $this->nombreRequetes++;
            
				// mise en BDDRessource
				
				$nouvellesRessources = new BDDRecordSet ( );
				
				while ( ($row = @mysql_fetch_assoc ( $result ) ) !== false )
				{
					$nouvellesRessources->Add ( new BDDRecord ( $row ) ) ;
				}
				
				@mysql_free_result ( $result ); // libération mémoire si nécessaire

                return $nouvellesRessources ;
            }
        }
    } //----- Fin de Query
    
    //public function GetQueriesCount ( )
    // Mode d'emploi :
    //permet de connaitre le nombre de requets effectuées
    //depuis la création de l'objet
    //
    // Renvoie :
    //le nombre de requetes
    //
    
    public function Close( )
    // Mode d'emploi :
    //Ferme la connexion
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de réussite
    //
    // Contrat :
    //
    {
        if ( !$this->isConnected() || !@mysql_close( $this->connection ) )
        {
            // connexion inexistante
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_CLOSED , 'Connexion déjà fermée' ) );
            
            return $errs;
        }
        else
        {
            $this->database = '';
        
            return NULL;
        }
    } //----- Fin de Close
    
    public function isConnected ( )
    // Mode d'emploi :
    //retourne si oui ou non la connexion est active
    //
    // Renvoie :
    //- true ou false selon l'état de la connexion
    //
    {
        return ( $this->connection !== NULL &@mysql_stat ( $this->connection ) !== NULL );
    } //----- Fin de isConnected
    
//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $server = '' , $username = '' , $password = '' )
    // Mode d'emploi (constructeur) :
    //initialise les variables de la classe
    //interrompt l'execution si PHP ne supporte pas MySQL
    //
    // Contrat :
    //
    {
            if ( ! function_exists( 'mysql_connect' ) )
            {
                die('PHP ne supporte pas MySQL');
            }
            
            $this->connection = NULL;
            
            $this->server = $server;
            $this->username = $username;
            $this->password = $password;
            
            $this->database = '';
            
            $this->nombreRequetes = 0;
    } //----- Fin du contructeur
    
//------------------------------------------------------ Méthodes Magiques

    public function __ToString ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    }

//------------------------------------------------------------------ PRIVE 

    
//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <MySQLConnection>

?>