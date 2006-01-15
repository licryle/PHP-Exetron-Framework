<?php

/*************************************************************************
                           |Variables.php|  -  description
                             -------------------
    début                : |DATE|
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

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <Variables>
//
//
//------------------------------------------------------------------------ 

class Variables extends AbstractClass implements Iterator
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques

    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveVariables ( )
    // Mode d'emploi :
    //met à jour les éléments Valides de la liste
	//les ajoute si l'IdVariable est inexistant
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction ne renvoie pas d'erreur si un élément n'est pas validé
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
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction écrase les variables de même nom dans son indexation.
	// /!\ à l'ordre d'appel avec LoadSiteVariables
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
    //charge dans l'objet Variables la configuration du site n° $idSite
	//
	// Renvoie :
	//- NULL en cas de réussite
	//- un objet de type Errors si une erreur s'est produite
	//
	// /!\ Cette fonction écrase les variables de même nom dans son indexation.
	// /!\ à l'ordre d'appel avec LoadServerVariables
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
	//permet de récupérer la variable de configuration nommée $varName.
	//
	// Renvoie :
	//- un objet de type Variable en cas de réussite
	//- un objet de type Errors si la variable n'est pas chargée ou n'existe pas
	//
	// Note :
	//Ne pas utiliser le retour pas référence.
	//
	{
		if ( isset ( $this->variables [ $varName ] ) )
		{
			return $this->variables [ $varName ];
		}
		else
		{
			$errors = new Errors ( );
			$errors->Add ( new VariableError ( VariableError::VARIABLE_NOT_LOADED, 'Variable non chargée ou inexistante.' ) );
			
			return $errors;
		}
	} //---- Fin de GetVariableByName
	
	public function SetVariable ( Variable $variable )
	// Mode d'emploi :
	//permet de mettre en mémoire dans l'objet la variable de configuration $variable.
	//
	//Afin de la sauver dans la base de donnée, il est nécessaire d'appeler SaveVariables().
	//
	// Algorithme :
	{

		$this->Add ( $variable );

	} //---- Fin de SetVariable
	
//------------------------------------------- Implémentation de MyIterator

    public function Add( Variable $newVar )
    // Mode d'emploi :
    //Ajoute une variable à la liste
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
    //Remet à zero la liste des variables
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
    
//-----------------------------------------------Implémentation Iterator
    public function Rewind( )
    // Mode d'emploi :
    //Revient au début de la liste
    //
    {
        reset( $this->variables );
    } //--- Fin de Rewind

    public function Current( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne l'élément actuel de la liste
    //
    {
        return current( $this->variables );
    } //---- fin de Current
    
    public function Key( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne le nom de la variable pointée par la liste
    //
    {
        return Key ( $this->variables );
    } //---- Fin de Key
    
    public function Next( )
    // Mode d'emploi  :
    //avance le pointeur de 1 dans la liste
    //
    // Renvoie :
    // le nouvel élément pointé
    //
    {
        return next( $this->variables );
    } //---- Fin de Next
    
    public function Valid( )
    // Mode d'emploi  :
    //
    // Renvoie :
    //retourne vrai ou faux si l'élément est valide
    //
    {
        return $this->current( ) !== false;
    } //---- Fin de Valid

//---------------------------------- Fin de l'implémentation de MyIterator

//-------------------------------------------- Constructeurs - destructeur
    public function __construct( $variableTable, & $errors )
    // Mode d'emploi (constructeur) :
    //instancie une Variables à partir d'un objet de type BDDTableVariables
	//où BDD représente le type de base actuellement à l'emploi
	//
	// Renvoie par référence dans $errors :
	//- un objet de type Errors en cas d'erreur,
	//- NULL si l'opération s'est parfaitement déroulée.
	//
	// Note : 
	//Un objet de type BDDTableVariables est valide dès lors qu'il implémente
	//l'interface TableVariablesInterface et si elle défini les constantes
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
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

	protected $variableTable; // contient une instance de
	// BDDTableVariable permettant l'execution des requetes
	
	protected $variables; // contient les variables de variable
	// sous forme de BDDRecord indexées par leur nom

}

//-------------------------------- Autres définitions dépendantes de <Variables>

?>

