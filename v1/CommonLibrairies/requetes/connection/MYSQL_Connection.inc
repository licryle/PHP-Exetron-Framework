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

define('UNCONVENTIONAL',-1);
define('NOT_CARDINAL',0);
define('CARDINAL',1);
define('BOOLEAN',2);

class MYSQL_Connection {
	private $errormsg = '';
	protected $connexion = NULL;
	private $requetes = 0;
	
	private function getNbRequets() {
		return $this->requetes;
	}
	
	function MYSQL_Connection($connexion) {
		$this->connexion = $connexion;
		
		if ( ($this->connexion['host'] != '') && ($this->connexion['db'] != '') ) {			
			$this->errormsg = '';
			$this->connexion['connexion'] = @mysql_connect($this->connexion['host'],$this->connexion['user'],$this->connexion['pass']) or ($this->errormsg .= 'Connexion MYSQL Impossible :'.mysql_error());
			
			@mysql_select_db($this->connexion['db'],$this->connexion['connexion']) or ($this->errormsg .= 'Choix de bbd impossible :'.mysql_error());

			if (!empty($this->errormsg) && $this->connexion['exitonfailure']) die($this->errormsg);

			return (empty($this->errormsg));
		}
	}
	
	public function tableExists() {
		$res = $this->myquer('SHOW TABLES FROM '.$this->connexion['db']);
		$arr = $this->resToArray($res);
		
		foreach($arr as $val) {
			if ($this->table == $val[0]) return 1;
		}
		
		return 0;
	}
	
	public function myquer($quer) {
		$ref = @mysql_query($quer,$this->connexion['connexion']) or ($ref = 0);
		
		if ($this->connexion['debug']) echo $quer.'<br />';

		if ($ref === 0) {
			$this->addError(mysql_error());
			return 0;
		}
		else
		{
			++$this->requetes;
		
			return $ref; 
		}
	}
	
	protected function cardinalToString($value,$card) {
		switch($card) {
			case UNCONVENTIONAL:
				return $value;
			
			case BOOLEAN:
				return ($value?'1':'0');
			
			case CARDINAL:
				return intval($value);
			
			case NOT_CARDINAL:
				return '"'.$value.'"';
			
			default :
				return '';
		}
	}
	
	// Traitement primaire
	public function ResToArray($res) {
		if ($res === 0) {
			$this->addError('Requete erronée : '.$this->errormsg);

			return 0;
		}
		
		$i = 0;
		$row = array();		
		while ($tmp = @mysql_fetch_array($res)) { $row[$i] = $tmp; ++$i; }

		if (count($row) == 0) {
			$this->addError('Aucun résultat');			
			
			return 0;
		}
		else
		{
			return $row;
		}
	}
	
	protected function ResToFirst($res) {
		if ($res === 0) return 0;
		
		$res = mysql_fetch_array($res);
		
		return $res[0];	
	}
	
	// Gestion des erreurs
	
	
	public function getError() {
		return $this->errormsg;
	}
	
	public function cleanError() {
		$this->errormsg = '';
	}
	
	public function isCleanError() {
		return ($this->errormsg == '');
	}
	
	protected function setError($err) {
		$this->errormsg = $err;
	}
	
	protected function addError($err) {
		$this->errormsg .= $err.'<br />';
	}
	
	
	
	
	// Récupération primaires
	public function getADV($quer) {
		$quer =  $this->myquer($quer);
		
		return $this->ResToArray($quer);	
	}
	
	
	public function getValue($colget,$colgive,$valuegive,$cardinal,$wrongvalue=0) {
		$s = $this->cardinalToString($valuegive,$cardinal);

		$quer = $this->myquer('SELECT '.$colget.' FROM `'.$this->table.'` WHERE `'.$this->table.'`.`'.$colgive.'`='.$s);
		
		if ($quer === 0 || @mysql_num_rows($quer) === 0) return $wrongvalue;
		
		return $this->ResToFirst($quer);
	}
	
	protected function getRow($colgive,$valuegive,$cardinal,$wrongvalue=0) {
		$s = $this->cardinalToString($valuegive,$cardinal);
		
		$quer = $this->myquer('SELECT * FROM `'.$this->table.'` WHERE `'.$this->table.'`.'.$colgive.'='.$s);

		if ($quer === 0 || @mysql_num_rows($quer) == 0) return $wrongvalue;
		
		return $this->ResToArray($quer);
	}
	
	public function getId($id) {
		return $this->getRow('id',$id,CARDINAL);
	}
	
	public function itemExists($id) {
		return ($this->getValue('id','id',$id,CARDINAL,0) != 0);
	}
	
	public function getAll($col='',$order='ASC',$limitstart=0,$limitend=0) {
		$ord = '';
		if (!empty($col))
			$ord = ' ORDER BY `'.$col.'` '.$order;
			
		$lim = '';
		if ($limitend!=0)
			$lim = ' LIMIT '.intval($limitstart).','.intval($limitend);
		
		$req = 'SELECT * FROM `'.$this->table.'`'.$ord.$lim;
		
		$quer = $this->myquer($req);
		
		return $this->ResToArray($quer);
	}
	
	public function getByEqual($colgive,$valuegive,$cardinalgive,$colorder='',$order='ASC',$limitstart=0,$limitend=0) {
		$ord = '';
		if (!empty($colorder))
			$ord = ' ORDER BY '.$colorder.' '.$order;
		
		$lim = '';
		if ($limitend!=0)
			$lim = ' LIMIT '.intval($limitstart).','.intval($limitend);
			
		$s = $this->cardinalToString($valuegive,$cardinalgive);
		
		$req = 'SELECT * FROM `'.$this->table.'` WHERE `'.$colgive.'`='.$s.$ord.$lim;
		
		$quer = $this->myquer($req);
		
		return $this->ResToArray($quer);		
	}
	
	public function getByLike($colgive,$valuegive,$cardinalgive,$colorder='',$order='ASC',$limitstart=0,$limitend=0) {
		$ord = '';
		if (!empty($colorder))
			$ord = ' ORDER BY `'.$colorder.'` '.$order;
		
		$lim = '';
		if ($limitend!=0)
			$lim = ' LIMIT '.intval($limitstart).','.intval($limitend);
			
		$s = $this->cardinalToString($valuegive,$cardinalgive);
		
		$req = 'SELECT * FROM `'.$this->table.'` WHERE `'.$colgive.'` LIKE '.$s.$ord.$lim;
		
		$quer = $this->myquer($req);
		
		return $this->ResToArray($quer);		
	}
	
	// Edition
	
	protected function setValue($colset,$valueset,$cardinalset,$colgive,$valuegive,$cardinalgive) {
		$s = $this->cardinalToString($valueset,$cardinalset);
		$s2 = $this->cardinalToString($valuegive,$cardinalgive);
		
		$quer = $this->myquer('UPDATE `'.$this->table.'` SET `'.$colset.'`='.$s.' WHERE `'.$this->table.'`.`'.$colgive.'`='.$s2);

		return $quer;
	}
	
	public function ModifArrayById($row) {		
		$s = '';
		
		foreach($row as $champ => $value) {
			if (isset($this->MaxModifChamp[$champ])) { 
				$separator = $this->MaxModifChamp[$champ];
				
				// sécu
				if ($separator == '')
					$value = intval($value);
				else
					$value = $value;
				
				$s .= $champ.'='.$separator.$value.$separator.',';
			}
		}
			
		$s = substr($s,0,-1);
		
		$req = 'UPDATE `'.$this->table.'` SET '.$s.' WHERE id='.$row['id'];
		
		return $this->myquer($req);		
	}
	
	
	protected function del($colgive,$valuegive,$cardinal) {
		$s = $this->cardinalToString($valuegive,$cardinal);
			
		$quer = 'DELETE FROM `'.$this->table.'` WHERE `'.$this->table.'`.`'.$colgive.'`='.$s;
							
		return $this->myquer($quer);
	}

	// Ajout
	
	protected function add($row) {
		$s = '';
		
		foreach($row as $champ => $value) {
			if (isset($this->MaxModifChamp[$champ])) {
				$separator = $this->MaxModifChamp[$champ];
				
				// sécu
				if ($separator == '')
					$value = intval($value);
				else
					$value = $value;
				
				$s .= $champ.'='.$separator.$value.$separator.',';
			}
		}
			
		$s = substr($s,0,-1); // pour enlever la dernière , inutile
		
		$req = 'INSERT INTO `'.$this->table.'` SET '.$s;

		return $this->myquer($req);	
	}
}
// Fin Fonctions Principales


?>