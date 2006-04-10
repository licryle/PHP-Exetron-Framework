<?php

/*************************************************************************
                           |Errors.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Errors> (fichier Errors.php) --------------
if (defined('ERRORS_H'))
{
    return;
}
else
{

}
define('ERRORS_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Errors>
//Itérateur qui gère une liste d'erreurs de type Error ou descendant
//
//------------------------------------------------------------------------ 

class Errors extends AbstractClass implements Iterator, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //  

    public function Add( Error $newErr )
    // Mode d'emploi :
    //Ajoute une erreur à la liste
    //
    {
        $this->errors[ $newErr->getCode( ) ] = $newErr;
    } //---- Fin de Add

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des erreurs
    //
    {
        unset($this->errors);
        
        $this->errors = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre d'erreurs contenues dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $this->errors );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->errors );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->errors );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le code de l'erreur pointée par la liste
    //
    {
        return $this->current( )->getCode( );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->errors );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid
//---------------------------------------------Fin implémentation Iterator
    
//-------------------------------------------- Constructeurs - destructeur
    function __construct( )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
    	$this->errors = array( );
    } //---- Fin du constructeur

//------------------------------------------------------ Méthodes Magiques

    public function __ToString ()
    // Mode d'emploi :
    //Réalise une conversion des erreurs en String
    //
    // Algorithme : 
    //foreach( $this )
    {
        $str = '';
        
        foreach( $this as $code => $error )
        {
            $str .= $code . ' ' . $error->getMessage() . chr (10);
        }
        
        return $str;
    }

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
    protected $errors;
}

//-------------------------------- Autres définitions dépendantes de <Errors>

?>