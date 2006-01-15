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

class ImgBank extends QueriesImgBank {	
	private $photo_path_ext;
	private $photo_path_int;
	
	private $item = array();
	
	public function __construct($connexion,$table='Content') {
		parent::QueriesImgBank($connexion,$table);
		
		$this->photo_path_ext='';
		$this->photo_path_int='';
	}
	
	
	// Configs	
	
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
	
	public function isValid($row,$files) {	
		$this->cleanError();

			
		if(empty($files['photo']['tmp_name']) || empty($row['name'])) {
			$this->addError('Veuillez spécifier au moins une photo et un nom');
		}
		
		if (!empty($files['photo']['tmp_name'])) {
			$row['photo'] = $this->transfertPhoto($files['photo']['tmp_name'],$files['photo']['name']);
		}
		
		$row['url'] = strtolower($row['url']);
		if (!empty($row['url']) && substr($row['url'],0,7) != 'http://') $row['url'] = 'http://'.$row['url'];
		
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
		return ($this->deletePhoto($id) && $this->delete($id));
	}
	
	public function alterItem($row,$files) {
		$this->cleanError();
		
		if(empty($row['name'])) {
			$this->addError('Veuillez spécifier au moins une photo');
		}
		
		if (!empty($files['photo']['tmp_name'])) {
			$row['photo'] = $this->transfertPhoto($files['photo']['tmp_name'],$files['photo']['name']);
		}	
		
		if (!empty($files['photo']['tmp_name']) && $this->getError()=='') { // si nouvelle photo, on efface l'ancienne
			$this->deletePhoto($row['id']);
		}
		
		$row['url'] = strtolower($row['url']);
		if (!empty($row['url']) && substr($row['url'],0,7) != 'http://') $row['url'] = 'http://'.$row['url'];
		
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
	
	public function deletePhoto($id) {
			$member = $this->getid($id);
			$member = $member[0];
		
			if (!empty($member['photo']) && file_exists($this->photo_path_int.$member['photo']) && !@unlink($this->photo_path_int.$member['photo'])) {
				$this->addError('Impossible d\'effacer l\'ancienne photo');
				return 0;
			}
			else
				return 1;
	}
	
	// Affichage formaté
	public function sprintf($res,$fmt1,$fmt2) {
		if ($res === 0) return 'Aucun élément';
	
		if (!is_array($res) || count($res) == 0) {
			$this->errormsg = 'Aucun élément';
			return 0;
		}
		
		$s = '';
		
		foreach($res as $row) {
			
			$patterns = array( 
					'%id',
					'%url',
					'%name',
					
					'%pathphoto_int',
					'%pathphoto_ext',
					'%photo',
					
					'%downloads'	
				);
				
			$contents = @array(
					$row['id'],
					$row['url'],
					$row['name'],
					
					$this->photo_path_int,
					$this->photo_path_ext,
					$row['photo'],
					
					$row['downloads']	
				);
			
			$fmt = (!empty($fmt2) && empty($row['url']))?$fmt2:$fmt1;
			
			$s .= str_replace($patterns,$contents,$fmt);
			
		}
		
		return $s;
	}
}

?>