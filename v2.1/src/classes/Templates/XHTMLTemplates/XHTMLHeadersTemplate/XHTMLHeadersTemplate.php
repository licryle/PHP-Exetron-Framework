<?php

/*************************************************************************
                           |XHTMLHeadersTemplate.php|  -  description
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//-------------- Interface of <XHTMLHeadersTemplate> class (file XHTMLHeadersTemplate.php) -----------------
if (defined('XHTMLHEADERSTEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLHEADERSTEMPLATE_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------  
// Role of <XHTMLHeadersTemplate> class
//
//
//------------------------------------------------------------------------ 

class XHTMLHeadersTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	
	const TAG_HEADERS = 'HEADERS';

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
	
    public function AddHeaders ( $headers )
    // Mode d'emploi :
    //add raw XHTML $headers to the current headers of the head.
	// heades of the heads is value associated to the tag TAG_HEADERS
	//
	//it automatiquely adds a NEWLINE to the $headers
	// 
    // Contrat :
    //raw XHTML must be correct
    {
		$this->AddToTag ( self::TAG_HEADERS, $headers.self::NEWLINE );
    } //----- End of AddHeaders
	
    public function SetHeaders ( $headers )
    // Mode d'emploi :
    //set the headers of the head with the given $headers
	//
	// Returns :
	//
    // Contrat :
    //raw XHTML must be correct
    {
		$temp = new Template ();
		$temp->SetMaquette ( $headers );
		
        $this->SetTag ( self::TAG_HEADERS, $temp );
    } //----- End of SetHeaders

//-------------------------------------------- Constructeurs - destructeur
	function __construct () 
    // User's manual :
    //
    // Contract :
	//
	{
		parent::__construct();
		
		$this->maquette = 
'<head>

'. Template::BuildTag( self::TAG_HEADERS ) .'
</head>';

		$this->SetTag ( self::TAG_HEADERS, new XHTMLTemplate() ); 

	} // end of __construct
  
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions

?>