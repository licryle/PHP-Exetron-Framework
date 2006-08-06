<?php

/*	fichier de concaténation de scripts	*/
/*	objectif : optimiser le chargement	*/
/*	en centralisant	le chargement		*/

/*              Change Log              */

/******* cyrille.berliat@gmail.com ******/
/************* 27.07.2006 ***************/
/* Fix : file not found                 */
/****************************************/

$startFile = 'developpement\\classes\\loader.php';
$endFile = 'deploiment\\lib\\librairies.php';


function getCascadeContent ( $currentFile )
{
	if ( ! file_exists( $currentFile ) )
	{
		die ('Fichier ou répertoire inexistant :'.$currentFile);
	}

	$currentFile = realpath ( $currentFile );
	
	$fileContent = file_get_contents ( $currentFile );
	
	if ( preg_match_all ( '/require(?:_once|) \((.*)\);/U', $fileContent, $out ) == 0) 
	{
		$fileContent = ereg_replace ( '^<\?php(.*)\?>$', '\\1', $fileContent );

		if ( eval ( $fileContent ) === false ) // to determine problems
		{
			die( 'Problème dans le fichier : <a href="file://'.$currentFile.'">'.$currentFile.'</a><br />' );
		}
		
		$concatenation[0] = $fileContent;
		$concatenation[1] = 1;
	}
	else
	{
		$concatenation[0] = '';
		$concatenation[1] = 0;
	}
	
	$files = $out[1];
	
	$directory = dirname ( $currentFile );
	
	$result = array();
	foreach ( $files as $file ) 
	{
		$toeval = '$result = getCascadeContent ( '.$file.' );';
		eval ( $toeval );
		
		$concatenation[0] .= $result[0];
		$concatenation[1] += $result[1];
	}
	
	return $concatenation;
}

$result = getCascadeContent ( $startFile );

// parse unused tags

// add significant tags
$content = "<?php\n\r".$result[0]."\n\r?>";

// write it down
$fp = fopen ( $endFile, 'w+');
if ( $fp && fwrite ( $fp, $content, strlen( $content ) ) )
{
	echo 'Librairie générée avec succès à partir de '.$result[1].' fichiers';
}
else
{
	echo 'Un problème est survenu';
}

fclose ( $fp );

?>