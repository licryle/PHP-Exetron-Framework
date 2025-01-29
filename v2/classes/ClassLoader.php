<?php

/*************************************************************************
                           |ClassLoader.php|
	Permet le chargement des diff�rentes classesd'un projet
                             -------------------
    d�but                : |20.11.2005|
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

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <ClassLoader>
//
//
//------------------------------------------------------------------------ 

class ClassLoader extends AbstractClass
{
//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------- Constantes

	const LOADDIR_RECURSIVE = 'LOADDIR_RECURSIVE';
	const LOADDIR_NOT_RECURSIVE = 'LOADDIR_NOT_RECURSIVE';

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
	public function AdjustDir ( $dir )
	// Mode d'emploi :
	//permet de rajouter un '/' au path si necessaire
	//
	// Retourne :
	//le chemin terminant n�cessairement par /
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
	//charge toutes les classes d'un r�pertoire et agit de
	// mani�re r�cursive si LOADDIR_RECURSIVE est pass� en argument
	//
	// Retourne :
	//- NULL en cas de succ�s
	//- un objet de type Errors en cas d'�chec
	{
		$dir = $this->AdjustDir( $dir );
	
		if ( ! is_dir ( $dir ) )
		{
			$errs = new Errors ();
			
			$errs->Add ( new Error ( 'NOT_DIRECTORY' , $dir.' n\'est pas un r�pertoire.' ) );
			
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
	//charge le r�pertoire d'une classe en tenant compte de la casse ss Linux
	//
	// Retourne :
	//- NULL en cas de succ�s
	//- un objet de type Errors en cas d'�chec
	//
	// Contrat :
	//les classes parentes doivent �tre charg�es
	{	
		$base = $this->classPath . $className . '/' ; // realPath() vire le /

		if ( ! is_dir ( $base ) )
		{
			$errs = new Errors ();
			
			$errs->Add ( new Error ( 'NOT_DIRECTORY' , $base.' n\'est pas un r�pertoire.' ) );
			
			return $errs;
		}
		
		// chargement des Abstracts
		
		$this->loadDir( $base . 'Interfaces', CLASSLOADER::LOADDIR_RECURSIVE ); 
		// le r�pertoire peut ne pas exister => pas de Handle
		
		$this->loadDir( $base . 'Abstracts', CLASSLOADER::LOADDIR_RECURSIVE ); 
		// le r�pertoire peut ne pas exister => pas de Handle
		
		$this->loadDir( $base . 'Errors', CLASSLOADER::LOADDIR_RECURSIVE ); 
		// le r�pertoire peut ne pas exister => pas de Handle
		
		$this->loadDir( $base . 'Iterators', CLASSLOADER::LOADDIR_RECURSIVE ); 
		// le r�pertoire peut ne pas exister => pas de Handle

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
    // r�alise l'instanciation de la classe, par d�faut le r�pertoire 
	//de chargement est le r�pertoire de cette classe
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
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s
	protected $classPath;
}

//-------------------------------- Autres d�finitions d�pendantes de <ClassLoader>

?>

