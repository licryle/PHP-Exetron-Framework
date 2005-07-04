<?

if (!defined('BASE_PATH')) define('BASE_PATH',realpath(dirname(__FILE__).'/../'));

define('COMMON_PATH_LIB',BASE_PATH.'CommonLibrairies/'); // path absolu finissant par /

require_once(COMMON_PATH_LIB.'conf/conffile.php');
require_once(COMMON_PATH_LIB.'require/functions-gen.inc');
require_once(COMMON_PATH_LIB.'require/functions-interface.inc');

require_once_version(COMMON_PATH_CLASSES.'WebInterface.inc');


?>