<?php

/*************************************************************************
                           |MySQLConnection.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <MySQLConnection>
// Fournir des m�thodes de base d'acc�s � une base MySQL
// Connexion + requetes
//
//------------------------------------------------------------------------ 

class MySQLConnection extends BDDConnection
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    public function TableExists ( $table )
    // Mode d'emploi :
    //recherche la table $table dans la base de donn�es
    //
    // Renvoie :
    //- true si la table est trouv�e
    //- un objet de type Errors en cas d'erreur
    //
    //
	// Algorithme :
	//* v�rification du choix de la base
	//* SHOW TABLE
	//* recherche dans le r�sultat
    {
        if ( $this->database == '' )
        // aucune base s�lectionn�e
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'Aucune base de donn�es s�lectionn�e' ) );
            
            return $errs;            
        }
        else
        {
        	if ( ( $tableList = & $this->Query( 'SHOW TABLES FROM '.$this->database ) instanceof Errors ) )
            // la requete � �chou�
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
    //permet de connaitre la structure de la table en param�tre
    //
    // Renvoie :
    //- un objet de type BDDRecordSet dont chaque BDDRecord est un champ de la base
    //- un objet de type Errors en cas d'erreur
    //
    //
    {
        if ( $this->database == '' )
        // aucune base s�lectionn�e
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'Aucune base de donn�es s�lectionn�e' ) );
            
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
    // Met � jour l'adresse du serveur
    
    // Renvoie :
    // - un objet de type Errors en cas d'erreur(s)
    // - NULL en cas de r�ussite
    
    
    // Contrat :

    
    //public function GetServer ( )
    // Mode d'emploi :
    // R�cup�re l'adresse du serveur
    
    // Contrat :
    
    //public function SetUsername ( $username )
    // Mode d'emploi :
    // Met � jour l'utilisateur
    
    // Renvoie :
    // - un objet de type Errors en cas d'erreur(s)
    // - NULL en cas de r�ussite
    
    
    // Contrat :
    
    //public function GetUsername ( )
    // Mode d'emploi :
    // R�cup�re l'utilisateur
    
    // Contrat :
    
    //public function SetPassword ( $password )
    // Mode d'emploi :
    // Met � jour le mot de passe
    
    // Renvoie :
    // - un objet de type Errors en cas d'erreur(s)
    // - NULL en cas de r�ussite
    
    
    // Contrat :
    
    //public function GetPassword ( )
    // Mode d'emploi :
    // R�cup�re le mot de passe
    
    // Contrat :
    
    public function Open( $isPersistent )
    // Mode d'emploi :
    //Tente d'ouvrir la connexion
    //si $isPersistent est �gal � BDDConnection::CONNECTION_PERSISTENT, la connexion sera ouverte en mode persistant
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
                // connexion �chou�e
                $this->connection = NULL;
                
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_CANNOT_OPEN , 'Impossible d\'ouvrir la connexion, v�rifiez vos acc�s' ) );
                
                return $errs;
            }
        }
        else
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_ALREADY_OPENED , 'Une connexion est d�j� en cours' ) );
            
            return $errs;
        }
    } //----- Fin de Open
    
    public function SetDatabase( $database ) 
    // Mode d'emploi :
    //change la base courante
    //
    // Renvoie :
    //- un objet de type Errors en cas d'erreur(s)
    //- NULL en cas de r�ussite
    //
    //
    //
    {
        if ( !$this->isConnected() )
        {
            // connexion inexistante
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_CLOSED , 'Connexion ferm�e' ) );
            
            return $errs;
        }
        else
        {
            if ( !@mysql_select_db ( $database , $this->connection ) )
            // change �chou�
            {
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_CANNOT_CHANGE_DB , 'Impossible de changer de base de donn�es : '.mysql_error( $this->connection ) ) );
                
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
    //- en cas de succ�s, un objet de type BDDRessource contenant 
	//l'ensemble des entr�es sous forme de BDRessourceItem. Afin d'�viter
	//un d�passement de capacit�, il est n�cessaire de r�cup�rer le r�sultat
	//via r�f�rence.
    //
    // Contrat :
    //
    {
        if ( $this->database == '' )
        // aucune base s�lectionn�e
        {
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_NO_DB_SELECTED , 'Aucune base de donn�es s�lectionn�e' ) );
            
            return $errs;            
        }
        else
        {
            if ( ( $result = @mysql_query( $query , $this->connection ) ) === false ) 
            // requete �chou�e
            {
                $errs = new Errors();
    
                $errs->Add ( new BDDError ( BDDError::CONNECTION_QUERY_FAILED , 'La requete a �chou� ('.$query.') : '.mysql_error( $this->connection ) ) );
                
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
				
				@mysql_free_result ( $result ); // lib�ration m�moire si n�cessaire

                return $nouvellesRessources ;
            }
        }
    } //----- Fin de Query
    
    //public function GetQueriesCount ( )
    // Mode d'emploi :
    //permet de connaitre le nombre de requets effectu�es
    //depuis la cr�ation de l'objet
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
    //- NULL en cas de r�ussite
    //
    // Contrat :
    //
    {
        if ( !$this->isConnected() || !@mysql_close( $this->connection ) )
        {
            // connexion inexistante
            $errs = new Errors();

            $errs->Add ( new BDDError ( BDDError::CONNECTION_CLOSED , 'Connexion d�j� ferm�e' ) );
            
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
    //- true ou false selon l'�tat de la connexion
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
    
//------------------------------------------------------ M�thodes Magiques

    public function __ToString ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    }

//------------------------------------------------------------------ PRIVE 

    
//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <MySQLConnection>

?>