<?php

/*************************************************************************
                           |LocatorItem.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <LocatorItem> (fichier LocatorItem.php) --------------
if (defined('LOCATORITEM_H'))
{
    return;
}
else
{

}
define('LOCATORITEM_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <LocatorItem>
//Gestion d'une partie de localisation à l'aide d'un label et d'une url
//associée
//
//------------------------------------------------------------------------ 

class LocatorItem extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    public function GetLabel( )
    // Mode d'emploi :
    //Retourne le label de l'item
    //
    // Algorithme : 
    //trivial
    {
        return $this->label;
    }
    
    public function GetURL( )
    // Mode d'emploi :
    //Retourne l'URL associée au label
    //
    // Algorithme : 
    //trivial
    {
        return $this->url;
    }

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $label , $url )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
        $this->label = $label;
        $this->url = $url;
    } //---- Fin du constructeur
    
//------------------------------------------------------ Méthodes Magiques
    public function __ToString ( )
    // Mode d'emploi :
    // permet l'affichage d l'item locator
    // Contrat :
    //
    {
        return '<a href="'.$this->url.'">'.$this->label.'</a>';
    } // Fin de __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
    protected $label;
    protected $url;
}

//-------------------------------- Autres définitions dépendantes de <LocatorItem>

?>

