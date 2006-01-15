<?php

/*************************************************************************
                           |Locator.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Locator> (fichier Locator.php) --------------
if (defined('LOCATOR_H'))
{
    return;
}
else
{

}
define('LOCATOR_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Locator>
//Itérateur qui gère une liste d'erreurs de type Error ou descendant
//
//------------------------------------------------------------------------ 

class Locator extends AbstractClass implements Iterator, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //  

    public function Add( AbstractClass $item )
    // Mode d'emploi :
    //Ajoute un ancrage locator à la liste
    //
    {
        $this->items[ $this->GetCount() ] = $item;
    } //---- Fin de AddError

    public function DelAll( )
    // Mode d'emploi :
    //Remet à zero la liste des items
    //
    {
        unset($this->items);
        
        $this->items = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre d'items contenus dans la liste
    //
    // Renvoie :
    //le nombre d'items contenus
    {
        return count( $this->items );
    } //---- Fin de GetCount
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->items );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->items );
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
        return next( $this->items );
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
    public function __construct( )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
    	$this->items = array( );
    } //---- Fin du constructeur

//------------------------------------------------------ Méthodes Magiques

    public function __ToString ()
    // Mode d'emploi :
    //Réalise une conversion des erreurs en String
    //
    // Algorithme : 
    //foreach( $this )
    {
        $count = $this->getCount( );
        
        if ( $count == 0 ) 
        {
            unset( $count );
        
            return '';
        }
        else
        {
            $str = '<a href="'.$this->items[0]->getURL().'">'.$this->items[0]->getLabel().'</a> ';
            
            for ( $i = 1; $i < $count; $i++ )
            {
                $str .= ' &gt; <a href="'.$this->items[$i]->getURL().'">'.$this->items[$i]->getLabel().'</a> ';
            }
            
            unset( $count );
            
            return $str;
        }        
    }

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
    protected $items;
}

//-------------------------------- Autres définitions dépendantes de <Locator>

?>

