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

class Content extends QueriesContent {
	private $nbppage;
	private $first;
	
	private $photo_path_ext;
	private $photo_path_int;
	
	private $mini_path_ext;
	private $mini_path_int;
	
	private $file_path_int;
	private $file_path_ext;
	
	private $max_widths = array();
	
	private $item = array();
	
	public function __construct($connexion,$table='Content') {
		parent::QueriesContent($connexion,$table);
		
		$this->nbppage=10;
		$this->first=0;
		
		$this->photo_path_ext='';
		$this->photo_path_int='';
		
		$this->mini_path_ext='';
		$this->mini_path_int='';
		
		$this->file_path_int='';
		$this->file_path_ext='';		
	}
	
	
	// Configs
	
	public function setNbPerPage ($n) {
		$this->nbppage = intval($n); 
	}
	
	public function setFirst ($f) {
		$this->first = intval($f); 
	}
	
	
	public function setMax_Widths ($n) {
		$this->max_widths = $n; 
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
				$this->addError('Impossible de créer le répertoire de miniatures photos');
		}
		
		if (function_exists('chmod')) @chmod($path,0777);
	}
	
	public function setMini_Path_Ext ($path) {
		$this->mini_path_ext = $path;
	}
	
	public function setFile_Path_Int ($path) {
		$this->file_path_int = $path;
		
		if (!file_exists($path)) {
			if (!@mkdir($path,0777))
				$this->addError('Impossible de créer le répertoire de fichiers');
		}
		
		if (function_exists('chmod')) @chmod($path,0777);
	}
	
	public function setFile_Path_Ext ($path) {
		$this->file_path_ext = $path;
	}
	
	// Validation	

	private function createMiniature($photo,$maxwidth) {
			//calul des dimensions
			$size = @getimagesize($this->photo_path_int.$photo);
	
			if ($size[0] > $maxwidth) {
				$width = $maxwidth;
				$height = @$size[1]*$maxwidth/$size[0];
			}
			else
			{
				$width = $size[0];
				$height = $size[1];
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
					/*|| 
						($rphoto =imagecreatefromxbm($this->photo_path_int.$photo))
					|| 
						($rphoto =imagecreatefromxpm($this->photo_path_int.$photo))*/
					)) {
				$this->addError('Impossible d\'extraire la photo');
			}
			else
			{
				if (!@imagecopyresampled($rmini,$rphoto,0,0,0,0,$width,$height,$size[0],$size[1])) {
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
	
	private function transfertPhoto($photo,$filename) {
		$types = array (
			1 => 'gif',
			2 => 'jpg',
			3 => 'png',
			4 => 'swf',
			5 => 'psd',
			6 => 'bmp',
			7 => 'tiff',
			8 => 'tiff',
			9 => 'jpc',
			10 => 'jp2',
			11 => 'jpx',
			12 => 'jb2',
			13 => 'swc',
			14 => 'iff',
			15 => 'wbmp',
			16 => 'xbm'		
		);
		
		
		if (!empty($filename) && empty($photo)) { // upload échoué == fichier trop gros
			$this->addError('Fichier trop important.');
			
			$max = @ini_get('upload_max_filesize');
			if (!empty($max)) {
				$this->addError('Taile maximale autorisée par la configuration serveur : '.$max);				
			}

			return 0;
		}
		
		if ($photo != '') {			
			$size = @getimagesize($photo);
			
			if (!$size) { 
				$this->addError('Image non-valide');

				return 0;
			}
			else
			{
				$filename = time().'_'.rand().'.'.$types[$size[2]];
			
				if (!@move_uploaded_file($photo,$this->photo_path_int.$filename)) {
					$this->addError('Echec du transfert de la photo');
					
					return 0;
				}
			}

			
			$photo = $filename;
		}
		
		return $photo;
	}
	
	private function transfertFile($file,$filename) {
		
		if (!empty($filename) && empty($file)) { // upload échoué == fichier trop gros
			$this->addError('Fichier trop important.');
			
			$max = @ini_get('upload_max_filesize');
			if (!empty($max)) {
				$this->addError('Taile maximale autorisée par la configuration serveur : '.$max);				
			}

			return 0;
		}
		
		if (!empty($file)) {
			$infos = pathinfo($filename);
			
			$filename = time().'_'.rand().'.'.$infos['extension'];
			
			$filename = eregi_replace('[ \?\!\\]','',$filename);
			
			if (!@move_uploaded_file($file,$this->file_path_int.$filename)) {
				$this->addError('Echec du transfert du fichier');

				return 0;
			}
			
			$file = $filename;
		}
		
		return $file;
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
		
		if(empty($row['name'])) {
			$this->addError('Veuillez remplir au moins le nom');
		}
		
		if (!empty($files['photo']['tmp_name'])) {
			$row['photo'] = $this->transfertPhoto($files['photo']['tmp_name'],$files['photo']['name']);
			
			if ($this->getError()=='') {
				// création miniature
				$row['mini'] = $this->createMiniature($row['photo'],@$row['max_width']);
				
				if ($this->getError() != '') // image douteuse => efface
					@unlink($this->photo_path_int.$row['photo']);
			}
		}
		
		$row['file'] = $this->transfertFile($files['file']['tmp_name'],$files['file']['name']);
		
		if (@$row['position'] <= 0) $row['position'] = $this->getMaxPos()+1;
		
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
		return ($this->deletePhoto($id) && $this->deleteMini($id) && $this->deleteFile($id) && $this->delete($id));
	}
	
	public function alterItem($row,$files) {
		$this->cleanError();
		
		if(empty($row['name'])) {
			$this->addError('Veuillez remplir au moins le nom.');
		}
		
		if (!empty($files['photo']['tmp_name'])) {
			$row['photo'] = $this->transfertPhoto($files['photo']['tmp_name'],$files['photo']['name']);
		
			if ($this->getError()=='') {
				// création miniature
				$row['mini'] = $this->createMiniature($row['photo'],@$row['max_width']);
		
				if ($this->getError() != '') // image douteuse => efface
					@unlink($this->photo_path_int.$row['photo']);
			}
		}
		
		$row['file'] = $this->transfertFile($files['file']['tmp_name'],$files['file']['name']);

		$row['name'] = $this->verifTags($row['name']);
		$row['description'] = $this->verifTags($row['description']);
		
		if (!empty($files['photo']['tmp_name']) && $this->getError()=='') { // si nouvelle photo, on efface l'ancienne
			$this->deletePhoto($row['id']);
			$this->deleteMini($row['id']);
		}	

		if (!empty($files['file']['tmp_name']) && $this->getError()=='') { // si nouveau fichier, on efface l'ancien
			$this->deleteFile($row['id']);
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
			$member = $this->getid($id);
			$member = $member[0];
		
			if (!empty($member['mini']) && file_exists($this->mini_path_int.$member['mini']) && !@unlink($this->mini_path_int.$member['mini'])) {
				$this->addError('Impossible d\'effacer l\'ancienne miniature');
				return 0;
			}
			else
				return $this->delMini($id);
	}
	
	public function deleteFile($id) {
			$file = $this->getFile($id);
			
			if (!empty($file) && file_exists($this->file_path_int.$file) && !unlink($this->file_path_int.$file)) {
				$this->addError('Impossible d\'effacer l\'ancien fichier');
				return 0;
			}
			else
				return $this->delFile($id);
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
		
	public function sprintf($res,$fmt_cat0,$fmt_item0,$fmt_list='',$fmt_cat1='',$fmt_item1='',$br2nl=0,$tohtml=0) {
		if ($res === 0) return 'Aucun élément';
	
		if (!is_array($res) || count($res) == 0) {
			$this->errormsg = 'Aucun élément';
			return 0;
		}
		
		$s = '';
		$list = '';
		$parent = -1;
		
		$maxwidths = '';
		foreach($this->max_widths as $key => $val) {
			$maxwidths .= '	<option value="'.$val.'">'.$key.'</option>'.CRLF;
		}
		
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
					
					'%max_widths',
					
					'%pathphoto_int',
					'%pathphoto_ext',
					'%photo',
					
					'%pathmini_int',
					'%pathmini_ext',
					'%mini',
					
					'%pathfile_int',
					'%pathfile_ext',
					'%file'	
				);
				
			$contents = @array(
					$row['id'],
					$row['description'],
					$row['name'],
					eregi_replace('(\[[[:graph:]]*\])','',$row['name']),
					
					(($row['is_cat'])?' checked="checked"':''),
					
					$row['position'],
					$parent,
					
					$maxwidths,
					
					$this->photo_path_int,
					$this->photo_path_ext,
					$row['photo'],
					
					(empty($row['mini'])?$this->photo_path_int:$this->mini_path_int), // compatibilité avec les anciens sites
					(empty($row['mini'])?$this->photo_path_ext:$this->mini_path_ext),
					(empty($row['mini'])?$row['photo']:$row['mini']),
					
					$this->file_path_int,
					$this->file_path_ext,
					$row['file']	
				);
			
			
			if ( (isset($row['is_cat']) && $row['is_cat']) || empty($fmt_item0)) {
				$fmt = (!empty($fmt_cat1) && !empty($row['photo']) && file_exists($this->photo_path_int.$row['photo']))?$fmt_cat1:$fmt_cat0;
			}
			else
			{
				$fmt = (!empty($fmt_item1) && !empty($row['photo']) && file_exists($this->photo_path_int.$row['photo']))?$fmt_item1:$fmt_item0;
				
				$list .= str_replace($patterns,$contents,$fmt_list);
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
		
		$s = str_replace('%item_list',$list,$s);
		
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
					'[URL_S=',
					'[URL_P='
				),
				Array(
					'<a href="',
					'<a href="rech.php?s=',
					'<a href="'.EXT_URL.'phototheque.php?s='
				),
				$s
			);
			
			$s = eregi_replace('\[URL_E=([[:graph:]]*)\]','<a href="\\1" onclick="window.open(this.href,\'_blank\'); return false;">',$s);
			
			/*if (function_exists('isLogged') && isLogged()){
				$s = eregi_replace('(\[CONNECTE\]|\[/CONNECTE\])','',$s);
				$s = eregi_replace('(\[NON_CONNECTE\](.*)\[/NON_CONNECTE\])','',$s);
			}
			else
			{
				$s = eregi_replace('(\[CONNECTE\]([^(\[/CONNECTE\])]*)\[/CONNECTE\])','',$s);
				$s = eregi_replace('(\[NON_CONNECTE\]|\[/NON_CONNECTE\])','',$s);
			}		*/	
							
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