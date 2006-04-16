<?php

/*************************************************************************
                           |XHTMLHeadersTemplate.php|
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <XHTMLHeadersTemplate> (file XHTMLHeadersTemplate.php) -----------------
/*if (defined('XHTMLHEADERSTEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLHEADERSTEMPLATE_H',1);*/

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * XHTMLTemplate extention. Representents the Headers tag of an XHTMLPage.
 * Headers are managed with raw XHTML for more simplicity.
 */
//------------------------------------------------------------------------ 

class XHTMLHeadersTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	/** Headers Content Tag Name */
	const TAG_HEADERS = 'HEADERS';

//--------------------------------------------------------- Public Methods
	
    public function AddHeaders ( $headers )
	/**
     * Adds raw XHTML $headers to the current headers.
	 * Headers of the heads is value associated to the tag TAG_HEADERS.
	 *
	 * It automatiquely adds a NEWLINE to the $headers.
	 *
	 * Raw XHTML may be correct.
	 *
	 * @param $headers The raw XHTML header(s) to be added.
	 */
    {
		$this->AddToTag ( self::TAG_HEADERS, $headers . self::NEWLINE );
    } //----- End of AddHeaders
	
    public function SetHeaders ( $headers )
	/**
     * Sets raw XHTML $headers as the current headers.
	 * Headers of the heads is value associated to the tag TAG_HEADERS.
	 *
	 * Raw XHTML may be correct.
	 *
	 * @param $headers The raw XHTML header(s) to be set.
	 */
    {
		$temp = new Template ();
		$temp->SetSkeleton ( $headers );
		
        $this->SetTag ( self::TAG_HEADERS, $temp );
    } //----- End of SetHeaders

//-------------------------------------------- Constructeurs - destructeur
	function __construct () 
	/**
	 * instanciates a XHTMLHeadersTemplate.
	 * Sets a default skeleton for head tag.
	 * Initialises XHTMLTemplate for the raw headers.
	 *
	 */
	{
		parent::__construct();
		
		$this->SetSkeleton ( 
'<head>

'. Template::BuildTag( self::TAG_HEADERS ) .'
</head>'	);

		$this->SetTag ( self::TAG_HEADERS, new XHTMLTemplate() ); 

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