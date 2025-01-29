<?php

/*************************************************************************
                           |Locator.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <Locator>
//It�rateur qui g�re une liste d'erreurs de type Error ou descendant
//
//------------------------------------------------------------------------ 

class Locator extends AbstractClass implements Iterator, AbstractIterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //  

    public function Add( AbstractClass $item )
    // Mode d'emploi :
    //Ajoute un ancrage locator � la liste
    //
    {
        $this->items[ $this->GetCount() ] = $item;
    } //---- Fin de AddError

    public function DelAll( )
    // Mode d'emploi :
    //Remet � zero la liste des items
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
    
//-----------------------------------------------Impl�mentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au d�but de la liste
    //
    {
        reset( $this->items );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'�l�ment actuel de la liste
    //
    {
        return current( $this->items );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le code de l'erreur point�e par la liste
    //
    {
        return $this->current( )->getCode( );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel �l�ment point�
    //
    {
        return next( $this->items );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'�l�ment est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid
//---------------------------------------------Fin impl�mentation Iterator
    
//-------------------------------------------- Constructeurs - destructeur
    public function __construct( )
    // Mode d'emploi (constructeur) :
    //
    // Contrat :
    //
    {
    	$this->items = array( );
    } //---- Fin du constructeur

//------------------------------------------------------ M�thodes Magiques

    public function __ToString ()
    // Mode d'emploi :
    //R�alise une conversion des erreurs en String
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

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s
    protected $items;
}

//-------------------------------- Autres d�finitions d�pendantes de <Locator>

?>

