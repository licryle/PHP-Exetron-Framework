<?php

/*	fichier de concat�nation de scripts	*/
/*	objectif : optimiser le chargement	*/
/*	en centralisant	le chargement		*/

$startFile = 'src/classes/loader.php';
$endFile = 'release/lib/librairies.php';


function getCascadeContent ( $currentFile )
{
	$currentFile = realpath ( $currentFile );

	$fileContent = file_get_contents ( $currentFile );
	
	if ( preg_match_all ( '/require(?:_once|) \((.*)\);/U', $fileContent, $out ) == 0) 
	{
		$fileContent = ereg_replace ( '^<\?php(.*)\?>$', '\\1', $fileContent );

		if ( eval ( $fileContent ) === false ) // to determine problems
		{
			die( 'Probl�me dans le fichier : <a href="file://'.$currentFile.'">'.$currentFile.'</a><br />' );
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
	echo 'Librairie g�n�r�e avec succ�s � partir de '.$result[1].' fichiers';
}
else
{
	echo 'Un probl�me est survenu';
}

fclose ( $fp );

?>