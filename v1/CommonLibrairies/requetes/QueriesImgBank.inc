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

class QueriesImgBank extends MYSQL_connection {
	protected $table;
	protected $MaxModifChamp = Array(
							'name'=>'"',
							'photo'=>'"',
							'url'=>'"'
				);

	
	// Corps de la classe
	
	public function QueriesImgBank($connexion,$table) {
		$this->MYSQL_connection($connexion);
		$this->table = $table;
	}

	public function install ($tabularaza=0) {
		if ($tabularaza) 
			$this->myquer('DROP TABLE IF EXISTS `'.$this->table.'`');
			
		$req = 'CREATE TABLE `'.$this->table
			.'` (id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT
				, name VARCHAR(255)
				, photo VARCHAR(255)
				, url VARCHAR(255)
				, downloads INT UNSIGNED DEFAULT 0
				, PRIMARY KEY (id)
			)';
			
		return ($this->myquer($req) != 0);
	}
	
	
	// Edition
	
	public function createArray($row) {
		$req = 'INSERT INTO `'.$this->table.'` SET 
			name = "'.$row['name'].'"
			, photo = "'.$row['photo'].'"
			, url = "'.$row['url'].'"';		
			
		return ($this->myquer($req) != 0);			
	}
	
	public function modif($row) {
		$row['id'] = intval(@$row['id']);
		
		$s = '';
		if (!empty($row['photo']))
			$s .= ', photo="'.$row['photo'].'"';
		
		
		$req2 = 'UPDATE `'.$this->table.'` SET 
			name = "'.$row['name'].'"
			'.$s.'
			, url = "'.$row['url'].'"
			WHERE id='.$row['id'];
	
		return ($this->myquer($req2) != 0);				
	}

	public function delete($id) {
		$id = intval($id);
		
		$req1 = 'DELETE FROM `'.$this->table.'` WHERE id='.$id;		
		
		return ($this->myquer($req1) != 0);	
	}
	
	public function download($id) {
		$id = intval($id);
		
		
		$req1 = 'UPDATE `'.$this->table.'` SET downloads=downloads+1 WHERE id='.$id;
		
		return ($this->myquer($req1) != 0);
	}
	
	// Récupération

	public function getNB() {		
		$quer = $this->myquer(	'SELECT count(id) FROM `'.$this->table.'`');
					
		return $this->ResToFirst($quer);		
	}

	public function getADV($quer) {
		$quer =  $this->myquer($quer);
		
		return $this->ResToArray($quer);	
	}
	
	public function getId($id) {
		$id = intval($id);
		
		$quer = $this->myquer('SELECT * FROM `'.$this->table.'` WHERE id='.$id);

		return $this->ResToArray($quer);	
	}
	
	public function getAll() {
		$quer = $this->myquer('SELECT * FROM `'.$this->table.'` ORDER BY name ASC');
		
		return $this->ResToArray($quer);
	}
	
	public function itemExists($id) {
		$id = intval($id);
		
		$quer = $this->myquer('SELECT id FROM `'.$this->table.'` WHERE id='.$id);
		
		return ($quer !== 0 && @mysql_num_rows($quer) != 0);
	}
	
	// photo
}

?>