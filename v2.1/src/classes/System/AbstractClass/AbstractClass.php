<?php

/*************************************************************************
                           |AbstractClass.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <AbstractClass> (fichier AbstractClass.php) --------------
if (defined('ABSTRACTCLASS_H'))
{
    return;
}
else
{

}
define('ABSTRACTCLASS_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <AbstractClass>
//
//
//------------------------------------------------------------------------ 

abstract class AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//-------------------------------------------- Constructeurs - destructeur
    abstract public function __construct();
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //

    public function __destruct ( )
    // Mode d'emploi :
    //Lib�re l'espace m�moire des variables de la classe
    // Contrat :
    //
    {
        /*$vars = get_object_vars($this);
        
        foreach($vars as $key => $var)
        {
          //  unset($this->{$key});
        }
        
        unset($vars);   */     
    } //---- Fin du destructeur

//------------------------------------------------------ M�thodes Magiques

    public function __ToString ( )
    // Mode d'emploi :
    //Si non red�finie, imprime un etat de l'objet
    //
    // Contrat :
    //
    {
        return (string)var_export($this);
    } // ENd of __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <AbstractClass>

?>