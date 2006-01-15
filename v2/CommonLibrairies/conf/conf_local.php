<?

Define('COMMON_EXT_URL','http://'.$_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_PORT'].'/exetron/v1/');

// mysql

$GLOBALS['MYSQL'][0]['host'] = 'localhost';
$GLOBALS['MYSQL'][0]['user'] = 'localuser';
$GLOBALS['MYSQL'][0]['pass'] = 'localpassword';
$GLOBALS['MYSQL'][0]['db'] = 'exetron';
$GLOBALS['MYSQL'][0]['exitonfailure'] = 1;
$GLOBALS['MYSQL'][0]['debug'] = 0;
$GLOBALS['MYSQL'][0]['connexion'] = NULL; // sera l'identifiant ressource de connexion*

?>