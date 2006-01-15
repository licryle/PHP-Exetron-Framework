<?php

/*************************************************************************
                           |Error.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Error> (fichier Error.php) --------------
if (defined('ERROR_H'))
{
    return;
}
else
{

}
define('ERROR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Error>
//Gestion d'une erreur avec un code et un message d'erreur associé
//
//------------------------------------------------------------------------ 

class Error extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    public function GetMessage( )
    // Mode d'emploi :
    //Retourne le message associé à l'erreur
    //
    // Algorithme : 
    //trivial
    {
        return $this->erreurString;
    }
    
    public function GetCode( )
    // Mode d'emploi :
    //Retourne le code associé à l'erreur
    //
    // Algorithme : 
    //trivial
    {
        return $this->erreurCode;
    }

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $code, $str )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
        $this->erreurCode = $code;
        $this->erreurString = $str;
    } //---- Fin du constructeur
    
//------------------------------------------------------ Méthodes Magiques
    public function __ToString ( )
    // Mode d'emploi :
    // permet l'affichage de l'erreur contenue.
    // Contrat :
    //
    {
        return $this->erreurString;
    } // Fin de __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
    protected $erreurCode;
    protected $erreurString;
}

//-------------------------------- Autres définitions dépendantes de <Error>

?>

