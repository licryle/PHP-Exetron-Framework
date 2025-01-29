<?php

/*************************************************************************
                           |Variables.php|  -  description
                             -------------------
    d�but                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <Variables> (fichier Variables.php) --------------
if (defined('VARIABLES_H'))
{
    return;
}
else
{

}
define('VARIABLES_H',1);

//-------------------------------------------------------- Include syst�me

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// R�le de la classe <Variables>
//
//
//------------------------------------------------------------------------ 

class Variables extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- M�thodes publiques

    // public function M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveVariables ( )
    // Mode d'emploi :
    //met � jour les �l�ments Valides de la liste
	//les ajoute si l'IdVariable est inexistant
	//
	// Renvoie :
	//- NULL en cas de r�ussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un �l�ment n'est pas valid�
	//elle n'en tient simplement pas compte dans son traitement.
	//
    // Contrat :
    //
	{		
		foreach ( $this->variables as $variable )
		{
			if ( $variable->IsValid() )
			{
				if ( $this->variableTable->IdVariableExists ( $variable->GetProperty( TableVariable::TABLE_COLUMN_IDVARIABLE ) ) )
				{
					if ( ( $errs = $this->variableTable->UpdateVariable( $variable )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->variableTable->InsertVariable( $variable) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- Fin de SaveVariables
	

    public function LoadServerVariables ( )
    // Mode d'emploi :
    //charge dans l'objet Variables la configuration du serveur
	//
	// Renvoie :
	//- NULL en cas de r�ussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction �crase les variables de m�me nom dans son indexation.
	// /!\ � l'ordre d'appel avec LoadSiteVariables
	//
    // Contrat :
    //
	{
		$conf = & $this->variableTable->SelectServerVariables( );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}
		
		foreach ( $conf as $variable )
		{
			$this->Add ( new Variable ( $variable ) );
		}
		
		return NULL;
	} //---- Fin de LoadServerVariables

    public function LoadSiteVariables ( $idSite )
    // Mode d'emploi :
    //charge dans l'objet Variables la configuration du site n� $idSite
	//
	// Renvoie :
	//- NULL en cas de r�ussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction �crase les variables de m�me nom dans son indexation.
	// /!\ � l'ordre d'appel avec LoadServerVariables
	//
    // Contrat :
    //
	{
		$conf = & $this->variableTable->SelectSiteVariables( $idSite );
		
		if ( $conf instanceOf Errors )
		{
			return $conf;
		}
		
		foreach ( $conf as $variable )
		{
			$this->Add ( new Variable ( $variable ) );
		}
		
		return NULL;
	} //---- Fin de LoadSiteVariables
	
	public function GetVariableByName ( $varName )
	// Mode d'emploi :
	//permet de r�cup�rer la variable de configuration nomm�e $varName.
	//
	// Renvoie :
	//- un objet de type Variable en cas de r�ussite
	//- un objet de type Errors si la variable n'est pas charg�e ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas r�f�rence.
	//
	{
		if ( isset ( $this->variables [ $varName ] ) )
		{
			return $this->variables [ $varName ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new VariableError ( VariableError::VARIABLE_NOT_LOADED, 'Variable non charg�e ou inexistante.' ) );
			
			return $errors;
		}
	} //---- Fin de GetVariableByName
	
	public function SetVariable ( Variable $variable )
	// Mode d'emploi :
	//permet de mettre en m�moire dans l'objet la variable de configuration $variable.
	//
	//Afin de la sauver dans la base de donn�e, il est n�cessaire d'appeler SaveVariables().
	//
	// Algorithme :
	{

		$this->Add ( $variable );

	} //---- Fin de SetVariable
	
//------------------------------------------- Impl�mentation de MyIterator

    public function Add( Variable $newVar )
    // Mode d'emploi :
    //Ajoute une variable � la liste
    //
    {
		$key = $newVar->GetProperty ( TableVariable::TABLE_COLUMN_NAME );
	
		if ( empty ( $key ) )
		{
			$this->variables [] = $newVar;		
		}
		else
		{
			$this->variables [ $key ] = $newVar;
		}
    } //---- Fin de Add

    public function DelAll( )
    // Mode d'emploi :
    //Remet � zero la liste des variables
    //
    {
        unset($this->variables);
        
        $this->variables = array();
    } //---- Fin de DelAll

    public function GetCount( )
    // Mode d'emploi :
    //retourne le nombre de variables contenues dans la liste
    //
    // Renvoie :
    //le nombre d'erreurs contenues
    {
        return count( $this->variables );
    } //---- Fin de GetCount
    
//-----------------------------------------------Impl�mentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au d�but de la liste
    //
    {
        reset( $this->variables );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'�l�ment actuel de la liste
    //
    {
        return current( $this->variables );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le nom de la variable point�e par la liste
    //
    {
        return Key ( $this->variables );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel �l�ment point�
    //
    {
        return next( $this->variables );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'�l�ment est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid

//---------------------------------- Fin de l'impl�mentation de MyIterator

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $variableTable, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie une Variables � partir d'un objet de type BDDTableVariables
	//o� BDD repr�sente le type de base actuellement � l'emploi
	//
	// Renvoie par r�f�rence dans $errors :
	//- un objet de type Errors en cas d'erreur,
	//- NULL si l'op�ration s'est parfaitement d�roul�e.
	//
	// Note : 
	//Un objet de type BDDTableVariables est valide d�s lors qu'il impl�mente
	//l'interface TableVariablesInterface et si elle d�fini les constantes
	//de structure de la table.
	//
    // Contrat :
    //
    {
		$errors = NULL;
		
    	if ( ! @in_array( 'TableVariableInterface', class_implements ( $variableTable ) ) )
		{
			$errors = new Errors ( );
			$errors->Add( new BDDError ( BDDError::TABLE_CLASS_INCORRECT , 'Cet objet n\'est pas une instance de Table Variable correcte.' ) );
		}
		
		$this->variableTable = $variableTable;
		$this->variables = array();
		
    } //---- Fin du constructeur


    public function __destruct ( )
    // Mode d'emploi :
    //
    // Contrat :
    //
    {
    } //---- Fin du destructeur
    
//------------------------------------------------------ M�thodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- M�thodes prot�g�es
    // protected type M�thode ( liste des param�tres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs prot�g�s

	protected $variableTable; // contient une instance de
	// BDDTableVariable permettant l'execution des requetes
	
	protected $variables; // contient les variables de variable
	// sous forme de BDDRecord index�es par leur nom

}

//-------------------------------- Autres d�finitions d�pendantes de <Variables>

?>

