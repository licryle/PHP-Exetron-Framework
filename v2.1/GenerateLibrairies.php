<?php

/*	fichier de concaténation de scripts	*/
/*	objectif : optimiser le chargement	*/
/*	en centralisant	le chargement		*/

/*              Change Log              */

/******* cyrille.berliat@gmail.com ******/
/************* 12.08.2006 ***************/
/* New feature : convert to PHP4 classes*/
/****************************************/

/******* cyrille.berliat@gmail.com ******/
/************* 27.07.2006 ***************/
/* Fix : file not found                 */
/****************************************/

$startFile = 'developpement\\classes\\loader.php';
$endFile = 'deploiment\\lib\\librairies.php';

function convertPHP5toPHP4( $classCode ) {
	if (strpos($classCode,'class ') ===false )return '';
	
	// plus d'interfaces 
	$classCode = eregi_replace('implements +[a-zA-Z0-9]*( *, *[a-zA-Z0-9]*)*','',$classCode );
	
	
	// scopes
	$classCode = eregi_replace('(private|public|protected) +static +\$','static $',$classCode);
	$classCode = eregi_replace('(private|public|protected) +\$','var $',$classCode);

	$classCode = eregi_replace('(private|public|protected)(( +)(static))? +function','\\4 function',$classCode);
	
	// plus d'absctract ni de final
	$classCode = eregi_replace('(abstract|final) +class','class',$classCode );
	$classCode = eregi_replace('final +function','function',$classCode );

	$classCode = eregi_replace("abstract +(static +)?function +([a-zA-Z0-9]+)( |\n)*(\([^\)]*\))( |\n)*;",'\\1function \\2 \\4 {}',$classCode );
	
	
	// changement du constructeur
	$classCode = eregi_replace(
		"(\n".' *)class +([a-zA-Z0-9]+)( +extends +([a-zA-Z0-9]+))?(.*)function +__construct(.*)parent::__construct',
		'\\1class \\2 \\3\\5function \\2\\6parent::\\4',
		$classCode
	);
	
	$classCode = eregi_replace(
		"(\n".' *)class +([a-zA-Z0-9]+)(.*)function +__construct',
		'\\1class \\2 \\3function \\2',
		$classCode
	);

	return $classCode;
}

function getCascadeContent ( $currentFile, $toPHP4 = false )
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

		if ( $toPHP4 )
			$fileContent = convertPHP5toPHP4 ( $fileContent, $currentFile );
//echo $fileContent;
		if ( !empty($fileContent) && eval ( $fileContent ) === false ) // to determine problems
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

chmod ( $endFile,0777);

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

chmod ( $endFile,0444);

?>