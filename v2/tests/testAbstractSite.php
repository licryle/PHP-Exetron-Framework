<?php

$GLOBALS['ltime'] = microtime(true);

$classpath = realpath('classes').'/';

// chargements de base
require_once( $classpath . 'loader.php');

class CurrentPage extends AbstractSitePage
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- Public Methods
    // public function Méthode ( )
    // User's manual :
    //
    // Contract :
    //
	
    public function OnLoad ( )
    // User's manual :
    //function to be called on ApplicationStart
	//
    // Contract :
    //
	{
		$this->pageTemplate = new XHTMLPageTemplate () ;
		
		$this->pageTemplate->SetMaquette (
'<?xml version="1.1" encoding="iso-8859-1" standalone="no" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	
<!-- Start of XHTML Page -->
<html>

<!-- Start of Headers -->
[HEAD]
<!-- End of Headers -->

<!-- Start of Body -->
[BODY]
<!-- End of Body -->

</html>
<!-- End of XHTML Page -->' );
		
		
		$this->pageTemplate->GetBody()->SetMaquette (
		'
<body [PARAMS]>
[CONTENT]<br />
Chargé en [LOADTIME]s.<br />
Exécuté en [EXECTIME]s.
</body>
		');
		
	}
	
    public function Process ( )
    // User's manual :
    //all processes of the page.
	//called after ApplicationStart / OnStart.
	//
    // Contract :
    //
	{
		$this->pageTemplate->GetHeaders ()->AddHeaders( '<title>Coucou</title>' );
		$this->pageTemplate->GetBody()->AddContent( 'Bonjour!');	
	
	}
	
    public function OnUnLoad ( $applicationVars )
    // User's manual :
    //function to be called on ApplicationEnd
	//
    // Contract :
    //
	{
		$loadtime = new Template();
		$loadtime->SetMaquette ( round( microtime(true) - $GLOBALS['ltime'], 5 ) );
		
		$exectime = new Template();
		$exectime->SetMaquette ( round( microtime(true) - $applicationVars[ Application::SYSTEM_START_TIME ], 5 ) );
		

		$this->pageTemplate->GetBody()->SetTag( 'LOADTIME', $loadtime );
		$this->pageTemplate->GetBody()->SetTag( 'EXECTIME', $exectime );
			
		echo $this->pageTemplate;		
	}

//---------------------------------------------- Constructors - destructor

	protected function __construct()
    // User's manual :
    //Internal constructor that disable instanciation
    // Contract :
    //
    {
		parent::__construct();
    } //---- End of __construct
	
    public static function GetInstance ( )
    // User's manual :
    //Getter of the unique instance. Create this if doesn't exist
	//
    // Contract :
    //
	{	
		return parent::getThis( __CLASS__ );
	} // End of GetInstance

//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods
    // protected type Méthode ( );
    // User's manual :
    //
    // Contract :
    //

//--------------------------------------------------- protected properties
	protected $pageTemplate;
}

CurrentPage::GetInstance();
//----------------------------------------------------- Others definitions

?>