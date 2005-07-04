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

class QueriesPhototheque extends MYSQL_connection {
	protected $table;
	protected $MaxModifChamp = Array(
							'name'=>'"',
							'position'=>'',
							'is_cat'=>'',
							'description'=>'"',
							'photo'=>'"',
							'file'=>'"'
				);

	
	// Corps de la classe
	
	public function QueriesPhototheque($connexion,$table) {
		$this->MYSQL_connection($connexion);
		$this->table = $table;
	}

	public function install ($tabularaza=0) {
		if ($tabularaza) 
			$this->myquer('DROP TABLE IF EXISTS `'.$this->table.'`');
			
		$req = 'CREATE TABLE `'.$this->table
			.'` (id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT
				, name VARCHAR(255)
				, position SMALLINT
				, is_cat BOOL
				, description TEXT
				, photo VARCHAR(255)
				, mini VARCHAR(255)
				, downloads INT UNSIGNED DEFAULT 0
				, PRIMARY KEY (id)
			)';
			
		return ($this->myquer($req) != 0);
	}
	
	
	// Edition
	
	public function createArray($row) {
		$row['position'] = intval($row['position']);
		$row['is_cat'] = (@$row['is_cat'])?1:0;
		
		$req0 = 'UPDATE `'.$this->table.'` SET position=position+1 WHERE position >= '.$row['position'];
			
		$req = 'INSERT INTO `'.$this->table.'` SET 
			name = "'.$row['name'].'"
			, photo = "'.$row['photo'].'"
			, mini = "'.$row['mini'].'"
			, position = '.$row['position'].'
			, is_cat = '.$row['is_cat'].'
			, description = "'.$row['description'].'"';		
			
		return (($this->myquer($req0) != 0) && ($this->myquer($req) != 0));			
	}
	
	public function modif($row) {
		$row['position'] = intval(@$row['position']);
		$row['id'] = intval(@$row['id']);
		
		$s = '';
		if (!empty($row['photo']))
			$s .= ', photo="'.$row['photo'].'"';
			
		if (!empty($row['mini']))
			$s .= ', mini="'.$row['mini'].'"';
		
		$okreq1 = 1;
		if ($row['position'] > 0) {
			$lastpos = $this->getId_Pos($row['id']);
		
			if ($lastpos == 0) return 0;
		
			if ($lastpos < $row['position'])
				// nouvelle plus grande, on descend l'élément
				$req1 = 'UPDATE `'.$this->table.'` SET position=position-1 WHERE position > '.$lastpos.' AND WHERE position <= '.$row['position'];
			else
				// nouvelle plus petite, on monte l'élément
				$req1 = 'UPDATE `'.$this->table.'` SET position=position+1 WHERE position >= '.$row['position'].' AND WHERE position < '.$lastpos;
				
			$s .= ', position = '.$row['position'];
			
			$okreq1 = ($this->myquer($req1) != 0);
		}
		
		if (@$row['is_cat'] != -1) {
			$row['is_cat'] = (@$row['is_cat'])?1:0;
			
			$s .= ', is_cat = '.$row['is_cat'];
		}
		
		
		$req2 = 'UPDATE `'.$this->table.'` SET 
			name = "'.$row['name'].'"
			'.$s.'
			, description = "'.$row['description'].'"
			WHERE id='.$row['id'];
	
		return ( $okreq1 && ($this->myquer($req2) != 0) );				
	}

	public function delete($id) {
		$id = intval($id);
		
		$lastpos = $this->getId_Pos($id);
		
		$req1 = 'DELETE FROM `'.$this->table.'` WHERE id='.$id;
		
		$req2 = 'UPDATE `'.$this->table.'` SET position=position-1 WHERE position > '.$lastpos;
		
		
		return (($lastpos != 0) && ($this->myquer($req1) != 0) && ($this->myquer($req2) != 0) );	
	}
	
	public function download($id) {
		$id = intval($id);
		
		
		$req1 = 'UPDATE `'.$this->table.'` SET downloads=downloads+1 WHERE id='.$id;
		
		return ($this->myquer($req1) != 0);
	}
	
	public function getmini($id) {
		$id = intval($id);
		
		
		$req1 = 'SELECT mini FROM `'.$this->table.'` WHERE id='.$id;
		
		$res = $this->myquer($req1);
		
		return $this->ResToFirst($res);
	}
	
	public function putItem_Up($id) {
		$id = intval($id);
		
		$lastpos = $this->getId_Pos($id);
		
		$req1 = 'UPDATE `'.$this->table.'` SET position=position+1 WHERE position = '.($lastpos-1);
		$req2 = 'UPDATE `'.$this->table.'` SET position=position-1 WHERE id = '.$id.' AND position > 1';
		
		return (($lastpos != 0) && ($this->myquer($req1) != 0) && ($this->myquer($req2) != 0) );	
	}
	
	public function putItem_Down($id) {
		$id = intval($id);
		
		$lastpos = $this->getId_Pos($id);
		
		$req1 = 'UPDATE `'.$this->table.'` SET position=position-1 WHERE position = '.($lastpos+1);
		$req2 = 'UPDATE `'.$this->table.'` SET position=position+1 WHERE id = '.$id.' AND position < '.$this->getNB();
		
		return (($lastpos != 0) && ($this->myquer($req1) != 0) && ($this->myquer($req2) != 0) );	
	}
	
	public function setCat($is_cat) {
		$is_cat = ($is_cat)?1:0;
		
		$req2 = 'UPDATE `'.$this->table.'` SET is_cat='.$is_cat.' WHERE id = '.$id;
		
		return (($this->myquer($req2) != 0) );			
	}
	
	// Récupération
	
	public function getId_Pos($id) {
		$req0 = 'SELECT position FROM `'.$this->table.'` WHERE id='.$id;
		
		$res0 = $this->myquer($req0);
		
		return $this->ResToFirst($res0);
	}

	public function getNB() {		
		$quer = $this->myquer(	'SELECT count(id) FROM `'.$this->table.'`');
					
		return $this->ResToFirst($quer);		
	}

	public function getNB_Cats() {
		
		$quer = $this->myquer(	'SELECT count(id) FROM `'.$this->table.'` WHERE is_cat=1');
					
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
	
	public function get_All() {
		$quer = $this->myquer('SELECT * FROM `'.$this->table.'` ORDER BY position ASC');
		
		return $this->ResToArray($quer);
	}
	
	public function get_Cats() {
		$quer = $this->myquer('SELECT * FROM `'.$this->table.'` WHERE is_cat=1 ORDER BY position ASC');
		
		return $this->ResToArray($quer);
	}
	
	public function getCat_Next($pos) {
		$pos = intval($pos);
		
		$quer = $this->myquer('SELECT position FROM `'.$this->table.'`	WHERE position > '.$pos.' AND is_cat=1 ORDER BY position ASC LIMIT 0,1');
		
		return $this->ResToFirst($quer);		
	}
	
	public function get_Cat($cat) {
		$cat = intval($cat);
		
		$pos = $this->getId_Pos($cat);
		$next = $this->getCat_Next($pos);
		
		if ($pos == 0) return 0;
		
		if ($next == 0) $next = 0xFFFFFF;
		$quer = $this->myquer('SELECT * FROM `'.$this->table.'` WHERE (position >= '.$pos.' AND position < '.$next.') ORDER BY position ASC');
		
		return $this->ResToArray($quer);
	}

	public function get_Cat_Page($cat,$first,$nb) {
		$cat = intval($cat);
		
		$quer0 = $this->getId($cat);
		$cata = $this->ResToArray($quer0);
		$pos = @$cata[0]['position'];
		$next = $this->getCat_Next($pos);
		
		if ($pos == 0) return 0;
		
		if ($next == 0) $next = 0xFFFFFF;
		$quer = $this->myquer('SELECT * FROM `'.$this->table.'` WHERE (position > '.$pos.' AND position < '.$next.') ORDER BY position ASC');
		
		$items = $this->ResToArray($quer);
		
		$result = Array();
		$result[0] = $cata;
		
		for($i = 0; $i < count($items); ++$i)
			$result[$i+1] = $items[$i];
			
		return $result;
	}

	public function getCat_NB($cat=0) {
		$cat = intval($cat);
					$cat = intval($cat);
		
		$pos = $this->getId_Pos($cat);
		$next = $this->getCat_Next($pos);
		
		if ($pos == 0) return 0;
		
		if ($next == 0) $next = 0xFFFFFF;
		
		$quer = $this->myquer(	'SELECT count(id) FROM `'.$this->table.'` WHERE (position >= '.$pos.' AND position < '.$next.')');
					
		return $this->ResToFirst($quer);		
	}
	
	public function get_IdByCat($cat) {		
		$req2 = 'SELECT id FROM `'.$this->table.'` WHERE name="'.$cat.'"';
		
		$res = $this->myquer($req2);
		
		return $this->ResToFirst($res);			
	}
	
	public function itemExists($id) {
		$id = intval($id);
		
		$quer = $this->myquer('SELECT id FROM `'.$this->table.'` WHERE id='.$id);
		
		return ($quer !== 0 && @mysql_num_rows($quer) != 0);
	}
	
	public function is_Cat($id) {
		$id = intval($id);
		
		$req2 = 'SELECT is_cat FROM `'.$this->table.'` WHERE id='.$id;
		
		$res = $this->myquer($req2);
		
		return (($res != 0) && $this->ResToFirst($res));			
	}
	
	public function is_Cat_s($cat) {		
		$req2 = 'SELECT is_cat FROM `'.$this->table.'` WHERE name="'.$cat.'"';
		
		$res = $this->myquer($req2);
		
		return (($res != 0) && $this->ResToFirst($res));			
	}
	
	// photo
	
	public function delPhoto($id) {
		$id = intval($id);
		
		$quer = $this->myquer('UPDATE `'.$this->table.'` SET photo="" WHERE id='.$id);

		return ($quer !== 0);
	}
	
	public function delmini($id) {
		$id = intval($id);
		
		$quer = $this->myquer('UPDATE `'.$this->table.'` SET mini="" WHERE id='.$id);

		return ($quer !== 0);			
	}
}

?>