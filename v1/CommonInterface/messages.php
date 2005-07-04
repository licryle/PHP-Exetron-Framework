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

if (isset($_GET['m'])) {
	miniSetUp();
}
else
{
	commonSetUp();
}

$_GET['id'] = intval($_GET['id']);

$GLOBALS['interface']->LocatorAdd('Message','#');
$GLOBALS['interface']->setTitle('Message');

switch ($_GET['id']) {
	
	// erreur courante
	case ERROR_AUTHENT_FAILED: 
		echoError('Identification échouée.','403 :'.$_SERVER['REQUEST_URI']);	
	break;
	
	case ERROR_ACCESS_DENIED:
		echoError('Vous n\'avez pas accès à cette ressource.','403 :'.$_SERVER['REQUEST_URI']);
	break;
	
	case ERROR_HACK:
		echoError('Merci d\'être passé nous voir....<br />Pour info, votre IP est :'.$_SERVER['REMOTE_ADDR'],'Hack :'.$_SERVER['REQUEST_URI'].' '.$_SERVER['REMOTE_ADDR']);
	break;
	
	case ERROR_FILE_NOT_FOUND:
		echoError('Fichier introuvable.','404 :'.$_SERVER['REQUEST_URI']);
	break;
	
	case ERROR_CONTENT_DOWNLOAD:
		echoError('Impossible de télécharger ce fichier, veuillez-nous en excuser.','600 :'.$_SERVER['REQUEST_URI']);
	break;
	
	case ERROR_LOGGUED_OUT:
		echoError('Vous êtes maintenant déconnecté en toute sureté.');
	break;
	
	case ERROR_LOGIN_UNKNOWN:
		echoError('Compte inconnu de nos services.');
	break;
	
	case ERROR_LOGIN_CORRUPTED:
		echoError('Mot de passe incorrect.');
	break;
	
	case ERROR_LOGIN_DISABLED:
		echoError('Ce compte a été désactivé pour des raisons de sécurité.');
	break;
	
	default : 
		echoError('Erreur inconnue.',0);
		header('Location: '.EXT_URL);
}

?>