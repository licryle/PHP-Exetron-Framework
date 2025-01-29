<?php

/*************************************************************************
                           |HTMLPage.php|  -  description
                             -------------------
    d�but                : |DATE|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <HTMLPage>
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

//----------------------------------------------------- M�thodes publiques
    // public type M�thode ( liste des param�tres );
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
    // Contrat : l'ensemble des �l�ments ajout�s doit �tre coh�rent
    //afin de donner une page valide W3C
    {
        $this->tags['['.HTMLPage::HTMLPAGE_TAG_BODY.']'] .= $content . HTMLPage::CRLF;
    } //----- Fin de AddRawHTML
    
    public function SetMaquette ( $maquette )
    // Mode d'emploi :
    //assigne la maquette de la page avec $maquette
    //
    // Renvoie :
    //- NULL en cas de succ�s
    //- Un objet de type Errors en cas d'erreur
    //
    // Contrat :
    //la maquette doit contenir les [balise] assign�s avec SetTag
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
    //assigne � une [balise] une valeur particuli�re en vu d'un remplacement
    //$tag ne doit pas contenir les [], ceux ci sont automatiquement ajout�s
    //
    // Contrat :
    //la maquette doit contenir la [balise] pour que le tag soit effectif
    {
        $this->tags['['.$tag.']'] = $value;
    } //----- Fin de SetTag
    
    public function GetTag ( $tag )
    // Mode d'emploi :
    //r�cup�re la valeur assign�e � une [balise]
    //$tag ne doit pas contenir les [], ceux ci sont automatiquement ajout�s
    //
    // Renvoie :
    //- un objet de type Errors si une erreu est encontr�e
    //- une String contenant le contenu du tag en cas de r�ussite
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
    //active ou non le mode d�bug.
    //en mode d�bug, tous les echos non effectu�s via cette classe
    //seront r�inscrit en fin de page
    //
    //
    {
        $this->debugMode = ( $debugMode === true );
    } //----- Fin de SetDebugMode
    
    public function GetDebugMode ( )
    // Mode d'emploi :
    //permet de savoir si l'objet est en mode d�bug ou non
    //
    // Renvoie :
    //true ou false selon si l'objet est en mode d�bug ou non
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
    //la chaine trait�e
    //
    // Algorithme :
    //analyse char par char de la chaine. Si un caract�re est de nombre ASCII > 127
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
    //le chaine trait�e au serveur HTTP
    //
    {
        $execTime = round ( $this->getMicroTime() - $this->startTime , 4 ); // temps d'execution
        $this->setTag( HTMLPage::HTMLPAGE_TAG_EXECTIME , $execTime );
        
        $this->setTag( HTMLPage::HTMLPAGE_TAG_LOCATOR , $this->menuLocator->__ToString() );
    
        if ( $this->debugMode )
        // si mode d�bug, on affiche a l'�cran les infos d�bugs
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
    //initialisation des diff�rentes variables
    //d�but de buffurisation
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
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

    protected $debugMode;
    protected $startTime;
    
    protected $maquette;   
    
    protected $menuLocator;
    protected $tags; // tags de remplacement

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <HTMLPage>

?>

