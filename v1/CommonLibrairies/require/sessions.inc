<?


@session_start();
require_once(COMMON_PATH_REQUIRED.'required4Login.inc');

// Gestion des sessions
	// Levels	
	function isLogged() {
		if (!class_exists('Login') || !isset($_SESSION['_id'])) return 0;
	
		$clLogin = new Login($GLOBALS['MYSQL'][0],LOGIN_MYSQL_TABLE,LOGIN_PASS_ENCODE);
		
		return ($clLogin->getAccess($_SESSION['_id']) > ACCESS_DISABLED);
	}
	
	
	function MustBeLogged() {
		if (!isLogged()) {
			Error(ERROR_ACCESS_DENIED);
		}
	}
	
	function isAccess($acc,$ormore=0) {
		mustBeLogged();
		
		$lg = new Login($GLOBALS['MYSQL'][0],LOGIN_MYSQL_TABLE,LOGIN_PASS_ENCODE);
		$access = $lg->getAccess($_SESSION['_id']);
		
		if (is_array($acc)) {
			if(!in_array($access,$acc))
				return 0;
		}
		
		if (!isset($access) || ($access < $acc) || ($access != $acc && $ormore != 1))
			return 0;
			
		return 1;
	}
	
	function mustBeAccess($acc,$ormore=0) {
		if (!isAccess($acc,$ormore))
			Error(ERROR_ACCESS_DENIED);	
	}

// logout
if (isset($_GET['logoff']) && $_GET['logoff'] && isLogged()) {		
	setcookie('autonum','', time()-360000000,'/fr/',COOKIES_DOMAIN);
	
	$clLogin = new Login($GLOBALS['MYSQL'][0],LOGIN_MYSQL_TABLE,LOGIN_PASS_ENCODE);
	$clLogin->setAutonum($_SESSION['_id'],'');
		
	unset($_SESSION['_id']);
	
	//Error(ERROR_LOGGUED_OUT);
}

// login:


// login manuel
if (!isLogged() && isset($_POST['_login'])) {
	$_POST['_login'] = strtolower($_POST['_login']);

	//appel a la fonction de test du login
	
	$clLogin = new Login($GLOBALS['MYSQL'][0],LOGIN_MYSQL_TABLE,LOGIN_PASS_ENCODE);
	
	// récupération de l'id
	$sess_id = $clLogin->getLoginId($_POST['_login']);
	
	// existance login
	if ($sess_id === 0) {			
		Error(ERROR_LOGIN_UNKNOWN);
		exit();
		
	}
	
	// vérif pass
	if (!$clLogin->CheckLogin($_POST['_login'], $_POST['_password'])) {
		// Connexion échouée			

		Error(ERROR_LOGIN_CORRUPTED);
		exit();
	}
	
	
	// Vérifions que le compte soit activé			
	if ($clLogin->getAccess($sess_id) == ACCESS_DISABLED) {
		
		Error(ERROR_LOGIN_DISABLED);
		exit();	
	}
	// Pas de sauvegarde de l'accès pour plus de sécurité on refera appel a la bdd
	
	
	// Connexion réussie
	$_SESSION['_id'] = $sess_id;
	$_SESSION['_login'] = $_POST['_login'];
	
	if (isset($_POST['memo']) && $_POST['memo']) {
		// s'il veut une mémorisation de son compte
		do {
			$autoNum = $clLogin->Build_Autonum();
		}while($clLogin->AutonumExists($autoNum));				
		// autonum créé
		
		// autonum stocké ds la bdd
		$clLogin->setAutonum($_SESSION['_id'],$autoNum);
		
		
		// autonum stocké ds le cookie
		setcookie('autonum',$autoNum, time()+360000000,'/fr/',COOKIES_DOMAIN);
	}

}

// autologin
if (!isLogged() && isset($_COOKIE['autonum']) && !empty($_COOKIE['autonum'])) {
	$lg = new Login($GLOBALS['MYSQL'][0],LOGIN_MYSQL_TABLE,LOGIN_PASS_ENCODE);
	
	$sess_id = $lg->CheckAutoNum($_COOKIE['autonum']);
	
	if ($sess_id === ACCESS_DISABLED) {
		setcookie('autonum','', time()-360000000,'/fr/',COOKIES_DOMAIN);
	}
	else
	{
		// si l'auto num est bon, on login
		$_SESSION['_id'] = $sess_id;
		$_SESSION['_login'] = $lg->getIdLogin($sess_id);
	}
}

// changement d'autonum a chaque page pour des raisons de sécurité
// le isLoggued() permet d'éviter de donner l'accès a qqun de déconnecté
if (isLogged() && isset($_COOKIE['autonum'])) { 

	$clLogin = new Login($GLOBALS['MYSQL'][0],LOGIN_MYSQL_TABLE,LOGIN_PASS_ENCODE);

	// s'il veut une mémorisation de son compte
	$autoNum = $clLogin->Build_Autonum();			
	// autonum créé
			
	// autonum stocké ds la bdd
	$clLogin->setAutonum($_SESSION['_id'],$autoNum);
			
	// autonum stocké ds le cookie
	setcookie('autonum',$autoNum, time()+360000000,'/fr/',COOKIES_DOMAIN);
}
else
{
	unset($_COOKIE['autonum']);
}

?>