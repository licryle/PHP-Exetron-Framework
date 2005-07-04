<?

// Configs

Define('PROTECT_GET',1);
Define('PROTECT_POST',1);
Define('CHECK_URLS',1);

Define('COPYRIGHT','Tous droits r�serv�s 2004 &copy; <a href="mailto:cyrille2@free.fr">BERLIAT Cyrille</a>');

//Define('COMMON_EXT_URL','http://exetron.free.fr/');
Define('COMMON_EXT_URL','http://localhost:8000/exetron.free.fr/');

// Paths

Define('COMMON_PATH_PUBLIC',BASE_PATH.'CommonInterface/');

Define('COMMON_PATH_CLASSES',COMMON_PATH_LIB.'classes/');
Define('COMMON_PATH_QUERIES',COMMON_PATH_LIB.'requetes/');
Define('COMMON_PATH_HTML',COMMON_PATH_LIB.'commonHTML/');
Define('COMMON_PATH_REQUIRED',COMMON_PATH_LIB.'require/');

Define('PATH_PUBLIC',BASE_PATH.SITE_NAME.'/fr/');

Define('PATH_CLASSES',PATH_LIB.'classes/');
Define('PATH_QUERIES',PATH_LIB.'requetes/');
Define('PATH_HTML',PATH_LIB.'commonHTML/');
Define('PATH_REQUIRED',PATH_LIB.'require/');

// Config content

Define('CONTENT_PATH_PHOTO_INT',PATH_PUBLIC.'imgs/content/');
Define('CONTENT_PATH_PHOTO_EXT',EXT_URL.'imgs/content/');

Define('CONTENT_PATH_FILE_INT',PATH_PUBLIC.'files/content/');
Define('CONTENT_PATH_FILE_EXT',EXT_URL.'files/content/');

Define('CONTENT_PATH_HTML_MENUS',COMMON_PATH_HTML.'content/menus/');
Define('CONTENT_PATH_HTML_USR',COMMON_PATH_HTML.'content/usr/');
Define('CONTENT_PATH_HTML_ADM',COMMON_PATH_HTML.'content/adm/');

Define('CONTENT_PATH_PUBLIC',COMMON_PATH_PUBLIC.'');
Define('CONTENT_PATH_PUBLIC_ADM',COMMON_PATH_PUBLIC.'adm/content/');

Define('CONTENT_MYQSL_TABLE',SITE_NAME.'_content');


Define('COMMON_LOGERRORSFILE',COMMON_PATH_LIB.'errors.log');

Define('CRLF',chr(13).chr(10));

// interfaces & styles (absolute paths)

$GLOBALS['interfaces'][0]['maquette'] = PATH_HTML.'maquettes/maquette1.html';
$GLOBALS['interfaces'][0]['maquettebtn'] = PATH_HTML.'maquettes/maquette1-button1.html';
$GLOBALS['interfaces'][0]['maquettetable'] = PATH_HTML.'maquettes/maquette1-table.html';

$GLOBALS['interfaces'][0]['css'][0]['normal'] = EXT_URL.'css/styles.php';

// mysql

$GLOBALS['MYSQL'][0]['host'] = 'localhost';
$GLOBALS['MYSQL'][0]['user'] = 'exetron';
$GLOBALS['MYSQL'][0]['pass'] = '';
$GLOBALS['MYSQL'][0]['db'] = 'exetron';
$GLOBALS['MYSQL'][0]['exitonfailure'] = 1;
$GLOBALS['MYSQL'][0]['connexion'] = NULL; // sera l'identifiant ressource de connexion*




// Acc�s sp�ciaux

Define(ALPHANUM,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');

// Fin configs

?>