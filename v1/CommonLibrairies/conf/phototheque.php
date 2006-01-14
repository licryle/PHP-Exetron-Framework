<?


define('PHOTOTHEQUE_PATH_PHOTO_INT',PATH_PUBLIC.'imgs/phototheque/');
define('PHOTOTHEQUE_PATH_PHOTO_EXT',EXT_URL.'imgs/phototheque/');

define('PHOTOTHEQUE_PATH_MINI_INT',PATH_PUBLIC.'imgs/mphototheque/');
define('PHOTOTHEQUE_PATH_MINI_EXT',EXT_URL.'imgs/mphototheque/');

if (!file_exists(PATH_HTML.'phototheque/')) {
	Define('PHOTOTHEQUE_PATH_HTML_MENUS',COMMON_PATH_HTML.'phototheque/menus_usr/');
	Define('PHOTOTHEQUE_PATH_HTML_USR',COMMON_PATH_HTML.'phototheque/usr/');
}
else
{
	Define('PHOTOTHEQUE_PATH_HTML_MENUS',PATH_HTML.'phototheque/menus_usr/');
	Define('PHOTOTHEQUE_PATH_HTML_USR',PATH_HTML.'phototheque/usr/');
}

Define('PHOTOTHEQUE_PATH_HTML_MENUS_ADM',COMMON_PATH_HTML.'phototheque/menus_adm/');
Define('PHOTOTHEQUE_PATH_HTML_ADM',COMMON_PATH_HTML.'phototheque/adm/');

Define('PHOTOTHEQUE_EXT_URL',EXT_URL.'');
Define('PHOTOTHEQUE_ADM_URL',EXT_URL.'adm/phototheque/');

Define('PHOTOTHEQUE_PATH_PUBLIC',COMMON_PATH_PUBLIC.'');
Define('PHOTOTHEQUE_PATH_PUBLIC_ADM',COMMON_PATH_PUBLIC.'adm/phototheque/');

define('PHOTOTHEQUE_MYSQL_TABLE',SITE_NAME.'_phototheque');

?>