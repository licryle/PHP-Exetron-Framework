<?php

// chargements de base
require_once( '../release/lib/librairies.php' );

class CurrentPage extends WebSitePage
{
//----------------------------------------------------------------- PUBLIC

//--------------------------------------------------------- Public Methods
    // public function M�thode ( )
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
		parent::Process();
		
		$this->GetTemplate()->GetHeaders()->AddHeaders( '<title>Coucou</title>' );
		
		$sess = $this->GetSession();
		$rand = $sess->GetVariable('lastexec');
		$sess->SetVariable('lastexec',rand() );
		
		$this->GetTemplate()->GetBody()->AddContent(
			'Bonjour!<br />'.
			'Execut� en '.Template::BuildTag( XHTMLSitePage::TAG_EXECUTION_TIME ).' secondes<br />'.
			'Dernier rand() en '.$rand.'<br />'.
			'Current rand() en '.$sess->GetVariable('lastexec')
		);
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
	
    public function __destruct()
    // User's manual :
	//
    // Contract :
    //
    {
		parent::__destruct();
    } //---- End of __destruct
//---------------------------------------------------------- Magic Methods

//---------------------------------------------------------------- PRIVATE 

//------------------------------------------------------ protected methods
    // protected type M�thode ( );
    // User's manual :
    //
    // Contract :
    //

//--------------------------------------------------- protected properties
}

//----------------------------------------------------- Others definitions

CurrentPage::GetInstance();

?>
