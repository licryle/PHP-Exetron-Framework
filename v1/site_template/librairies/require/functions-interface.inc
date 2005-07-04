<?

function SetUp($debug=0) {
	$GLOBALS['interface']->add_tags('[MENU]',file_get_included_contents(PATH_HTML.'menus/menu.html'));
}

?>