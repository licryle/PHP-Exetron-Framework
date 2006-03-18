<?php

$GLOBALS['time'] = microtime(true);

$classpath = realpath('classes').'/';


// chargements de base
require_once( $classpath . 'loader.php');

class CurrentPage extends XHTMLSitePage
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
	
    public static function GetInstance ( )
    // User's manual :
    //Getter of the unique instance. Create this if doesn't exist
	//
    // Contract :
    //
	{	
		
		return parent::getThis( __CLASS__ );
	} // End of GetInstance
	
    public function Process ( )
    // User's manual :
    //all processes of the page.
	//called after ApplicationStart / OnStart.
	//
    // Contract :
    //
	{
		$this->pageTemplate->GetHeaders ()->AddHeaders( '<title>Coucou</title>' );
		
		$load = new XHTMLTemplate();
		$load->SetMaquette ( round( microtime(true)-$GLOBALS['time'], 5) );
		$this->pageTemplate->GetBody()->SetTag ( 'LOADTIME', $load);
		
		$this->pageTemplate->GetBody()->AddContent(
			'Bonjour!<br />'.
			'Total temps '.Template::BuildTag( 'LOADTIME' ).' secondes<br />'.
			'Executé en '.Template::BuildTag( XHTMLSitePage::TAG_EXECUTION_TIME ).' secondes'
		);	
	}

//---------------------------------------------- Constructors - destructor

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods
    // protected type Méthode ( );
    // User's manual :
    //
    // Contract :
    //

//--------------------------------------------------- protected properties
}

CurrentPage::GetInstance();
//----------------------------------------------------- Others definitions

?>