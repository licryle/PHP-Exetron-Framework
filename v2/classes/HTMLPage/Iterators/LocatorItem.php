<?php

/*************************************************************************
                           |LocatorItem.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <LocatorItem>
//Gestion d'une partie de localisation � l'aide d'un label et d'une url
//associ�e
//
//------------------------------------------------------------------------ 

class LocatorItem extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
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
    //Retourne l'URL associ�e au label
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
    
//------------------------------------------------------ M�thodes Magiques
    public function __ToString ( )
    // Mode d'emploi :
    // permet l'affichage d l'item locator
    // Contrat :
    //
    {
        return '<a href="'.$this->url.'">'.$this->label.'</a>';
    } // Fin de __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s
    protected $label;
    protected $url;
}

//-------------------------------- Autres d�finitions d�pendantes de <LocatorItem>

?>

