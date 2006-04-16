<?php

/*************************************************************************
                           |XHTMLBodyTemplate.php|
                             -------------------
    start                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <XHTMLBodyTemplate> (file XHTMLBodyTemplate.php) -----------------
/*if (defined('XHTMLBODYTEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLBODYTEMPLATE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * XHTMLTemplate extention. Representents the Body tag of an XHTMLPage
 * with its contents and its parameters.
 */
//------------------------------------------------------------------------ 

class XHTMLBodyTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	/** Page Content Tag Name */
	const TAG_CONTENT = 'CONTENT';
	
	/** Param Page Body Tag Name */
	const TAG_PARAMS = 'PARAMS';

//--------------------------------------------------------- Public Methods
	
    public function AddContent ( $content )
    /**
     * Adds raw XHTML $content to the current content of the body.
	 * Content of the page is value associated to the tag named TAG_CONTENT.
	 *
	 * Raw XHML $content may be valid.
     *
	 * @param $content the raw XHTML to be added
	 *
	 */
    {
		$this->AddToTag ( self::TAG_CONTENT, $content );
    } //----- End of AddContent
	
    public function SetContent ( $content )
    /**
     * Sets raw XHTML $content as the current content of the body.
	 * Content of the page is value associated to the tag named TAG_CONTENT.
	 *
	 * Raw XHML $content may be valid.
     *
	 * @param $content the raw XHTML to be set
	 *
	 */
    {
		$temp = new Template ();
		$temp->SetSkeleton ( $content );
		
        $this->SetTag ( self::TAG_CONTENT, $temp );
    } //----- End of SetContent
	
    public function AddParams ( $params )
    /**
     * Adds raw XHTML $params to the current parameters of the body XHTML tag.
	 * Parameters of the body tag is value associated to the tag named TAG_PARAMS.
	 *
	 * Raw XHML $params may be valid.
     *
	 * @param $params the raw XHTML to be added
	 *
	 */
    {
		$this->AddToTag ( self::TAG_PARAMS, $params );
    } //----- End of AddParams
	
    public function SetParams ( $params )
    /**
     * Sets raw XHTML $params as the current parameters of the body XHTML tag.
	 * Parameters of the body tag is value associated to the tag named TAG_PARAMS.
	 *
	 * Raw XHML $params may be valid.
     *
	 * @param $params the raw XHTML to be set
	 *
	 */
    {
		$temp = new Template ();
		$temp->SetSkeleton ( $content );
		
        $this->SetTag ( self::TAG_PARAMS, $temp );
    } //----- End of SetParams

//---------------------------------------------- Constructors - destructor
	function __construct () 
	/**
	 * instanciates a XHTMLBodyTemplate.
	 * Sets a default skeleton and initialises XHTMLTemplates for tags
	 * named TAG_CONTENT and TAG_PARAMS
	 *
	 */
	{
		parent::__construct();
		
		$this->SetSkeleton(
'<body '. Template::BuildTag( self::TAG_PARAMS ) .'>
'. Template::BuildTag( self::TAG_CONTENT ).'
</body>');

		$this->SetTag ( self::TAG_CONTENT, new XHTMLTemplate() ); 
		$this->SetTag ( self::TAG_PARAMS, new XHTMLTemplate() ); 

	} //---- End of __construct
	 
    function __destruct( )
	/**
	 * Destructs ressources allocated
	 */
	{	
		parent::__destruct();
	} //----- End of Destructor
  
//---------------------------------------------------------- Magic Methods
	public function __ToString ()
    /**
	 * Returns a printable version of object for final print out.
	 *
	 * @return String printable on screen
	 *
	 * @see Template::Generate()
	 * 
	 */
	{
		return $this->Generate ( );
	} // End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

}

//----------------------------------------------------- Others definitions

?>