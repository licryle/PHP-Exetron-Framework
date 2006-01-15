<?php

/*************************************************************************
                           |ClassLoader.php|
	Permet le chargement des différentes classesd'un projet
                             -------------------
    début                : |20.11.2005|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <ClassLoader> (fichier ClassLoader.php) --------------
if (defined('CLASSLOADER_H'))
{
    return;
}
else
{

}
define('CLASSLOADER_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <ClassLoader>
//
//
//------------------------------------------------------------------------ 

class ClassLoader extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes

	const LOADDIR_RECURSIVE = 'LOADDIR_RECURSIVE';
	const LOADDIR_NOT_RECURSIVE = 'LOADDIR_NOT_RECURSIVE';

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
	public function AdjustDir ( $dir )
	// Mode d'emploi :
	//permet de rajouter un '/' au path si necessaire
	//
	// Retourne :
	//le chemin terminant nécessairement par /
	{
		if ( substr ( $dir , -1, 1 ) != '/' )
		// assure le formalisme
		{
			return $dir .= '/';
		}
		
		return $dir;
	} //---- Fin de AdjustDir

	public function LoadDir ( $dir , $recursive )
	// Description :
	//charge toutes les classes d'un répertoire et agit de
	// manière récursive si LOADDIR_RECURSIVE est passé en argument
	//
	// Retourne :
	//- NULL en cas de succès
	//- un objet de type Errors en cas d'échec
	{
		$dir = $this->AdjustDir( $dir );
	
		if ( ! is_dir ( $dir ) )
		{
			$errs = new Errors ();
			
			$errs->Add ( new Error ( 'NOT_DIRECTORY' , $dir.' n\'est pas un répertoire.' ) );
			
			return $errs;
		}
		else
		{
			if ( $dirHandle = opendir($dir) )
			{
				while ( ($file = readdir($dirHandle) ) !== false )
				{
					if ( $file == '.' || $file == '..' ) continue;
				
					if ( is_dir ( $dir.$file ) )
					{
						if ( $recursive == CLASSLOADER::LOADDIR_RECURSIVE )
						{
							if ( ( $res = $this->loadDir( $dir.file ) ) instanceOf Errors )
							{
								return $res;
							}
						}
					}
					else
					{
						require_once ( $dir.$file );
					}
				} //-- Fin while readdir()
		   }
		   closedir($dirHandle);
	   }
	   
	   return NULL;
	} //---- Fin de loadDir()
	
	public function LoadClass( $className )
	// Description :
	//charge le répertoire d'une classe en tenant compte de la casse ss Linux
	//
	// Retourne :
	//- NULL en cas de succès
	//- un objet de type Errors en cas d'échec
	//
	// Contrat :
	//les classes parentes doivent être chargées
	{	
		$base = $this->classPath . $className . '/' ; // realPath() vire le /

		if ( ! is_dir ( $base ) )
		{
			$errs = new Errors ();
			
			$errs->Add ( new Error ( 'NOT_DIRECTORY' , $base.' n\'est pas un répertoire.' ) );
			
			return $errs;
		}
		
		// chargement des Abstracts
		
		$this->loadDir( $base . 'Interfaces', CLASSLOADER::LOADDIR_RECURSIVE ); 
		// le répertoire peut ne pas exister => pas de Handle
		
		$this->loadDir( $base . 'Abstracts', CLASSLOADER::LOADDIR_RECURSIVE ); 
		// le répertoire peut ne pas exister => pas de Handle
		
		$this->loadDir( $base . 'Errors', CLASSLOADER::LOADDIR_RECURSIVE ); 
		// le répertoire peut ne pas exister => pas de Handle
		
		$this->loadDir( $base . 'Iterators', CLASSLOADER::LOADDIR_RECURSIVE ); 
		// le répertoire peut ne pas exister => pas de Handle

		$res = $this->loadDir( $base, CLASSLOADER::LOADDIR_NOT_RECURSIVE );

		if ( $res instanceOf Errors )
		{
			return $res;
		}
		else
		{
			return NULL;
		}
	} //---- Fin de loadDir()
	
//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $path = '' )
    // Mode d'emploi (constructeur) :
    // réalise l'instanciation de la classe, par défaut le répertoire 
	//de chargement est le répertoire de cette classe
	//
    // Contrat :
    //
    {
    	if ( empty ( $path ) )
		{
			$this->classPath = realpath( dirname( __FILE__ ) ). '/';
		}
		else
		{
			$this->classPath = $this->AdjustDir( $path );
		}
    } //---- Fin du constructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés
	protected $classPath;
}

//-------------------------------- Autres définitions dépendantes de <ClassLoader>

?>

