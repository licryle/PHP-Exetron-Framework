<?

/*************************************************************************\
/*************************** CYRILLE2.FREE.FR ****************************\
/        Source écrit par Cyrille2 en 2004 - Tous droits réservés         \
/*************************************************************************\
/     Ce source est distribué et non donné, i.e. vous pouvez l'utiliser   \
/ et le modifier du moment que les droits d'auteurs sont respectés.       \
/                                                                         \
/     Il est entendu par là que tout programme compilé ayant pour base ce \
/ source doit conserver et afficher le nom de l'auteur original dans le   \
/ programme compilé. De même que toute utilisation partielle ou complete  \
/ de ce source doit être commentée en mentionnant la source et l'auteur.  \
/ En effet, le programme compilé devra afficher, et ce, lisiblement par   \
/ tous, la mention :                                                      \
/     "Contenant une ou des portions de code développées par Cyrille2     \
/      cyrille2@free.fr"                                                  \
/                                                                         \
/ Pour toute information ou demande, cyrille2@free.fr                     \
/                                                                         \
/*************************************************************************/


require_once(COMMON_PATH_REQUIRED.'required4Content.inc');

$content = new Content($GLOBALS['MYSQL'][0],CONTENT_MYSQL_TABLE);

if ($content->itemExists($_GET['id'])) {
	$ct = $content->getId($_GET['id']);
	$ct = $ct[0];
	
	if (empty($ct['file']) || !file_exists(CONTENT_PATH_FILE_INT.$ct['file'])) {		
		Error(ERROR_CONTENT_DOWNLOAD);
		exit();
	}
	else
	{		
		header('Content-Type: application/force-download');
		header('Content-Description: File Transfert');
		header('Content-Disposition: attachment; filename="'.$ct['name'].substr($ct['file'],-4).'"');
		header('Content-Length: '.filesize(CONTENT_PATH_FILE_INT.$ct['file'])); 
		@readfile(CONTENT_PATH_FILE_INT.$ct['file']);
		
		$content->download($_GET['id']);
	}
}
else
{
	Error(ERROR_CONTENT_DOWNLOAD);	
}

?>