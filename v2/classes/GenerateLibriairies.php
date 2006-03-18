<?php

/*	fichier de concaténation de scripts	*/
/*	objectif : optimiser le chargement	*/
/*	en centralisant	le chargement		*/

$startFile = 'loader.php';


function getCascadeContent ( $currentFile )
{
	$fileContent = file_get_contents ( $currentFile );
	
	if ( preg_match_all ( '/require(?:_once|) \((.*)\);/U', $fileContent, $out ) == 0) 
	{
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
$content = str_replace ( '<?php', '', $result[0] );
$content = str_replace ( '?>', '', $content );

// add significant tags
$content = "<?php\n\r".$content."\n\r?>";

// write it down
$fp = fopen ( 'librairies.php', 'w+');
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