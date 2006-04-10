<?php

/*************************************************************************
                           |MySQLTableUser.php|  -  description
                             -------------------
    début                : |DATE|
    copyright            : (C) 2005 par BERLIAT Cyrille
    e-mail               : cyrille.berliat@free.fr
*************************************************************************/

//---------- Interface de la classe <MySQLTableUser> (fichier MySQLTableUser.php) --------------
if (defined('MYSQLTABLEUSER_H'))
{
    return;
}
else
{

}
define('MYSQLTABLEUSER_H',1);

//-------------------------------------------------------- Include système

//------------------------------------------------------ Include personnel

//------------------------------------------------------------- Constantes

//----------------------------------------------------------------- PUBLIC

//------------------------------------------------------------------ Types 

//------------------------------------------------------------------------ 
// Rôle de la classe <MySQLTableUser>
//
//
//------------------------------------------------------------------------ 

class MySQLTableUser extends MySQLTable
{
//----------------------------------------------------------------- PUBLIC

//----------------------------------------------------- Méthodes publiques
    // public function Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

    public function SaveUsers ( Users $users )
    // Mode d'emploi :
    //met à jour les éléments Valides de la liste
	//les ajoute si l'IdUser est inexistant
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
		foreach ( $users as $user )
		{
			if ( $user->IsValid() )
			{
				if ( $this->IdUserExists ( $user->GetProperty( TableUser::TABLE_COLUMN_IDUSER ) ) )
				{
					if ( ( $errs = $this->UpdateUserByIdUser ( $user )) InstanceOf Errors )
					{
						return $errs;
					}
				}
				else
				{
					if ( ( $errs = $this->InsertUser( $user) ) InstanceOf Errors )
					{
						return $errs;
					}
				}
			}
		}
		
		return NULL;
	} //---- Fin de SaveUsers

	public function SelectUsers ()
    // Mode d'emploi :
	//permet de récupérer l'ensemble des utilisateurs.
	//
    // Renvoie :
	//- l'ensemble des users sous forme d'objets User dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		$result = $this->Select ( MySQLTABLE::TABLE_COLUMN_ALL , '' );
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}
	} //---- Fin de SelectUsers
	
	
	public function SelectUserByIdUser ( $idUser )
    // Mode d'emploi :
	//permet de sélectionner l'utilisateur d'id $idUser.
	//
	// Renvoie :
    //- l'users d'id $idUser dans un objet de type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_IDUSER.MySQLTABLE::MYSQL_SEEK_STRICT.intval($idUser)
				);
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}	
	} //---- Fin de SelectUserByIdUser
	
	public function SelectUsersByIdGroup ( $idGroup )
    // Mode d'emploi :
	//permet de sélectionner les utilisateurs appartenant au groupe d'id $idGroup.
	//
	// Renvoie :
    //- l'ensemble des utilisateurs appartenant au groupe d'id $idGroup dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_IDGROUP.MySQLTABLE::MYSQL_SEEK_STRICT.intval($idGroup)
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}
	} //---- Fin de SelectUsersByIdGroup
	
	public function FindUsersByName ( $userName )
    // Mode d'emploi :
	//permet de sélectionner l'ensemble des users de nom $userName.
	//Il est possible ici d'utiliser les caractères magiques BDD_SEEK_MULTICHARS et BDD_SEEK_ANYCHAR
	//
	// Renvoie :
    //- l'ensemble des users de nom $username dans un objet de 
	//type BDDRecordSet en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	//
	{
		$result = $this->Select ( TABLE_COLUMN_ALL ,
						MySQLTABLE::MYSQL_CLAUSE_WHERE.
								TableUser::TABLE_COLUMN_NAME.MySQLTABLE::MYSQL_SEEK_REGEX.MySQLTABLE::MYSQL_SEEK_SEPARATOR. addslashes($userName).MySQLTABLE::MYSQL_SEEK_SEPARATOR
				);	
		
		if ( $result InstanceOf Errors )
		{
			return $result;
		}
		else
		{
			return new Users ( $result );
		}
	} //---- Fin de FindUsersByName
	
	public function UpdateUserByIdUser ( User $new )
    // Mode d'emploi :
	//permet de mettre à jour une user en fonction de sa propriété
	// TABLE_COLUMN_IDUSER (clef primaire)
	//
	// Renvoie :
    //- NULL en cas de réussite,
	//- un objet de type Errors sinon
	//
    // Contrat :
	{
		if ( ! $new->isValid( ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_NOT_VALID, 'Enregistrement de User non validé, merci de le valider avant de lancer une mise à jour') ) ;
			
			return $errors;
		}

		// record validé, update si existance de l'ancien.
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableUser::TABLE_COLUMN_IDUSER . MySQLTable::MYSQL_SEEK_STRICT . intval( $new->GetProperty ( TableUser::TABLE_COLUMN_IDUSER ) );
		
		if ( ! ($res = $this->IdUserExists( intval ($new->GetProperty ( TableUser::TABLE_COLUMN_IDUSER ) )) ) )
		{
			$errors = new Errors ( );
			$errors->Add ( new BDDError ( BDDError::RECORD_UPDATE_DOESNT_EXIST, 'Impossible de mettre à jour un enregistrement inexistant.') ) ;
				
			return $errors;
		}
		
		return $this->Update( $new, $clauses );
	} //---- Fin de UpdateUserByIdUser
	
	public function InsertUser ( User $user )
    // Mode d'emploi :
	//permet d'ajouter un nouvel user à l'aide d'un BDDRecord contenant
	//l'ensemble des valeurs des champs.
	//
	// Renvoie :
	//- un objet de type Errors en cas d'erreur,
	//- NULL en cas de réussite.
	//
	// Contrat :
	{
		return $this->Insert ( $user );
	} //---- Fin de InsertUser
	
	public function IdUserExists ( $idUser )
    // Mode d'emploi :
	//permet de connaitre si l'$idUser existe dans la table
	//
	// Renvoie :
	//- true si $idUser est présent,
	//- false sinon.
	//
	// Contrat :
	{
		$clauses = MySQLTable::MYSQL_CLAUSE_WHERE . TableUser::TABLE_COLUMN_IDUSER . MySQLTable::MYSQL_SEEK_STRICT . intval( $idUser );
		
		$res = $this->Select( TableUser::TABLE_COLUMN_IDUSER, $clauses);

		return (! ($res InstanceOf Errors || $res->GetCount() == 0 ) );
	} //---- Fin de IdUserExists
	
//-------------------------------------------- Constructeurs - destructeur
    
//------------------------------------------------------ Méthodes Magiques

//------------------------------------------------------------------ PRIVE 

//----------------------------------------------------- Méthodes protégées
    // protected type Méthode ( liste des paramètres );
    // Mode d'emploi :
    //
    // Contrat :
    //

//----------------------------------------------------- Attributs protégés

}

//-------------------------------- Autres définitions dépendantes de <MySQLTableUser>

?>