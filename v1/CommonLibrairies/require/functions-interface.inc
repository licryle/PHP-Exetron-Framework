<?

function commonSetUp($debug=0,$maquette=0) {
	$interface = & new WebInterface($GLOBALS['interfaces'][$maquette]['maquette'],$debug);
	
	// Maquette du boutton
	$GLOBALS['interface']->setButtonMaquette(file_get_included_contents($GLOBALS['interfaces'][$maquette]['maquettebtn']));
	// Maquette Tables
	$GLOBALS['interface']->setTableMaquette(file_get_included_contents($GLOBALS['interfaces'][$maquette]['maquettetable']));

	
	// menus locator
	
	$GLOBALS['interface']->LocatorStart('Vous êtes ici :','locator','<img src="'.EXT_URL.'imgs/maquette1/top.gif" width="10" height="10" alt="Haut de page" />');
	$GLOBALS['interface']->LocatorAdd(LOCATOR_SITE,EXT_URL);
	
	// compteur
	require_once_version(COMMON_PATH_REQUIRED.'required4Statistiques.inc');
	
	$compteur = new Statistiques($GLOBALS['MYSQL'][0],STATISTIQUES_MYSQL_TABLE);
	$compteur->setGapMin(STATISTIQUES_MIN_GAP);
	
	if (!$compteur->tableExists()) { $compteur->install(); }
	
	if (!$compteur->hasVisited($_SERVER['REMOTE_ADDR']))
		$compteur->visite($_SERVER['REMOTE_ADDR'],$_SERVER['HTTP_USER_AGENT']);
	else
		$compteur->reVisite($_SERVER['REMOTE_ADDR']);
	
	// fin compteur 
	
	$GLOBALS['interface']->add_tags	(
						array (
							'[CSS]',
							'[JS]',
							'[TITLE]',
							'[COPYRIGHT]',
							'[EXT_URL]',
							'[META_DESC]',
							'[META_KEYS]',
							'[AUDIT_KEY]',
							'[MENU_CONTENT]',
							'[COMPTEUR]'
							),
 						
 						array (
 							$GLOBALS['interfaces'][$maquette]['css']['normal'],
							$GLOBALS['jsfile'],
 							TITLE,
 							COPYRIGHT,
 							EXT_URL,
							META_DESC,
 							META_KEYS,
 							AUDIT_KEY,
 							file_get_included_contents(CONTENT_PATH_HTML_MENUS.'menu.html'),
							$compteur->getNB()
 						)
				);
				
		if (function_exists('setUp')) setUp($debug);
}

function admSetUp($debug=0) {
	// vérif autorisations
	
	if (!empty($GLOBALS['protect_htaccess']) && file_exists($GLOBALS['protect_htaccess'])) {
		$admins = loadAdminsFrom($GLOBALS['protect_htaccess']);
		
		if (!empty($_GET['Authorization'])) {
			$Authorization = explode(' ',$_GET['Authorization']);
			
			list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode($Authorization[1]));
		}
		
		// rech ident
		$ident = 0;
		foreach($admins as $admin) {
			if ($admin['login'] == @$_SERVER['PHP_AUTH_USER']) {
				if ($admin['pass'] == md5(@$_SERVER['PHP_AUTH_PW']))
					$ident++;
				
				break;
			}
		}
		
		if (!$ident) {
			header('WWW-Authenticate: basic realm="Administration"');
			header("HTTP/1.0 401 Unauthorized");
			
			echo '<script>document.location.href="'.EXT_URL.'messages.php?id=401";</script>';
			exit();
		}
	}
	
	commonSetUp($debug);
	
	$GLOBALS['interface']->LocatorAdd('Administration',ADM_URL);		
	$GLOBALS['interface']->finclude(PATH_HTML.'menus/menu_adm.html','[MENU_ADM]');
	
	if (function_exists('adminSetUp')) adminSetUp($debug);
}

function miniSetUp($debug=0) {
	@session_start();
	
	$GLOBALS['interface'] = & new WebInterface($GLOBALS['interfaces'][0]['maquettemini'],$debug);
	//$GLOBALS['interface'] = $GLOBALS['interface'];
	
	// Maquette du boutton
	$maq = @file_get_contents($GLOBALS['interfaces'][0]['maquettebtn']);
	$maq = str_replace('[EXT_URL]',EXT_URL,$maq);
	
	$GLOBALS['interface']->setButtonMaquette($maq);		
	$GLOBALS['interface']->LocatorStart('','','<img src="'.EXT_URL.'imgs/maquette1/top.gif" width="10px" height="10px" alt="Haut de page" />');
	
	$GLOBALS['interface']->add_tags	(
					array (
			   			'[CSS]',
			   			'[JS]',
 						'[TITLE]',
 						'[COPYRIGHT]',
 						'[EXT_URL]',
			   			'[META_DESC]',
 						'[META_KEYS]',
						'[MENU_CONTENT]'
 						),
 						
					array (
						$GLOBALS['interfaces'][0]['css']['normal'],
						$GLOBALS['jsfile'],
						TITLE,
						COPYRIGHT,
						EXT_URL,
						META_DESC,
						META_KEYS,
 						file_get_included_contents(CONTENT_PATH_HTML_MENUS.'menu.html')
					)
				);
				
	if (function_exists('miniSetUp')) minSetUp($debug);
}

?>