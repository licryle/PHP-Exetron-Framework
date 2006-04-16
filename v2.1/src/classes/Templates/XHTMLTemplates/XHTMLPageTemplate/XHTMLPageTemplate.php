<?php

/*************************************************************************
                           |XHTMLPageTemplate.php|
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <XHTMLPageTemplate> (file XHTMLPageTemplate.php) -----------------
/*if (defined('XHTMLPAGETEMPLATE_H'))
{
    return;
}
else
{

}
define('XHTMLPAGETEMPLATE_H',1);*/

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * XHTMLTemplate extention. Representents a XHTML Page with its body and
 * its headers.
 */
//------------------------------------------------------------------------ 

class XHTMLPageTemplate extends XHTMLTemplate
{
//----------------------------------------------------------------- PUBLIC
	
	/** Page Body Tag Name */
	const TAG_BODY = 'BODY';
	
	/** Page Headers Tag Name */
	const TAG_HEADERS = 'HEAD';

//--------------------------------------------------------- Public Methods
    
    public static function ConvertIntoSGML( $source )
    /**
     * Converts $source string into valid SGML string char by char.
	 *
	 * @param $source The source string to be converted
	 *
	 * @return the valid SGML string that correspond to $source string
	 *
	 */
    {
        $newString = '';
        
        for($i = 0; $i < strlen($source); $i++) {
            $o = ord($source{$i});
            
            $newString .= (($o > 127)?'&#'.$o.';':$source{$i});
        }
        
        return $newString;
    } //----- End of ConvertIntoSGML
	
    public function GetBody ( )
    /**
     * Gets the XHTMLHeadersTemplate that corresponds to body tag named 
	 * TAG_BODY.
	 *
	 * @return the XHTMLHeadersTemplate object that corresponds to head 
	 * tag named TAG_HEADERS.
	 *
	 */
    {
        return $this->GetTag ( self::TAG_BODY );
    } //----- End of GetBody
	
    public function GetHeaders ( )
    /**
     * Gets the XHTMLHeadersTemplate that corresponds to TAG_HEADERS tag of the page.
	 *
	 * @return the XHTMLHeadersTemplate object that corresponds to TAG_HEADERS tag of the page.
	 *
	 */
    {
        return $this->GetTag ( self::TAG_HEADERS );
    } //----- End of GetHeaders

	
	public function Generate ( )
    /**
     * Generates a printable version of object for final print out.
	 * It replaces each tag by it's Template Generated value.
	 * So it generate final document by hierarchy.
	 *
	 * The final document's characters are converted into valid SGML ones.
	 *
	 * @return printable version of document with valid SGML characters.
	 *
	 * @see Template::Generate()
	 * @see XHTMLPageTemplate::ConvertIntoSGML();
	 *
	 */
	{
		return self::ConvertIntoSGML ( parent::Generate() );
	} //------ End of Generate

//-------------------------------------------- Constructeurs - destructeur
	function __construct () 
	/**
	 * instanciates a XHTMLPageTemplate.
	 * Sets a default skeleton for valid XHTML1.1.
	 * Initialises XHTMLBodyTemplate for the body tag named TAG_BODY
	 * Initialises XHTMLHeadersTemplate for the head tag named TAG_HEADERS
	 *
	 */
	{
		parent::__construct();

		//default skeleton for XHTML1.1
		$this->SetSkeleton ( 
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
<!-- End of XHTML Page -->' );
		
		
		$this->SetTag ( self::TAG_BODY, new XHTMLBodyTemplate() );
		$this->SetTag ( self::TAG_HEADERS, new XHTMLHeadersTemplate() );
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