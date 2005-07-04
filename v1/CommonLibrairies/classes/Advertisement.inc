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

class Advertisement extends QueriesAdvertisement {
	private $photo_path_ext;
	private $photo_path_int;
	
	private $types = array();
	
	private $imgbank;
	
	private $item = array();
	
	public function __construct($connexion,$table,$banktable) {
		parent::QueriesAdvertisement($connexion,$table,$banktable);
		
		$this->photo_path_ext='';
		$this->photo_path_int='';
		
		$this->imgbank = new ImgBank($connexion,$banktable);
	}
	
	
	// Configs
	public function setTypes($types) {
		$this->types = $types;
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
	
	// Validation
	
	public function isValid($row) {	
		$this->cleanError();
		
		if (!isset($this->types[$row['type']]))
			$this->addError('Types incorrect');
		

		if (isset($this->types[$row['type']])) {
			if (!empty($this->types[$row['type']]['class'])) {
				@include_once(COMMON_PATH_REQUIRED.'required4'.$this->types[$row['type']]['class'].'.inc');
				@include_once(PATH_REQUIRED.'required4'.$this->types[$row['type']]['class'].'.inc');
				
				$myclass = new $this->types[$row['type']]['class']($this->connexion,$this->types[$row['type']]['table']);
			}
		
			switch ($this->types[$row['type']]['class']) {
				case 'Phototheque':
					if (!$myclass->is_Cat_s($row['args']))
						$this->addError('Argument erroné : photothèque inexistante.');
				break;
				
				case 'Content':
					if (!$myclass->is_Cat($row['args'])) 
						$this->addError('Argument erroné : page inexistante.');
				break;
			}
		}
		
		
		$this->item = $row;
		
		return ($this->getError()=='');
	}
	
	public function addItem() {		
		$row = $this->item;
		unset($this->item);

		return $this->add($row);	
	}
	
	public function delItem($id) {			
		return ($this->delete($id));
	}
	
	public function getCleanItem() {
		return @$this->item;
	}
	
	// Affichage formaté
		
	public function sprintf($res,$fmt1,$fmt2,$fmt3) {
		if ($res === 0) return 'Aucun élément';
	
		if (!is_array($res) || count($res) == 0) {
			$this->errormsg = 'Aucun élément';
			return 0;
		}
		
		$s = '';
		$lastpubid = -1;
		foreach($res as $row) {
			$newpub = 0;
			if ($lastpubid != $row['pubid']) { $lastpubid = $row['pubid']; $newpub++; }
			
			
			// détermination de $sargs
			if (isset($this->types[$row['type']])) {
				if (!empty($this->types[$row['type']]['class'])) {
					@include_once(COMMON_PATH_REQUIRED.'required4'.$this->types[$row['type']]['class'].'.inc');
					@include_once(PATH_REQUIRED.'required4'.$this->types[$row['type']]['class'].'.inc');
					
					$myclass = new $this->types[$row['type']]['class']($this->connexion,$this->types[$row['type']]['table']);
				}
			
				switch ($this->types[$row['type']]['class']) {
					case 'Phototheque':
						if (!$myclass->is_Cat_s($row['args'])) {
							$sargs = '<span class="erreur">Ce classeur de photos n\'existe plus, vous pouvez effacer cette association</span>';
						}
						else
						{
							$sargs = $row['args'];
						}
					break;
					
					case 'Content':
						if (!$myclass->is_Cat($row['args'])) {
							$sargs = '<span class="erreur">Cette page n\'existe plus, vous pouvez effacer cette association</span>';
						}
						else
						{
							$id = $myclass->getId($row['args']);
							$sargs = $id[0]['name'];
						}
					break;
					
					default:
						$sargs = $row['args'];
				}
			}
			
			$patterns = array( 
					'%id',
					'%pubid',
					
					'%type',
					'%stype',
					
					'%args',
					'%sargs',
					
					'%url',
					'%name',
					
					'%pathphoto_int',
					'%pathphoto_ext',
					'%photo',
					
					'%downloads'	
				);
				
			$contents = @array(
					$row['id'],
					$row['pubid'],
					
					$row['type'],
					$this->types[$row['type']]['label'],
					
					$row['args'],
					$sargs,
					
					$row['url'],
					$row['name'],
					
					$this->photo_path_int,
					$this->photo_path_ext,
					$row['photo'],
					
					$row['downloads']	
				);
			
			$fmt = (!empty($fmt2) && empty($row['url']))?$fmt2:$fmt1;
			
			if (!empty($fmt3) && $newpub)
				$s .= str_replace($patterns,$contents,$fmt3);

			$s .= str_replace($patterns,$contents,$fmt);
			
		}
		
		return $s;
	}
}

?>