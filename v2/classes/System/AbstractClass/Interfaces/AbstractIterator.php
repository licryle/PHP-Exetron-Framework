<?php

/*************************************************************************
                           |AbstractIterator.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <AbstractIterator>
// Ajoute les m�thodes n�cessaires � l'it�ration
//
//------------------------------------------------------------------------ 

interface AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    //public function Add( AbstractClass $item );
    // Mode d'emploi :
    //Ajoute un ancrage locator � la liste

    public function DelAll( );
    // Mode d'emploi :
    //Remet � zero la liste des items
    //

    public function GetCount( );
    // Mode d'emploi :
    //retourne le nombre d'items contenus dans la liste
    //
    // Renvoie :
    //le nombre d'items contenus
    
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

//-------------------------------- Autres d�finitions d�pendantes de <AbstractIterator>

?>