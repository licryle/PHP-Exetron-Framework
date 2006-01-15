<?

/*************************************************************************\
/*************************** CYRILLE2.FREE.FR ****************************\
/        Source écrit par Cyrille2 en 2005 - Tous droits réservés         \
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

class Phototheque extends QueriesPhototheque {
	private $nbppage;
	private $first;
	
	private $photo_path_ext;
	private $photo_path_int;
	
	private $mini_path_int;
	private $mini_path_ext;
	
	private $mini_max_width;
	private $mini_max_height;
	
	private $item = array();
	
	public function __construct($connexion,$table='Content') {
		parent::QueriesPhototheque($connexion,$table);
		
		if (!function_exists('imagecreatetruecolor')) die('Librairie GD2 non installée');
		
		$this->nbppage=10;
		$this->first=0;
		
		$this->photo_path_ext='';
		$this->photo_path_int='';
		
		$this->mini_path_int='';
		$this->mini_path_ext='';	

		$this->mini_max_width = 100;
		$this->mini_max_height = 100;
	}
	
	
	// Configs
	
	public function setNbPerPage ($n) {
		$this->nbppage = intval($n); 
	}
	
	public function setFirst ($f) {
		$this->first = intval($f); 
	}
	
	
	public function setPhoto_Path_Int ($path) {
		$this->photo_path_int = $path;
		
		
		if (!file_exists($path)) {
			if (!@mkdir($path,0777))
				$this->addError('Impossible de créer le répertoire de photos');
		}
		
		if (function_exists('chmod')) @chmod($path,0777);
	}
	
	public function setPhoto_Path_Ext ($path) {
		$this->photo_path_ext = $path;
	}
	
	public function setMini_Path_Int ($path) {
		$this->mini_path_int = $path;
		
		if (!file_exists($path)) {
			if (!@mkdir($path,0777))
				$this->addError('Impossible de créer le répertoire de fichiers');
		}
		
		if (function_exists('chmod')) @chmod($path,0777);
	}
	
	public function setMini_Path_Ext ($path) {
		$this->mini_path_ext = $path;
	}
	
	public function setMini_max_height($m) {
		$this->mini_max_height = intval($m);
	}
	
	public function setMini_max_width($m) {
		$this->mini_max_width = intval($m);
	}
	// Validation	
	
	private function transfertPhoto($photo,$filename) {
		
		if (!empty($filename) && empty($photo)) { // upload échoué == fichier trop gros
			$this->addError('Fichier trop important.');
			
			$max = @ini_get('upload_max_filesize');
			if (!empty($max)) {
				$this->addError('Taile maximale autorisée par la configuration serveur : '.$max);				
			}

			return 0;
		}
		
		if ($photo != '') {
			$infos = pathinfo($filename);
			
			$filename = time().'_'.rand().'.'.$infos['extension'];
			
			$filename = eregi_replace('[ \?\!\\]','',$filename);
			
			if (!move_uploaded_file($photo,$this->photo_path_int.$filename)) {
				$this->addError('Echec du transfert de la photo');
				
				return 0;
			}
			else
			{
				if (!getimagesize($this->photo_path_int.$filename)) { 
					$this->addError('Image non-valide');
				
					unlink($this->photo_path_int.$filename);
					return 0;
				}
			}

			
			$photo = $filename;
		}
		
		return $photo;
	}
	
	private function createMiniature($photo) {
			//calul des dimensions
			$size = getimagesize($this->photo_path_int.$photo);
			
			if (@$size[1]/$this->mini_max_height > @$size[0]/$this->mini_max_width) { // au cas ou /0...
				$height = $this->mini_max_height;
				$width = @$size[0]*$this->mini_max_height/$size[1];
			}
			else
			{
				$width = $this->mini_max_width;
				$height = @$size[1]*$this->mini_max_width/$size[0];
			}
			
			$rmini = @imagecreatetruecolor($width,$height) or $this->addError('Impossible de créer la miniature');
			
			if (! ( 
						($rphoto =@imagecreatefromjpeg($this->photo_path_int.$photo))
					|| 
						($rphoto =@imagecreatefromgif($this->photo_path_int.$photo))
					|| 
						($rphoto =@imagecreatefrompng($this->photo_path_int.$photo))
					|| 
						($rphoto =@imagecreatefromwbmp($this->photo_path_int.$photo))
					|| 
						($rphoto =@imagecreatefromxbm($this->photo_path_int.$photo))
					|| 
						($rphoto =@imagecreatefromxpm($this->photo_path_int.$photo))
					)) {
				$this->addError('Impossible d\'extraire la photo');
			}
			else
			{
				if (!imagecopyresampled($rmini,$rphoto,0,0,0,0,$width,$height,$size[0],$size[1])) {
					$this->addError('Impossible de dimensionner la miniature');
					return '';
				}
			}
			

			
			// récupération
			ob_start();   	
				imagejpeg($rmini);
				$mini = ob_get_contents();
   			ob_end_clean();
			
			// écriture ds le fichier
			$fp = fopen($this->mini_path_int.'mini_'.$photo,'w') or $this->addError('Impossible de créer le fichier miniature');
			
			if ($fp) {
				fwrite($fp,$mini,strlen($mini)) or $this->addError('Impossible d\'enregistrer la miniature');
			}
			
			fclose($fp);
			
			return 'mini_'.$photo;
	}
	
	private function verifTags($string) {
		$nb_end = substr_count($string,'[FIN]')+substr_count($string,'[/');
		
		$nb_start = substr_count($string,'[')-$nb_end;
			
		if ($nb_end < $nb_start)
			for ($i=$nb_end;$i < $nb_start;$i++)
				$string .= '[FIN]';
				
		if ($nb_end > $nb_start)
			for ($i=$nb_start;$i < $nb_end;$i++)
				$string = '[ ]'.$string;
				
		return $string;
	}
	
	public function isValid($row,$files) {	
		$this->cleanError();

		if(empty($files['photo']['tmp_name']) && !$row['is_cat']) {
			$this->addError('Veuillez spécifier au moins une photo');
		}
		
		if (!empty($files['photo']['tmp_name'])) {
			$row['photo'] = $this->transfertPhoto($files['photo']['tmp_name'],$files['photo']['name']);
			
			if ($this->getError()=='')
				// création miniature
				$row['mini'] = $this->createMiniature($row['photo']);
		}
		
		if (@$row['position'] <= 0) $row['position'] = $this->getNB()+1;
		
		$row['name'] = $this->verifTags($row['name']);
		$row['description'] = $this->verifTags($row['description']);
		
		// OK
		$this->item = $row;
		
		return ($this->getError()=='');
	}
	
	public function addItem() {		
		$row = $this->item;
		unset($this->item);
		
		return $this->createArray($row);	
	}
	
	public function delItem($id) {			
		return ($this->deletePhoto($id) && $this->deleteMini($id) && $this->delete($id));
	}
	
	public function alterItem($row,$files) {
		$this->cleanError();
		
		if(empty($files['photo']['tmp_name']) && !$row['is_cat']) {
			$this->addError('Veuillez spécifier au moins une photo');
		}
		
		if (!empty($files['photo']['tmp_name'])) {
			$row['photo'] = $this->transfertPhoto($files['photo']['tmp_name'],$files['photo']['name']);
			
			if ($this->getError()=='')
				// création miniature
				$row['mini'] = $this->createMiniature($row['photo']);
		}	

		$row['name'] = $this->verifTags($row['name']);
		$row['description'] = $this->verifTags($row['description']);
		
		if (!empty($files['photo']['tmp_name']) && $this->getError()=='') { // si nouvelle photo, on efface l'ancienne
			$this->deletePhoto($row['id']);
			$this->deleteMini($row['id']);
		}
		
		$this->item = $row;
		
		if ($this->getError()!='') {
			return 0;
		}
		
		unset($this->item);
		
		return $this->modif($row);
	}
	
	public function getCleanItem() {
		return @$this->item;
	}
	
	public function getAuto($cat) {
		return $this->getCat_Page($cat,$this->first,$this->nbppage);
	}
	
	public function deletePhoto($id) {
			$member = $this->getid($id);
			$member = $member[0];
		
			if (!empty($member['photo']) && file_exists($this->photo_path_int.$member['photo']) && !@unlink($this->photo_path_int.$member['photo'])) {
				$this->addError('Impossible d\'effacer l\'ancienne photo');
				return 0;
			}
			else
				return $this->delPhoto($id);
	}
	
	public function deleteMini($id) {
			$file = $this->getMini($id);
			
			if (!empty($file) && file_exists($this->mini_path_int.$file) && !unlink($this->mini_path_int.$file)) {
				$this->addError('Impossible d\'effacer l\'ancienne miniature');
				return 0;
			}
			else
				return $this->delMini($id);
	}
	
	// Affichage formaté
	public function pages($fmt,$p=0) {
		$fmt = str_replace('%nb',$this->nbppage,$fmt);
		
		$max = ceil($this->getCat_NB($p)/$this->nbppage);

		$s = '';

		for ($p = 1; $p <= $max; $p++) {
			$cp = ($p-1)*$this->nbppage;
			
			if ($p != ceil( ($this->first+1)/$this->nbppage ) ){
				$s .= str_replace(array('%first','%page'),array($cp,$p),$fmt).' ';
			}
			else
			{
				$s .= $p.' ';
			}
		}
		
		return $s;
	}
		
	public function sprintf($res,$fmt_cat0,$fmt_cat1,$fmt_item1,$br2nl=0,$tohtml=0) {
		if ($res === 0) return 'Aucun élément';
	
		if (!is_array($res) || count($res) == 0) {
			$this->errormsg = 'Aucun élément';
			return 0;
		}
		
		$s = '';
		$list = '';
		$parent = -1;
		
		foreach($res as $row) {			
			if ($br2nl) {
					$row['description'] = @str_replace('<br />','',$row['description']);
			}
			
			if (@$row['is_cat'] && $parent !=@$row['id']) $parent = $row['id'];
			
			$patterns = array( 
					'%id',
					'%description',
					'%name',
					'%textname',
					'%is_cat',
					
					'%position',					
					'%parent',
					
					'%pathphoto_int',
					'%pathphoto_ext',
					'%photo',
					
					'%pathmini_int',
					'%pathmini_ext',
					'%mini'	
				);
				
			$contents = @array(
					$row['id'],
					$row['description'],
					$row['name'],
					eregi_replace('(\[[[:graph:]]*\])','',$row['name']),
					
					(($row['is_cat'])?' checked="checked"':''),
					
					$row['position'],
					$parent,
					
					$this->photo_path_int,
					$this->photo_path_ext,
					$row['photo'],
					
					$this->mini_path_int,
					$this->mini_path_ext,
					$row['mini']	
				);
			
			
			if ( (isset($row['is_cat']) && $row['is_cat']) || empty($fmt_item1)) {
				$fmt = (!empty($fmt_cat1) && !empty($row['photo']) && file_exists($this->photo_path_int.$row['photo']))?$fmt_cat1:$fmt_cat0;
			}
			else
			{
				$fmt = $fmt_item1;
			}
			
			$s .= str_replace($patterns,$contents,$fmt);
			
			
			if ($tohtml) {
				if (!empty($row['file']) && file_exists($this->file_path_int.$row['file'])) {
					$myarray = array('<a target="_blank" href="download.php?id='.$row['id'].'">','</a>',$row['downloads']);
				}
				else
					$myarray = array('','',$row['downloads']);
				
				$s = str_replace(
						array('[FICHIER]','[/FICHIER]','%telecharge'),
						$myarray,
						$s
				);
			}
			
		}
		
		/* conversion html */
		if ($tohtml) {				
	
			$s = str_replace(
					array('[/URL]','[FIN]'),
					array('</a>','</span>'),
					$s
			);

			$s = str_replace(
				Array(
					'[URL_I=',
					'[URL_S='
				),
				Array(
					'<a href="',
					'<a href="rech.php?s='
				),
				$s
			);
			
			$s = eregi_replace('\[URL_E=([[:graph:]]*)\]','<a href="\\1" onclick="window.open(this.href,\'_blank\'); return false;">',$s);
			
			if (function_exists('isLogged') && isLogged()){
				$s = eregi_replace('(\[CONNECTE\]|\[/CONNECTE\])','',$s);
				$s = eregi_replace('(\[NON_CONNECTE\](.*)\[/NON_CONNECTE\])','',$s);
			}
			else
			{
				$s = eregi_replace('(\[CONNECTE\]([^(\[/CONNECTE\])]*)\[/CONNECTE\])','',$s);
				$s = eregi_replace('(\[NON_CONNECTE\]|\[/NON_CONNECTE\])','',$s);
			}			
							
			$s = eregi_replace('\[([a-zA-Z ]*)\]','<span class="\\1 StaticContent">',$s);
			//$s = str_replace('%telecharge',$row['downloads'],$s);
			
			$s = str_replace(']','">',$s);
			
			
			$s = eregi_replace('([a-zA-Z0-9.\_-]*@[a-zA-Z0-9.\_-]*\.[a-zA-Z]{2,})','<a href="mailto:\\1">\\1</a>',$s);
		}
		/* fin conversions html */
		
		return $s;
	}
}

?>