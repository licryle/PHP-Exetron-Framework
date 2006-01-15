<?

Define('COMMON_EXT_URL','http://'.$_SERVER['HTTP_HOST'].'/exetron.free.fr/');


// mysql

$GLOBALS['MYSQL'][0]['host'] = 'localhost';
$GLOBALS['MYSQL'][0]['user'] = 'tifaz';
$GLOBALS['MYSQL'][0]['pass'] = '';
$GLOBALS['MYSQL'][0]['db'] = 'tifaz';
$GLOBALS['MYSQL'][0]['user'] = 'generic_user';
$GLOBALS['MYSQL'][0]['pass'] = 'no_password';
$GLOBALS['MYSQL'][0]['db'] = 'exetron';
$GLOBALS['MYSQL'][0]['exitonfailure'] = 1;
$GLOBALS['MYSQL'][0]['debug'] = 0;
$GLOBALS['MYSQL'][0]['connexion'] = NULL; // sera l'identifiant ressource de connexion*

?>