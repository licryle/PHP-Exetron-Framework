<?php

/*************************************************************************
                           |Template.php|
                             -------------------
    start                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@gmail.com
*************************************************************************/

//-------------- Class <Template> (file Template.php) -----------------
/*if (defined('TEMPLATE_H'))
{
    return;
}
else
{

}
define('TEMPLATE_H',1);*/

//--------------------------------------------------------------- Includes 

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
/*!
 * A template is an object that refers to child objects, templates also.
 * It uses a skeleton to place subTemplates.
 * By recurrent generation of content, it lets us create many documents
 * like WebPages.
 *
 * This class implements basic methods and constants for Template-s.
 */
//------------------------------------------------------------------------ 

class Template extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

	/** Char for opening Tags */
	const TAG_OPEN = '[';
	
	/** Char for closing Tags */
	const TAG_CLOSE = ']';
	
	/** new line char */
	const NEWLINE = "\n";

//--------------------------------------------------------- Public Methods

    public static function BuildTag ( $tagName )
    /**
     * builds a Tag from TAG_OPEN, $tagName and TAG_CLOSE
     *
	 * @param $tagName the name of the tag to be generated
	 *
     * @return the valid tag built for $tagName with TAG_OPEN and TAG_CLOSE chars
	 */
    {
        return self::TAG_OPEN. $tagName. self::TAG_CLOSE;
    } //----- End of BuildTag
    
    public function SetSkeleton ( $skeleton )
    /**
     * Sets page skeleton to $skeleton.
     * the skeleton may has the [TAG] you'll set.
	 *
	 * @param $skeleton the skeleton to be set
	 *
	 */
    {
        $this->skeleton = $skeleton;
    } //----- End of SetSkeleton
    
    /*public function GetSkeleton ( )
    // User's manual :
    //get the skeleton of the page.
    //
    // Returns :
    //the current skeleton of the page.
	//
    // Contrat :
    {
        return $this->skeleton;
    } //----- End of SetSkeleton*/
    
    public function SetTag ( $tagName , Template & $value )
    /**
     * Assigns sub-Template $value to the tag named $tagName.
     * The skeleton you've set may contain the tag named $tag
	 *
	 * @param $tagName the name of the tag to be set
	 * @param $value the sub-Template to assign to tag
	 *
	 */
    {
        $this->tags[ $this->BuildTag ( $tagName ) ] = $value;
    } //----- End of SetTag
    
    public function GetTag ( $tagName )
    /**
     * Gets sub-Template assigned to tag named $tagName.
     * The skeleton you've set may contain the tag named $tag.
	 *
	 * @param $tagName the name of the tag to be gotten
	 *
	 * @return The Template object assigned to the tag named $tagName if it exists.
	 * @return TemplateError::TEMPLATE_TAG_INEXISTANT if tag named $tagName
	 * doesn't exist.
	 *
	 */
    {
        if ( $this->TagExists( $tagName ) )
        {
            return $this->tags[  $this->BuildTag ( $tagName ) ];
        }
        else
        {
            $errs = new Errors ( );
            
            $errs->Add( new TemplateError( TemplateError::TEMPLATE_TAG_INEXISTANT , 'The tag named '. $tag  . ' doesn\'t exist.' ) );
            
            return $errs;
        }
    } //----- End of GetTag
    
    public function AddToTag ( $tagName, $value )
    /**
     * Adds $value to the Template's skeleton associated to the tag named $tagName
     * The skeleton you've set may contain the tag named $tag.
	 *
	 * @param $tagName the name of the tag to be gotten for update
	 * @param $value the string to be added to skeleton of Template associated to tag
	 * named $tagName
	 *
	 * @return NULL if operation was successful
	 * @return TemplateError::TEMPLATE_TAG_INEXISTANT if tag named $tagName
	 * doesn't exist.
	 *
	 */
    {
        if ( $this->TagExists( $tagName ) )
        {
			$this->GetTag ( $tagName )->skeleton .= $value;

			return null;
        }
        else
        {
            $errs = new Errors ( );
            
            $errs->Add( new TemplateError( TemplateError::TEMPLATE_TAG_INEXISTANT , 'The tag named '. $tag . ' doesn\'t exist.' ) );
            
            return $errs;
        }
    } //----- End of AddToTag
    
    public function TagExists ( $tagName )
    /**
     * Checks if the tag named $tagName exist or not.
	 *
	 * @param $tagName the name of the tag to be checked
	 *
	 * @return true if tag exists
	 * @return false otherwise
	 *
	 */
    {
        return isset ( $this->tags[ Template::BuildTag( $tagName ) ] );
    } //----- End of TagExists
    
    public function Generate( )
    /**
     * Generates a printable version of object for final print out.
	 * It replaces each tag by it's Template Generated value.
	 * So it generate final document by hierarchy.
	 *
	 * @return printable version of document
	 *
	 */
    {
		$generated = $this->skeleton;

		foreach ( $this->tags as $tag => $value )
		// replace tags by value, generated by subtemplates...
		{
			// generation by hierarchy
			$generated = str_replace ( $tag, $value->Generate(), $generated );
		}
	
        return $generated;
    } //----- End of Generate
    
//-------------------------------------------- Constructors - destructors
    public function __construct( )
	/**
	 * instanciates a Template.
	 *
	 */
    {
		parent::__construct();
	
        $this->tags = array();
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

	/** Skeleton of the page, places sub-Template-s by [tags-name] */
    protected $skeleton;
	
	/** Array of Template-s indexed by tag name */
    protected $tags;
}

//----------------------------------------------------- Others definitions

?>