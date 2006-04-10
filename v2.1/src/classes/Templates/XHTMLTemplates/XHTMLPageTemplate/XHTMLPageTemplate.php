<?php

/*************************************************************************
                           |XHTMLPageTemplate.php|  -  description
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//-------------- Interface of <XHTMLPageTemplate> class (file XHTMLPageTemplate.php) -----------------
if (defined('XHTMLPAGETEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLPAGETEMPLATE_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------  
// Role of <XHTMLPageTemplate> class
//
//
//------------------------------------------------------------------------ 

class XHTMLPageTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	
	const TAG_BODY = 'BODY';
	const TAG_HEADERS = 'HEAD';

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
    
    public static function ConvertIntoSGML($source)
    // Mode d'emploi :
    //convert the string $source into a valid SGML string
    //
    // Renvoie :
    //the cleaned string
    //
    // Algorithme :
	//parse char by char of the string. If an ASCII char is > 127
	//it will ve converted as &#asciicode;
    {
        $newString = '';
        
        for($i = 0; $i < strlen($source); $i++) {
            $o = ord($source{$i});
            
            $newString .= (($o > 127)?'&#'.$o.';':$source{$i});
        }
        
        return $newString;
    } //----- End of ConvertIntoSGML


	
    /*public function GetLocator ( )
    // Mode d'emploi :
    //get the Locator menu
	//
	// Returns :
	//- the locator menu of the XHTML page
	//
    // Contrat :
    //
    {
        return $this->menuLocator;
    } //----- End of GetLocator*/
	
    public function GetBody ( )
    // Mode d'emploi :
    //get the Body of the XHTML Page
	//
	// Returns :
	//- the Body as an XHTMLBodyTemplate
	//
    // Contrat :
    //
    {
        return $this->GetTag ( self::TAG_BODY );
    } //----- End of GetBody
	
    public function GetHeaders ( )
    // Mode d'emploi :
    //get the Headers of the XHTML Page
	//
	// Returns :
	//- the Headers as an XHTMLHeadersTemplate
	//
    // Contrat :
    //
    {
        return $this->GetTag ( self::TAG_HEADERS );
    } //----- End of GetHeaders


	
	public function Generate ( )
	// Mode d'emploi :
	//génère une page XHTML en convertissant les caractères non SGML en 
	//SGML
	//
	// Renvoie :
	//la page générée en XHTML
	//
	// Contrat :
	//
	{
		return self::ConvertIntoSGML ( parent::Generate() );
	} //------ End of Generate

//-------------------------------------------- Constructeurs - destructeur
	function __construct () 
    // User's manual :
    //
    // Contract :
	//
	{
		parent::__construct();

		//default skeleton for XHTML1.1
		$this->maquette = 
'<?xml version="1.1" encoding="iso-8859-1" standalone="no" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	
<!-- Start of XHTML Page -->
<html>

<!-- Start of Headers -->
'. Template::BuildTag( self::TAG_HEADERS ) .'
<!-- End of Headers -->

<!-- Start of Body -->
'. Template::BuildTag( self::TAG_BODY ) .'
<!-- End of Body -->

</html>
<!-- End of XHTML Page -->';
		
		
		$this->SetTag ( self::TAG_BODY, new XHTMLBodyTemplate() );
		$this->SetTag ( self::TAG_HEADERS, new XHTMLHeadersTemplate() );

		$this->menuLocator = new Locator ();
	} // end of __construct
  
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties
    //protected $menuLocator;

}

//----------------------------------------------------- Others definitions

?>