<?

/*************************************************************************\
/*************************** CYRILLE2.FREE.FR ****************************\
/        Source �crit par Cyrille2 en 2004 - Tous droits r�serv�s         \
/*************************************************************************\
/     Ce source est distribu� et non donn�, i.e. vous pouvez l'utiliser   \
/ et le modifier du moment que les droits d'auteurs sont respect�s.       \
/                                                                         \
/     Il est entendu par l� que tout programme compil� ayant pour base ce \
/ source doit conserver et afficher le nom de l'auteur original dans le   \
/ programme compil�. De m�me que toute utilisation partielle ou complete  \
/ de ce source doit �tre comment�e en mentionnant la source et l'auteur.  \
/ En effet, le programme compil� devra afficher, et ce, lisiblement par   \
/ tous, la mention :                                                      \
/     "Contenant une ou des portions de code d�velopp�es par Cyrille2     \
/      cyrille2@free.fr"                                                  \
/                                                                         \
/ Pour toute information ou demande, cyrille2@free.fr                     \
/                                                                         \
/*************************************************************************/

class QueriesStatistiques extends MYSQL_connection {
	protected $table;
	protected $MaxModifChamp = Array(
							'ip'=>'"',
							'dns'=>'"',
							'lasttime'=>'',
							'browser'=>'"'
				);

	
	// Corps de la classe
	
	public function QueriesStatistiques($connexion,$table) {
		$this->MYSQL_connection($connexion);
		$this->table = $table;
	}

	public function install ($tabularaza=0) {
		if ($tabularaza) 
			$this->myquer('DROP TABLE IF EXISTS `'.$this->table.'`');
			
		$req = 'CREATE TABLE `'.$this->table
			.'` (id INT UNSIGNED NOT NULL AUTO_INCREMENT
				, ip VARCHAR(255)
				, dns VARCHAR(255)
				, lasttime INT
				, browser VARCHAR(255)
				, PRIMARY KEY (id)
			)';
			
		return ($this->myquer($req) != 0);
	}
	
	
	// R�cup�ration

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
		$quer = $this->myquer('SELECT * FROM `'.$this->table.'` ORDER BY position ASC');
		
		return $this->ResToArray($quer);
	}
	
	public function getVisitor($ip,$addr,$gap) {
		$quer = $this->myquer('SELECT * FROM `'.$this->table.'` WHERE ip="'.$ip.'" AND dns="'.$addr.'" AND lasttime >= '.(time()-intval($gap)*60));

		return $this->ResToArray($quer);
	}
	
	public function visitorExists($ip,$addr,$gap) {
		return ($this->getVisitor($ip,$addr,$gap) != 0);
	}
	
	public function itemExists($id) {
		$id = intval($id);
		
		$quer = $this->myquer('SELECT id FROM `'.$this->table.'` WHERE id='.$id);
		
		return ($quer !== 0 && @mysql_num_rows($quer) != 0);
	}
}

?>