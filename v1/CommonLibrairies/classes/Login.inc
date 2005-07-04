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

class Login extends QueriesLogin {
	private $item = array();
	
	
	
	public function getFakeEntry() {
		$res = array();
		
		$res['id'] = -1;
		$res['login'] = '';
		$res['pass1'] = '';
		$res['pass2'] = '';
		$res['access'] = ACCESS_LVL1;
		$res['Saccess'] = Login::accessToString(ACCESS_LVL1);
		
		return $res;
	}
	
	// Recup
	
	public static function accessToString($lvl) {
		return 0;
	}

	public function BuildAutonum ($length=30) {
		$alphanum = ALPHANUM;
		
		srand();
		
		do {
			$num = '';
			
			for($i = 0; $i < $length; $i++) {
				$num .= $alphanum{rand(0,strlen($alphanum)-1)};
			}
		}while($this->Autonum_exists($num));	
		
		return $num;
	}
	
	public function isValidPwd($pass,$repass) {	
		$this->cleanError();
			
		if (strlen($pass) < 6) {
			$this->addError('Mot de passe inférieur à 6 caractères.');	
		}
		
		if (!eregi('^[[:alnum:]]+$',$pass)) {
			$this->addError('Mot de passe incorrect, celui-ci doit etre alphanumérique.');
		}	
		
		if ($pass !== $repass) {
			$this->addError('Vous n\'avez pas entré le même mot de passe dans les deux cases.');	
		}
		
		return ($this->isCleanError());
	}
	
	
	public function isValid($row,$modif=0) {
		$this->cleanError();
		
		if (!$modif || $row['pass1'] != '')
			$this->isValidPwd($row['pass1'],$row['pass2']);
			
		$row['login'] = strtolower($row['login']);
		
		if ($this->loginExists($row['login']) && $this->getLoginId($row['login']) != $row['id'])
			$this->addError('Ce login est déjà pris.');
		
		if (!eregi('[[:alnum:]]',$row['login']))
			$this->addError('Ce login n\'est pas alphanumérique');
		
		if ($row['access'] < 1 || $row['access'] > 5)
			$this->addError('Accès erroné.');
			
		
		if (!$this->isCleanError()) {
			$this->item = NULL;
			return 0;
		}
		else
		{		
			$this->item = $row;
			$this->item['pass'] = $row['pass1'];
			return 1;
		}
	}
	
	public function addItem() {
		return (
				$this->Add($this->item)
			&&
				$this->setPasswordByLogin($this->item['login'],$this->item['pass']));
	}
	
	public function modifItem() {
		$q1 = $this->setLogin($this->item['id'],$this->item['login']);
		$q2 = $this->setAccess($this->item['id'],$this->item['access']);
		
		if ($this->item['pass'] != '') {
			$q3 = $this->setPassword($this->item['id'],$this->item['pass']);
			
			return( $q1 && $q2 && $q3);
		}
		
		return( $q1 && $q2);
	}
	
	public function delItem($id) {
		return $this->del('id',$id,CARDINAL);
	}
	
	public function sprintf($res,$fmt) {
		if ($res === 0 || !is_array($res) || count($res) == 0) return 0;
		
		$s = '';
		foreach($res as $row) {
			$patterns = array(
				'%id',
				'%login',
				'%pass0',
				'%pass1',
				'%pass2',
				'%access',
				'%saccess'
			);

		$contents = array(
				$row['id'],
				$row['login'],
				@$row['pass'],
				@$row['pass1'],
				@$row['pass2'],
				$row['access'],
				accessToString($row['access'])
			);
				
			$s .= str_replace($patterns,$contents,$fmt);	
		}
		
		return $s;
	}
}

?>