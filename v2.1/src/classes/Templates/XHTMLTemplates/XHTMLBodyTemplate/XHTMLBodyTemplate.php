<?php

/*************************************************************************
                           |XHTMLBodyTemplate.php|  -  description
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//-------------- Interface of <XHTMLBodyTemplate> class (file XHTMLBodyTemplate.php) -----------------
if (defined('XHTMLBODYTEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLBODYTEMPLATE_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------  
// Role of <XHTMLBodyTemplate> class
//
//
//------------------------------------------------------------------------ 

class XHTMLBodyTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	
	const TAG_CONTENT = 'CONTENT';
	const TAG_PARAMS = 'PARAMS';

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
	
    public function AddContent ( $content )
    // Mode d'emploi :
    //add raw XHTML $content to the current content of the body.
	// content of the page is value associated to the tag TAG_CONTENT
	//
    // Contrat :
    //raw XHTML must be correct
    {
		$this->AddToTag ( self::TAG_CONTENT, $content );
    } //----- End of AddContent
	
    public function SetContent ( $content )
    // Mode d'emploi :
    //set the content of the page with the given $content
	//
	// Returns :
	//
    // Contrat :
    //raw XHTML must be correct
    {
		$temp = new Template ();
		$temp->SetMaquette ( $content );
		
        $this->SetTag ( self::TAG_CONTENT, $temp );
    } //----- End of SetContent
	
    public function AddParams ( $params )
    // Mode d'emploi :
    //add raw XHTML $params to the current parameters of the body.
	// params of the body is value associated to the tag TAG_PARAMS
	//
    // Contrat :
    //raw XHTML must be correct
    {
		$this->AddToTag ( self::TAG_PARAMS, $params );
    } //----- End of AddParams
	
    public function SetParams ( $params )
    // Mode d'emploi :
    //set the parameters of the page with the given $params
	//
    // Contrat :
    //raw XHTML must be correct
    {
		$temp = new Template ();
		$temp->SetMaquette ( $content );
		
        $this->SetTag ( self::TAG_PARAMS, $temp );
    } //----- End of SetParams

//-------------------------------------------- Constructeurs - destructeur
	function __construct () 
    // User's manual :
    //
    // Contract :
	//
	{
		parent::__construct();
		
		$this->maquette =
'<body '. Template::BuildTag( self::TAG_PARAMS ) .'>
'. Template::BuildTag( self::TAG_CONTENT ).'
</body>';

		$this->SetTag ( self::TAG_CONTENT, new XHTMLTemplate() ); 
		$this->SetTag ( self::TAG_PARAMS, new XHTMLTemplate() ); 

	} // end of __construct
  
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions

?>