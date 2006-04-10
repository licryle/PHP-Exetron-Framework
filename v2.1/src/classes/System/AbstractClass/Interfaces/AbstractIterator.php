<?php

/*************************************************************************
                           |AbstractIterator.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <AbstractIterator> (fichier AbstractIterator.php) --------------
if (defined('ABSTRACTITERATOR_H'))
{
    return;
}
else
{

}
define('ABSTRACTITERATOR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <AbstractIterator>
// Ajoute les méthodes nécessaires à l'itération
//
//------------------------------------------------------------------------ 

interface AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    //public function Add( AbstractClass $item );
    // Mode d'emploi :
    //Ajoute un ancrage locator à la liste

    public function DelAll( );
    // Mode d'emploi :
    //Remet à zero la liste des items
    //

    public function GetCount( );
    // Mode d'emploi :
    //retourne le nombre d'items contenus dans la liste
    //
    // Renvoie :
    //le nombre d'items contenus
    
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

//-------------------------------- Autres définitions dépendantes de <AbstractIterator>

?>