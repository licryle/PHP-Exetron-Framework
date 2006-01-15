<?

/*************************************************************************\
/*************************** CYRILLE2.FREE.FR ****************************\
/        Source écrit par Cyrille2 en 2004 - Tous droits réservés         \
/*************************************************************************\
/     Ce source est distribué et non donné, i.e. vous pouvez l'utiliser   \
/ et le modifier du moment que les droits d'auteurs sont respectés.       \
/                                                                         \
/     Il est entendu par là que tout programme compilé ayant pour base ce \
/ source doit conserver et afficher le nom de l'auteur original dans le   \
/ programme compilé. De même que toute utilisation partielle ou complete  \
/ de ce source doit être commentée en mentionnant la source et l'auteur.  \
/ En effet, le programme compilé devra afficher, et ce, lisiblement par   \
/ tous, la mention :                                                      \
/     "Contenant une ou des portions de code développées par Cyrille2     \
/      cyrille2@free.fr"                                                  \
/                                                                         \
/ Pour toute information ou demande, cyrille2@free.fr                     \
/                                                                         \
/*************************************************************************/

// Fonctions principales

	function Check_Slash($var) {
		if ($var{strlen($var)-1} != '/') {
			$var .= '/';	
		}
		
		return $var;
	}
	

	function htmlentities_array($array,$options=ENT_QUOTES)	{
	  foreach($array as $key => $val) {
			if (!is_array($array[$key])) {
		    $array[$key] = htmlentities($val,$options);
			}
			else
			{
		    $array[$key] = htmlentities_array($array[$key],$options);
			}
	  }

	  return $array;
	}
	
	function nl2br_array($array)	{
	  foreach($array as $key => $val) {
			if (!is_array($array[$key])) {
		    $array[$key] = nl2br($val);
			}
			else
			{
		    $array[$key] = nl2br_array($array[$key],$options);
			}
	  }

	  return $array;
	}

	function CheckUrls() {
		$s = '';
		
		foreach($_GET as $get => $val) {
			$s .= $get.'='.$val.'&amp;';
		}
		
		return substr($s,0,-1);
	}
	
	function logError($comment) {		
		// log des erreurs
		
		if (LOGERRORS) {
			$fp = @fopen(LOGERRORSFILE,'a+');
			
			if ($fp) {				
				$comment = date('[ H:i:s d/m/Y ]',time()).' '.$_SERVER['REMOTE_ADDR'].' '.$comment;
				
				if (isset($_SESSION)) {
					$comment .= ' | vars de Session : ';
					foreach($_SESSION as $key => $value) {
						$comment .= $key.'="'.$value.'" ';
					}	
				}
				
				@fwrite($fp,$comment."\n");
				@fclose($fp);
			}
		}
	}
	

	// Affichage des erreurs + log
	function echoError($err,$comment=0) {
		if (!empty($err)) {		
			$GLOBALS['interface']->addError($err);
		}
		
		if ($comment !== 0) {
			if ($comment == 1) $comment = $err;
			
			logError($comment);
		}
	}
	
	// Traitement des messages d'erreurs importants
	
	function Error($id,$min=0) {
		$id = intval($id);
		
		$s = ($min==0)?'':'&m=1';
		
		header('Location: '.EXT_URL.'messages.php?id='.$id.$s);
		exit();
	}
	
	function delDir($sdir) {
		$dir = @opendir($sdir);
			
		if ($dir === 0) return 0;
			
		while (($file = readdir($dir)) !== false)
			if ($file != "." && $file != "..")
				if (filetype($file) == 'dir')
					delDir($sdir.$file.'/');
				else
					@unlink($sdir.$file);
			
		closedir($dir);
		
		return rmdir($sdir);
	}
	
	function file_get_included_contents($file) {
		if (!file_exists($file))
			return 'fichier introuvable ('.$file.')';
		else
		{
			ob_start();   	
		
		   	include($file);

		   	$res = ob_get_contents();

   			ob_end_clean();
   			
   			return $res;
   		}
	}
	
	function requireClassPhp5ToPhp4($filename) {
		if (!file_exists($filename)) return 0;
		
		$file = file_get_contents($filename);
		$GLOBALS['ClassesPHP5Includeds'][realpath($filename)] = 1;
		
		
		// balises PHP
		$file = eregi_replace('^<\?(php)?(.*)\?>$','\\2',$file);
		
		// changement du constructeur
		$classname = trim(substr($file,strpos($file,'class ')+5));
		$classname = substr($classname,0,strpos($classname,' '));
		
		$file = eregi_replace('__construct',$classname,$file);
		
		// scopes
		$file = eregi_replace('(private|public|protected)( +static)? +\$','var $',$file);
		$file = eregi_replace('(private|public|protected) +(static)?','',$file);

		//echo $filename.'<br />';
		if (eval($file)===false)
			die('Le fichier ('.$filename.') ne peut être converti en php4. :'."\n".nl2br($file));
	}
	
	function requireClassPhp5ToPhp4_Once($filename) {
		if (!file_exists($filename) || isset($GLOBALS['ClassesPHP5Includeds'][realpath($filename)])) return 0;
		
		requireClassPhp5ToPhp4($filename);
	}
	
	function require_once_version($filename) {
		$version = phpversion();
		$versiontok = explode('.',$version);
		
		if ($versiontok[0] <= 3) die('Ce serveur ne supporte pas les classes.');
		
		if ($versiontok[0] == 4)
			requireClassPhp5ToPhp4_Once($filename);
		else
			require_once($filename);
	}

	if (function_exists('ini_set')) @ini_set ( 'arg_separator.output', '&amp;');
	
	if (function_exists('putenv')) @putenv('arg_separator.output=&amp;');

	
	function dateToFrench($date) {
		$months = array('January','February','March','April','May','June','July','August','September','October','November','December');
		$mois = array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre');
	
		$days = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
		$jours = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
		return str_replace($days,$jours,str_replace($months,$mois,$date));
	}

	// fonction de récupération des pass htaccess et de chargement
	function loadAdminsFrom($file) {
		if (!file_exists($file)) return 0;
		
		$lines = file($file);
		
		if (!$lines) return 0;
		
		$res = array();
		
		foreach($lines as $key => $line) {
			if (!empty($line)) {
				$args = explode(':',$line,2); // 2 = login & pass
			
				$res[$key]['login'] = $args[0];
				$res[$key]['pass'] = rtrim(@$args[1]);
			}
		}
		
		return $res;
	}
	
	function writeAdminsTo($file,$admins) {
		if (!is_array($admins)) return 0;
		
		$fp = fopen($file,'w');		
		if (!$fp) return 0;
		
		foreach($admins as $key => $admin) {
			$line = $admin['login'].':'.$admin['pass'].CRLF;
			fwrite($fp,$line,strlen($line));
		}
		
		fclose($fp);
		
		return 1;
	}
	
// Fin Fonctions Principales

// Appels primordiaux

	// Protection
	if (PROTECT_GET) {
		$_GET = htmlentities_array($_GET);
	}
	
	if (PROTECT_POST) {
		$_POST = htmlentities_array($_POST);
	}

	if (CHECK_URLS) {
		$_SERVER['QUERY_STRING'] = CheckUrls();
	}
	
	if (@$GLOBALS['sessions_activated'])
		// Gestion des sessions	
		require_once(COMMON_PATH_REQUIRED.'sessions.inc');
		
	// function de mise en page principale
	require_once(COMMON_PATH_REQUIRED.'functions-interface.inc');	
	
	// Appels nécessaires a chaque page
	$_POST = nl2br_array($_POST);

	srand();
	
?>