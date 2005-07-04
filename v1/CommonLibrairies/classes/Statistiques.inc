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

class Statistiques extends QueriesStatistiques {
	private $min_gap;
	
	private $item = array();
	
	public function __construct($connexion,$table='Statistiques') {
		parent::QueriesStatistiques($connexion,$table);
		
		$this->min_gap = 20;	
	}
	
	
	// Configs
	
	public function setGapMin($gap) {
		$this->min_gap = $gap;
	}
	
	// Validation
	
	public function hasVisited($ip) {	
		return $this->visitorExists($ip,gethostbyaddr($ip),$this->min_gap);
	}
	
	public function visite($ip,$browser) {		
		$row = array();
		
		$row['ip'] = $ip;
		$row['dns'] = gethostbyaddr($ip);
		$row['lasttime'] = time();
		$row['browser'] = $browser;
		
		return $this->add($row);	
	}
	
	public function reVisite($ip) {
		if ($this->hasVisited($ip))
			$visitor = $this->getVisitor($ip,gethostbyaddr($ip),$this->min_gap);
	
		$visitor[0]['lasttime'] = time();
		
		return ($visitor[0] !=0 && $this->ModifArrayById($visitor[0]));
	}
	
	public function getCleanItem() {
		return @$this->item;
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
		
	public function sprintf($res,$fmt) {
		if ($res === 0) return 'Aucun élément';
	
		if (!is_array($res) || count($res) == 0) {
			$this->errormsg = 'Aucun élément';
			return 0;
		}
		
		$s = '';
		$list = '';
		$parent = -1;
		
		foreach($res as $row) {
			
			$patterns = array( 
					'%id'
				);
				
			$contents = @array(
					$row['id']	
				);
			}
			
		
		return $s;
	}
}

?>