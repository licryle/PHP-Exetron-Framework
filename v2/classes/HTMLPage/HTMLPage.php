<?php

/*************************************************************************
                           |HTMLPage.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <HTMLPage> (fichier HTMLPage.php) --------------
if (defined('HTMLPAGE_H'))
{
    return;
}
else
{

}
define('HTMLPAGE_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <HTMLPage>
//
//
//------------------------------------------------------------------------ 

class HTMLPage extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC
    const HTMLPAGE_TAG_BODY = 'BODY';
    const HTMLPAGE_TAG_EXECTIME = 'EXECTIME';
    const HTMLPAGE_TAG_LOCATOR = 'LOCATOR';
    
    const DEBUG_ENABLED = true;
    const DEBUG_DISABLED = true;
    
    const CRLF = "\n\r";

//----------------------------------------------------- Méthodes publiques
    // public type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
    public function GetLocator ( )
    {
        return $this->menuLocator;
    }
    
    public function AddRawHTML ( $content )
    // Mode d'emploi :
    //ajoute le contenu de $content au contenu de la page
    //
    // Contrat : l'ensemble des éléments ajoutés doit être cohérent
    //afin de donner une page valide W3C
    {
        $this->tags['['.HTMLPage::HTMLPAGE_TAG_BODY.']'] .= $content . HTMLPage::CRLF;
    } //----- Fin de AddRawHTML
    
    public function SetMaquette ( $maquette )
    // Mode d'emploi :
    //assigne la maquette de la page avec $maquette
    //
    // Renvoie :
    //- NULL en cas de succès
    //- Un objet de type Errors en cas d'erreur
    //
    // Contrat :
    //la maquette doit contenir les [balise] assignés avec SetTag
    {
        if ( strstr( $maquette , '['.HTMLPage::HTMLPAGE_TAG_BODY.']'  ) === false )
        {
            $errs = new Errors();
            
            $errs->Add( new HTMLPageError ( HTMLPageError::PAGE_MAQUETTE_INCORRECT , 'Cette maquette ne contient pas de balise ['.HTMLPage::HTMLPAGE_TAG_BODY.']' ) );
        
            return $errs;
        }
        else
        {
            $this->maquette = $maquette;
            
            return NULL;
        }
    } //----- Fin de SetMaquette
    
    public function SetTag ( $tag , $value )
    // Mode d'emploi :
    //assigne à une [balise] une valeur particulière en vu d'un remplacement
    //$tag ne doit pas contenir les [], ceux ci sont automatiquement ajoutés
    //
    // Contrat :
    //la maquette doit contenir la [balise] pour que le tag soit effectif
    {
        $this->tags['['.$tag.']'] = $value;
    } //----- Fin de SetTag
    
    public function GetTag ( $tag )
    // Mode d'emploi :
    //récupère la valeur assignée à une [balise]
    //$tag ne doit pas contenir les [], ceux ci sont automatiquement ajoutés
    //
    // Renvoie :
    //- un objet de type Errors si une erreu est encontrée
    //- une String contenant le contenu du tag en cas de réussite
    //
    // Contrat :
    //la maquette doit contenir la [balise] pour que le tag soit effectif
    {
        if ( isset ( $this->tags['['.$tag.']'] ) )
        {
            return $this->tags['['.$tag.']'];
        }
        else
        {
            $errs = new Errors ( );
            
            $errs->Add( new HTMLPageError( HTMLPageError::PAGE_TAG_INEXISTANT , 'Le tag ['.$tag.'] n\'existe pas' ) );
            
            return $errs;
        }
    } //----- Fin de GetTag
    
    public function SetDebugMode ( $debugMode )
    // Mode d'emploi :
    //active ou non le mode débug.
    //en mode débug, tous les echos non effectués via cette classe
    //seront réinscrit en fin de page
    //
    //
    {
        $this->debugMode = ( $debugMode === true );
    } //----- Fin de SetDebugMode
    
    public function GetDebugMode ( )
    // Mode d'emploi :
    //permet de savoir si l'objet est en mode débug ou non
    //
    // Renvoie :
    //true ou false selon si l'objet est en mode débug ou non
    {
        return $this->debugMode;
    } //----- Fin de GetDebugMode
    
    public static function GetMicroTime()
    // Mode d'emploi :
    //retourne la date unix actuelle en microsecondes
    //
    // Renvoie :
    //la date unix actuelle en microsecondes
    //
    // Algorithme :
    //utilise microtime()
    {
        list($usec, $sec) = explode(' ',microtime());
        
        return ($usec+$sec);
    }  //----- Fin de GetMicroTime
    
    public static function ConvertIntoSGML($source)
    // Mode d'emploi :
    //convertit une string en un SGML valide
    //
    // Renvoie :
    //la chaine traitée
    //
    // Algorithme :
    //analyse char par char de la chaine. Si un caractère est de nombre ASCII > 127
    //conversion en son code SGML.
    {
        $newString = '';
        
        for($i = 0; $i < strlen($source); $i++) {
            $o = ord($source{$i});
            
            $newString .= (($o > 127)?'&#'.$o.';':$source{$i});
        }
        
        return $newString;
    } //----- Fin de ConvertIntoSGML
    
    public function FlushSite( $source )
    // Mode d'emploi :
    //traite la sortie de buffurisation
    //
    // Renvoie :
    //le chaine traitée au serveur HTTP
    //
    {
        $execTime = round ( $this->getMicroTime() - $this->startTime , 4 ); // temps d'execution
        $this->setTag( HTMLPage::HTMLPAGE_TAG_EXECTIME , $execTime );
        
        $this->setTag( HTMLPage::HTMLPAGE_TAG_LOCATOR , $this->menuLocator->__ToString() );
    
        if ( $this->debugMode )
        // si mode débug, on affiche a l'écran les infos débugs
        {
            $this->tags['['.HTMLPage::HTMLPAGE_TAG_BODY.']'] .= $source;
        }
        else
        {
        }
        
        $source = str_replace ( array_keys( $this->tags ) , array_values( $this->tags ) , $this->maquette );
        
        return $this->ConvertIntoSGML ( $source );
    } //----- Fin de FLushSite
    
//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $debugMode = false )
    // Mode d'emploi (constructeur) :
    //initialisation des différentes variables
    //début de buffurisation
    //
    // Contrat :
    //
    {
        $this->debugMode = $debugMode;
        $this->startTime = $this->getMicroTime( );
        
        $this->menuLocator = new Locator( );
        
        $this->maquette = '['.HTMLPage::HTMLPAGE_TAG_BODY.']';
        
        $this->tags = array();
        $this->setTag ( HTMLPage::HTMLPAGE_TAG_BODY , '' ); // initialisation
        
		ob_start( array ( & $this , 'FlushSite' ) );
    } //---- Fin du constructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

    protected $debugMode;
    protected $startTime;
    
    protected $maquette;   
    
    protected $menuLocator;
    protected $tags; // tags de remplacement

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <HTMLPage>

?>

