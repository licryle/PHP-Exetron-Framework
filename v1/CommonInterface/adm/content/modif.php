<?

require_once('../../../librairies/required.inc');
require_once(COMMON_PATH_REQUIRED.'required4Content.inc');

admSetUp(1);

$GLOBALS['interface']->LocatorAdd('Gestion de contenu','./');

$GLOBALS['interface']->setTitle('Gestion de contenu');

$content = new Content($GLOBALS['MYSQL'][0],CONTENT_MYSQL_TABLE);

$content->setMax_Widths($GLOBALS['CONTENT_MAX_WIDTHS']);

$content->setPhoto_Path_Int(CONTENT_PATH_PHOTO_INT);
$content->setPhoto_Path_Ext(CONTENT_PATH_PHOTO_EXT);

$content->setMini_Path_Int(CONTENT_PATH_MINI_INT);
$content->setMini_Path_Ext(CONTENT_PATH_MINI_EXT);

$content->setFile_Path_Int(CONTENT_PATH_FILE_INT);
$content->setFile_Path_Ext(CONTENT_PATH_FILE_EXT);

// actions


$p = (isset($_GET['p'])? intval($_GET['p']) : -1);

if (isset($_GET['a'])) {
	$error = 0;
	
	if (!$content->itemExists($p))
		$error = 'Item inexistant, impossible de le modifier';
	else
	{
		switch($_GET['a']) {
			case 1:
				$_POST['id'] = $p;
				
				if (!$content->alterItem($_POST,$_FILES))
					$error = $content->getError();
			break;
			
			case 2:
				if(!$content->deletePhoto($p) || !$content->deleteMini($p))
					$error = $content->getError();	
			break;
			
			case 3:
				if(!$content->deleteFile($p)) {
					$error = $content->getError(); }
			break;
			
			default:
				$error = 'Paramètre(s) incorrect(s)';
		}
		
	}
			
	if ($error === 0)
		$error = 'Modifications effectuées avec succès';
	
	echoError($error);
}


// notice
if (isset($_GET['h']) && $_GET['h'] == -2) {
	$GLOBALS['interface']->addText(file_get_contents(CONTENT_PATH_HTML_ADM.'notice.html'));
}
else
{
	$GLOBALS['interface']->addText('<a href="?h=-2#aide" class="ROUGE">Lisez l\'aide en cas de doute - afficher l\'aide</a><br />');
}

$GLOBALS['interface']->addtext(
	'<a href="index.php">Retourner à la liste</a>'.
	$GLOBALS['interface']->LocatorBack('Haut','locator_back')
);
// fin notice


// form de modif
if ($content->itemExists($p)){
	$item = $content->getId($p);
}
else
{
	$item = $content->get_all();
}

if ($item === 0) {
	echoError('Contenu vide');
}
else
{
	$item = array($item[0]);
	
	$GLOBALS['interface']->LocatorAdd($item[0]['name'],'#');
	$GLOBALS['interface']->addtext(
			$content->sprintf(
												$item,
												$GLOBALS['interface']->callTableMaquette(
																													'Modification de la thématique/article',
																													file_get_included_contents(CONTENT_PATH_HTML_ADM.'modifform.html')
																													),
												
												'',																	
												'',
												
												$GLOBALS['interface']->callTableMaquette(
																													'Modification de la thématique/article',
																													file_get_included_contents(CONTENT_PATH_HTML_ADM.'modifformphoto.html')
																													),
												'',																
																
												1
		)
	);
}

$GLOBALS['interface']->addText(
	$GLOBALS['interface']->LocatorBack('Haut','locator_back')
);


// cette ligne permet de pallier le problème de rafraichissement de la bdd qui intervient après l'include du menu
// ici l'include se refait après modif de la bdd, donc le menu de gauche est à jour
$interface->finclude(CONTENT_PATH_HTML_MENUS.'menu.html','[MENU_CONTENT]');

?>