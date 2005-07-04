<?

require_once('../../../librairies/required.inc');
require_once(PATH_REQUIRED.'required4Stats.inc');

admSetUp();

$GLOBALS['interface']->setTitle('Statistiques des projets');
$GLOBALS['interface']->Locator_Add('Statistiques',EXT_URL.'stats/');

$stats = new Stats($GLOBALS['MYSQL'][0]);

$sites = $stats->Sites_getAll();

$aff = $stats->sprintf($sites,'&nbsp;&nbsp;<a href="?s=%sites_id">%sites_site</a> ');

$GLOBALS['interface']->addText($aff);

if (isset($_GET['s']) && $stats->Sites_id_exists(isset($_GET['s']))) {
	
	$GLOBALS['interface']->Locator_Add($stats->Sites_getSiteById($_GET['s']),'?s='.$_GET['s']);
	
	$datas = $stats->Stats_getSite($_GET['s']);
	

	$GLOBALS['interface']->addText(
		'<br /><br />'.
		$stats->sprintf($datas,'<div>%stats_last - %stats_ip - %stats_host</div>')
		.'<br /><br />'
	);
}

$GLOBALS['interface']->addText($aff);

?>