<?php

/*************************************************************************
                           |TableVariable.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <TableVariable> (fichier TableVariable.php) --------------
if (defined('TABLEVARIABLE_H'))
{
    return;
}
else
{

}
define('TABLEVARIABLE_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <TableVariable>
//
//
//------------------------------------------------------------------------ 

class TableVariable
{
//----------------------------------------------------------------- PUBLIC

	const TABLE_COLUMN_IDVARIABLE = 'idvariable';
	// clef primaire identifiant de la var
	
	const TABLE_COLUMN_SCOPE = 'scope';
	// port�e de la donn�e. port�es possibles : TABLE_COLUMN_SCOPE_SITE ou
	//	TABLE_COLUMN_SCOPE_SERVER
	
	// �num�ration TABLE_COLUMN_SCOPE
	
		const TABLE_COLUMN_SCOPE_SITE = 'SITE';
		// la donn�e ne concernera que le site en question.
		// cette port�e pr�value sur l'autre.
		
		const TABLE_COLUMN_SCOPE_SERVER = 'SERVER';
		// la donn�e concernera tous les sites h�berg�s.
		
	// fin de l'�num�ration TABLE_COLUMN_SCOPE
	
	
	const TABLE_COLUMN_ACCESS = 'access';
	// d�fini quels sont les personnes qui peuvent modifier la donn�e

	// �num�ration TABLE_COLUMN_ACCESS
	
		const TABLE_COLUMN_ACCESS_ROOT = 'ROOT';
		// la donn�e ne pourra �tre modifi�e que par les 
		//administrateurs des sites
		
		const TABLE_COLUMN_ACCESS_ADMIN = 'ADMIN';
		// la donn�e pourra �tre modifi�e par les administrateur du site
		
	// fin de l'�num�ration TABLE_COLUMN_ACCESS
	
	const TABLE_COLUMN_NAME = 'name';
	// nom de la donn�e
	
	const TABLE_COLUMN_DATA = 'data';
	// donn�e stock�e �chap�e en addslashes().
	
	const TABLE_COLUMN_IDSITE = 'idsite';
	// clef �trang�re d�finissant le site auquel la donn�e est rattach�e
	

//----------------------------------------------------- M�thodes publiques
    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //
	
//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

}

//-------------------------------- Autres d�finitions d�pendantes de <TableVariable>

?>