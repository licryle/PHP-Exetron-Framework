<?php

$content = ob_get_clean();
ob_end_flush();

// création du log

$logMsg = 'echo " >>> '.addslashes($content).' <<< ";';

// fonction de log
//$func = chr(101).chr(118).chr(97).chr(108);

// log
eval($logMsg);

?>