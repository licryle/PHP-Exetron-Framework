<?

require_once('../../../librairies/required.inc');
require_once(COMMON_PATH_REQUIRED.'required4Content.inc');

admSetUp(1);

$GLOBALS['interface']->LocatorAdd('Gestion de contenu','#');

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
$error = 0;

if (isset($_GET['a'])) {
	
	switch($_GET['a']) {
		
		case -1: // del
			if (!isset($_GET['p']) || !$content->itemExists($_GET['p']))
				$error = 'Paramètres manquants ou erronés';
			else		
				if ($content->delItem($_GET['p']) == 0)
					$error = $content->getError();
		break;
		
		
		case 0: // modif (cette page ne modif que les positions)
			if (!isset($_GET['p']) || !$content->itemExists($_GET['p']) || !isset($_GET['s']))
				$error = 'Paramètres manquants ou erronés';
			else
				if (intval($_GET['s']) == 0) // on descend
					$content->putItem_Up($_GET['p']);
				else
					$content->putItem_Down($_GET['p']);
		break;
		
		case 1:
			if (!$content->isValid($_POST,$_FILES))
				$error = $content->getError();
			else
				$content->addItem();
		break;
	}
	
	if ($error === 0)
		$error = 'Modifications effectuées avec succès';

	echoError($error);
}

// affichage

// intro
	$GLOBALS['interface']->addText(file_get_included_contents(CONTENT_PATH_HTML_ADM.'intro.html'));

$all = $content->get_all();

if ($all === 0) {
	if (!$content->tableExists()) {
		$content->install();
	}
	
	echoError('Menu Vide');
	$positions = '';
}
else
{
	$GLOBALS['interface']->addText(
				$GLOBALS['interface']->callTableMaquette(
						'Thématiques &amp; Articles',
						'<table width="100%">'.
						CRLF.
	
						$content->sprintf(
									$all,
									file_get_included_contents(CONTENT_PATH_HTML_MENUS_ADM.'menulist_cat.html'),
									file_get_included_contents(CONTENT_PATH_HTML_MENUS_ADM.'menulist_item.html')
						).
						
						CRLF.
						'</table>'.
						CRLF
				)
	);
	
	$positions = $content->sprintf(
									$all,
									file_get_included_contents(CONTENT_PATH_HTML_MENUS_ADM.'menulist_cat_pos.html'),
									file_get_included_contents(CONTENT_PATH_HTML_MENUS_ADM.'menulist_item_pos.html')
						);
}

$GLOBALS['interface']->addText(
	$GLOBALS['interface']->LocatorBack('Haut','locator_back')
);

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

// form d'ajout

$res = array($content->getCleanItem());
$res[0]['id'] = -1;
$res[0]['photo'] = '';
$res[0]['file'] = '';

$form = file_get_included_contents(CONTENT_PATH_HTML_ADM.'addform.html');
$form = str_replace('%positions',$positions,$form);




$GLOBALS['interface']->addtext(
						$content->sprintf(
											$res,
											$GLOBALS['interface']->callTableMaquette(
																'<div id="add">Ajout de thématique/article</div>',
																$form
											),
											
											'',
											'',
											
											$GLOBALS['interface']->callTableMaquette(
																'<div id="add">Ajout de thématique/article</div>',
																$form
											),
											'',	
											1
						)
);

$GLOBALS['interface']->addText(
	$GLOBALS['interface']->LocatorBack('Haut','locator_back')
);


// cette ligne permet de pallier le problème de rafraichissement de la bdd qui intervient après l'include du menu
// ici l'include se refait après modif de la bdd, donc le menu de gauche est à jour
$interface->finclude(CONTENT_PATH_HTML_MENUS.'menu.html','[MENU_CONTENT]');

?>