<?

// Configs

Define('PROTECT_GET',1);
Define('PROTECT_POST',1);
Define('CHECK_URLS',1);

Define('COPYRIGHT','Tous droits réservés 2004-2005 &copy; <a href="mailto:cyrille2@free.fr">BERLIAT Cyrille</a>');

Define('COOKIES_DOMAIN','http://'.$_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_PORT'].'/');


// Paths

Define('COMMON_PATH_PUBLIC',BASE_PATH.'CommonInterface/');

Define('COMMON_PATH_CLASSES',COMMON_PATH_LIB.'classes/');
Define('COMMON_PATH_QUERIES',COMMON_PATH_LIB.'requetes/');
Define('COMMON_PATH_HTML',COMMON_PATH_LIB.'commonHTML/');
Define('COMMON_PATH_REQUIRED',COMMON_PATH_LIB.'require/');
Define('COMMON_PATH_CONF',COMMON_PATH_LIB.'conf/');

Define('PATH_PUBLIC',BASE_PATH.'www/');

Define('PATH_CLASSES',PATH_LIB.'classes/');
Define('PATH_QUERIES',PATH_LIB.'requetes/');
Define('PATH_HTML',PATH_LIB.'commonHTML/');
Define('PATH_REQUIRED',PATH_LIB.'require/');
Define('PATH_CONF',PATH_LIB.'conf/');

// EXT_PATHs && MYSQL

if ($_SERVER['SERVER_ADDR'] == '127.0.0.1') {
	require_once(COMMON_PATH_CONF.'conf_local.php');
	require_once(PATH_CONF.'conf_local.php');
}
else
{
	require_once(COMMON_PATH_CONF.'conf_www.php');
	require_once(PATH_CONF.'conf_www.php');
}

// Config Content
require_once(COMMON_PATH_CONF.'content.php');

// Config Login
require_once(COMMON_PATH_CONF.'login.php');

// Config Errors
require_once(COMMON_PATH_CONF.'errors.php');


Define('COMMON_LOGERRORSFILE',COMMON_PATH_LIB.'errors.log');


// Utils Vars

Define('CRLF',chr(13).chr(10));
Define('ALPHANUM','abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
Define('ALPHANUM_MAJ','ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');


// interfaces & styles (absolute paths)

$GLOBALS['interfaces'][0]['maquette'] = PATH_HTML.'maquettes/maquette1.html';
$GLOBALS['interfaces'][0]['maquettebtn'] = PATH_HTML.'maquettes/maquette1-button1.html';
$GLOBALS['interfaces'][0]['maquettetable'] = PATH_HTML.'maquettes/maquette1-table.html';
$GLOBALS['interfaces'][0]['maquettemini'] = PATH_HTML.'maquettes/maquette1-mini.html';

$GLOBALS['interfaces'][0]['css'][0]['normal'] = EXT_URL.'css/styles.php';

// js

$GLOBALS['jsfile'] = EXT_URL.'js/gen.js';// absolute path recommanded


// conf du site en lui meme
require_once(PATH_CONF.'conffile.php');

?>