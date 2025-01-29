<?php

/*************************************************************************
                           |Error.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <Error>
//Gestion d'une erreur avec un code et un message d'erreur associ�
//
//------------------------------------------------------------------------ 

class Error extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    
    public function GetMessage( )
    // Mode d'emploi :
    //Retourne le message associ� � l'erreur
    //
    // Algorithme : 
    //trivial
    {
        return $this->erreurString;
    }
    
    public function GetCode( )
    // Mode d'emploi :
    //Retourne le code associ� � l'erreur
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
    
//------------------------------------------------------ M�thodes Magiques
    public function __ToString ( )
    // Mode d'emploi :
    // permet l'affichage de l'erreur contenue.
    // Contrat :
    //
    {
        return $this->erreurString;
    } // Fin de __ToString

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s
    protected $erreurCode;
    protected $erreurString;
}

//-------------------------------- Autres d�finitions d�pendantes de <Error>

?>

