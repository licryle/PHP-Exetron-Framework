<?php

/*************************************************************************
                           |Template.php|  -  description
                             -------------------
    début                : |11.02.2006|
    copyright            : (C) 2006 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//-------------- Interface of <Template> class (file Template.php) -----------------
if (defined('TEMPLATE_H'))
{
    return;
}
else
{

}
define('TEMPLATE_H',1);

//-------------------------------------------------------- system Includes

//------------------------------------------------------ personal Includes

//-------------------------------------------------------------- Constants

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------  
// Role of <Template> class
//
//
//------------------------------------------------------------------------ 

class Template extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC
	const TAG_OPEN = '[';
	const TAG_CLOSE = ']';
	const NEWLINE = "\n";

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
    
    public static function BuildTag ( $tagName )
    // User's manual :
    //builds a Tag from TAG_OPEN $tagName and TAG_CLOSE
    //
    // Returns :
    //
    // Contrat :
    //tagName must not contain TAG_OPEN or TAG_CLOSE value.
    {
        return self::TAG_OPEN. $tagName. self::TAG_CLOSE;
    } //----- Fin de BuildTag
    
    public function SetMaquette ( $maquette )
    // User's manual :
    //assign $maquette to page skeleton
    //
    // Returns :
    //
    // Contrat :
    //the skeleton may has the [TAG] you'll set
    {
        $this->maquette = $maquette;
    } //----- Fin de SetMaquette
    
    /*public function GetMaquette ( )
    // User's manual :
    //get the skeleton of the page.
    //
    // Returns :
    //the current skeleton of the page.
	//
    // Contrat :
    {
        return $this->maquette;
    } //----- Fin de SetMaquette*/
    
    public function SetTag ( $tag , Template $value )
    // User's manual :
    //assign a template $value to a [TAG] 
	//$tag IS NOT [TAG] but only TAG, without the []
    //
    // Contract :
    //the skeleton you've set may contain the [$tag]
	//$value must be != than null
    {
        $this->tags[ self::TAG_OPEN.$tag. self::TAG_CLOSE ] = $value;
    } //----- Fin de SetTag
    
    public function GetTag ( $tag )
    // User's manual :
    //get the Template object assigned to a [$tag]
    //
    // Returns :
    //- an object of type Errors if an error has been met
    //- an object of type Template.
	//
	// Errors :
	//- TemplateError::TEMPLATE_TAG_INEXISTANT, the tag has neve
	//been assigned
    //
    // Contrat :
    //the skeleton you've set may contain the [$tag]
    {
        if ( $this->TagExists( $tag ) )
        {
            return $this->tags[  self::TAG_OPEN.$tag. self::TAG_CLOSE ];
        }
        else
        {
            $errs = new Errors ( );
            
            $errs->Add( new TemplateError( TemplateError::TEMPLATE_TAG_INEXISTANT , 'The tag '. self::BuildTag( $tag ) . ' doesn\'t exist.' ) );
            
            return $errs;
        }
    } //----- Fin de GetTag
    
    public function AddToTag ( $tag, $value )
    // User's manual :
    //add the $value to the skeleton of the object specified by his $tag
    //
    // Returns :
    //- an object of type Errors if an error has been met
    //- null instead.
	//
	// Errors :
	//- TemplateError::TEMPLATE_TAG_INEXISTANT, the tag has neve
	//been assigned
    //
    // Contrat :
    {
        if ( $this->TagExists( $tag ) )
        {
			$this->GetTag ( $tag )->maquette .= $value;

			return null;
        }
        else
        {
            $errs = new Errors ( );
            
            $errs->Add( new TemplateError( TemplateError::TEMPLATE_TAG_INEXISTANT , 'The tag '. Template::BuildTag( $tag ) . ' doesn\'t exist.' ) );
            
            return $errs;
        }
    } //----- Fin de AddToTag
    
    public function TagExists ( $tag )
    // User's manual :
    //returns whether the tag [$tag] exists
    //
    // Returns :
    //- true if [$tag] exists,
	//- false else
	//
    // Contrat :
    {
        return isset ( $this->tags[ Template::BuildTag( $tag ) ] );
    } //----- End of TagExists
    
    public function Generate( )
    // User's manual :
    //Use the template to generate a child of model
    //
    // Returns :
    //a string that contains the generated contents
    //
    {
		$generated = $this->maquette;

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
    // User's manual :
	//instanciate an object of type Template
    //
    // Contrat :
    //
    {
        $this->tags = array();
    } //---- End of __construct
  
//---------------------------------------------------------- Magic Methods
	public function __ToString ()
    // User's manual :
    //
    // Returns :
	//
    // Contrat :
    //
	{
		return $this->Generate ( );
	} // End of __ToString

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods

//--------------------------------------------------- protected properties

    protected $maquette;
    protected $tags; // tags de remplacement
}

//----------------------------------------------------- Others definitions

?>