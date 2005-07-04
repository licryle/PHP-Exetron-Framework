<?

/*************************************************************************\
/*************************** CYRILLE2.FREE.FR ****************************\
/        Source écrit par Cyrille2 en 2004 - Tous droits réservés         \
/*************************************************************************\
/     Ce source est distribué et non donné, i.e. vous pouvez l'utiliser   \
/ et le modifier du moment que les droits d'auteurs sont respectés.       \
/                                                                         \
/     Il est entendu par là que tout programme compilé ayant pour base ce \
/ source doit conserver et afficher le nom de l'auteur original dans le   \
/ programme compilé. De même que toute utilisation partielle ou complete  \
/ de ce source doit être commentée en mentionnant la source et l'auteur.  \
/ En effet, le programme compilé devra afficher, et ce, lisiblement par   \
/ tous, la mention :                                                      \
/     "Contenant une ou des portions de code développées par Cyrille2     \
/      cyrille2@free.fr"                                                  \
/                                                                         \
/ Pour toute information ou demande, cyrille2@free.fr                     \
/                                                                         \
/*************************************************************************/

class QueriesAdvertisement extends MYSQL_connection {
	protected $table;
	protected $banktable;
	protected $MaxModifChamp = Array(
							'pubid'=>'',
							'type'=>'',
							'args'=>'"'
				);

	
	// Corps de la classe
	
	public function QueriesAdvertisement($connexion,$table,$tablebank) {
		$this->MYSQL_connection($connexion);
		$this->table = $table;
		$this->banktable = $tablebank;
	}

	public function install ($tabularaza=0) {
		if ($tabularaza) 
			$this->myquer('DROP TABLE IF EXISTS `'.$this->table.'`');
			
		$req = 'CREATE TABLE `'.$this->table
			.'` (id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT
				, pubid SMALLINT UNSIGNED NOT NULL
				, type SMALLINT NOT NULL
				, args VARCHAR(255)
				, PRIMARY KEY (id)
			)';
			echo $req;
		return ($this->myquer($req) != 0);
	}
	
	
	// Edition

	public function delete($id) {
		$id = intval($id);
		
		$req1 = 'DELETE FROM `'.$this->table.'` WHERE id='.$id;		
		
		return ($this->myquer($req1) != 0);	
	}
	
	public function delByPubId($id) {
		$id = intval($id);
		
		$req1 = 'DELETE FROM `'.$this->table.'` WHERE pubid='.$id;		
		
		return ($this->myquer($req1) != 0);	
	}
	
	// Récupération
	
	public function getAll() {
		$quer = $this->myquer('SELECT assoc.id as id,assoc.pubid as pubid,assoc.type as type,assoc.args as args,bank.photo as photo,bank.url as url,bank.name as name FROM `'.$this->table.'` as assoc, `'.$this->banktable.'` as bank WHERE assoc.pubid=bank.id ORDER BY pubid ASC, type ASC');
		
		return $this->ResToArray($quer);
	}
	
	public function getByType($type,$args) {
		if ($args!=-1) $s = ' AND args="'.$args.'"'; else $s = '';
	
		$quer = $this->myquer('SELECT assoc.id as id,assoc.pubid as pubid,assoc.type as type,assoc.args as args,bank.photo as photo,bank.url as url FROM `'.$this->table.'` as assoc, `'.$this->banktable.'` as bank WHERE  bank.id = assoc.pubid AND assoc.type='.intval($type).$s);

		return $this->ResToArray($quer);
	}
	
	public function itemExists($id) {
		$id = intval($id);
		
		$quer = $this->myquer('SELECT id FROM `'.$this->table.'` WHERE id='.$id);
		
		return ($quer !== 0 && @mysql_num_rows($quer) != 0);
	}
}

?>