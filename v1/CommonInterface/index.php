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

require_once(COMMON_PATH_REQUIRED.'required4Content.inc');

commonSetUp();

if (defined('CONTENT_NAME') && (constant('CONTENT_NAME')!= '') ) {
	$GLOBALS['interface']->LocatorAdd(CONTENT_NAME,'./');
}

$p = (isset($_GET['p'])? intval($_GET['p']) : -1);

$content = new Content($GLOBALS['MYSQL'][0],CONTENT_MYSQL_TABLE);

$content->setPhoto_Path_Int(CONTENT_PATH_PHOTO_INT);
$content->setPhoto_Path_Ext(CONTENT_PATH_PHOTO_EXT);

$content->setMini_Path_Int(CONTENT_PATH_MINI_INT);
$content->setMini_Path_Ext(CONTENT_PATH_MINI_EXT);

$content->setFile_Path_Int(CONTENT_PATH_FILE_INT);
$content->setFile_Path_Ext(CONTENT_PATH_FILE_EXT);


if ($content->is_Cat($p)){ 
	$item = $content->get_Cat($p);
}
else
{
	$item = $content->get_Cats();
	
	if ($item != 0) {
		header('Location: ?p='.$item[0]['id']); // pour le script de pub qui détecte les arguments
		exit();
	}
}

if ($item === 0) {
	if (CONTENT_NAME!='') {
		$GLOBALS['interface']->setTitle(CONTENT_NAME);
	}else{
		$GLOBALS['interface']->setTitle('Accueil');
	}
	
	echoError('Aucune section existante');
}
else
{	
	$GLOBALS['interface']->LocatorAdd($item[0]['name'],'#');
	$GLOBALS['interface']->setTitle($item[0]['name']);
	
	$GLOBALS['interface']->addRaw(
			$content->sprintf(
												$item,
												
												file_get_included_contents(CONTENT_PATH_HTML_USR.'infospage_cat_noimg.html'),
												
												($GLOBALS['interface']->callTableMaquette(
																													'<a id="id%id"></a>%name',
																													file_get_included_contents(CONTENT_PATH_HTML_USR.'infospage_item_noimg.html')
																													).
												$GLOBALS['interface']->LocatorBack('Haut','locator_back').'<br />'.CRLF),
												
												file_get_included_contents(CONTENT_PATH_HTML_USR.'infospage_list_item.html'),
												file_get_included_contents(CONTENT_PATH_HTML_USR.'infospage_cat_img.html'),
												
												($GLOBALS['interface']->callTableMaquette(
																													'<a id="id%id"></a>%name',
																													file_get_included_contents(CONTENT_PATH_HTML_USR.'infospage_item_img.html')
																													).
												$GLOBALS['interface']->LocatorBack('Haut','locator_back').'<br />'.CRLF),
												0,
												1
		)
	);
}

?>