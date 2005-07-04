<?

// Config content

Define('CONTENT_PATH_PHOTO_INT',PATH_PUBLIC.'imgs/content/');
Define('CONTENT_PATH_PHOTO_EXT',EXT_URL.'imgs/content/');

Define('CONTENT_PATH_MINI_INT',PATH_PUBLIC.'imgs/mcontent/');
Define('CONTENT_PATH_MINI_EXT',EXT_URL.'imgs/mcontent/');

Define('CONTENT_PATH_FILE_INT',PATH_PUBLIC.'files/content/');
Define('CONTENT_PATH_FILE_EXT',EXT_URL.'files/content/');

if (!file_exists(PATH_HTML.'content/')) {
	Define('CONTENT_PATH_HTML_MENUS',COMMON_PATH_HTML.'content/menus_usr/');
	Define('CONTENT_PATH_HTML_USR',COMMON_PATH_HTML.'content/usr/');
}
else
{
	Define('CONTENT_PATH_HTML_MENUS',PATH_HTML.'content/menus_usr/');
	Define('CONTENT_PATH_HTML_USR',PATH_HTML.'content/usr/');
}

Define('CONTENT_PATH_HTML_MENUS_ADM',COMMON_PATH_HTML.'content/menus_adm/');
Define('CONTENT_PATH_HTML_ADM',COMMON_PATH_HTML.'content/adm/');

Define('CONTENT_PATH_PUBLIC',COMMON_PATH_PUBLIC.'');
Define('CONTENT_PATH_PUBLIC_ADM',COMMON_PATH_PUBLIC.'adm/content/');

Define('CONTENT_EXT_URL',EXT_URL.'');
Define('CONTENT_ADM_URL',EXT_URL.'adm/content/');

Define('CONTENT_MYSQL_TABLE',SITE_NAME.'_content');


$GLOBALS['CONTENT_MAX_WIDTHS'] = array(
	'Très large' => 700,
	'Moitié de page' => 400,
	'Vignette' => 100
);

if (file_exists(PATH_CONF.'content.php'))
	require_once(PATH_CONF.'content.php');

?>