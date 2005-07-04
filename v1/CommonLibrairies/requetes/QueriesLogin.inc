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

class QueriesLogin extends MYSQL_connection {
	protected $table;
	private $pass;
	protected $MaxModifChamp = Array(
							'login'=>'"',
							'access'=>''
				);
				
	// Constructeur
	
	public function QueriesLogin ($connexion,$table,$pass) {
	
		$this->MYSQL_connection($connexion);
		$this->table = $table;
		
		$this->pass = $pass;
	}


	public function install ($tabularaza=0) {
		srand(time());
		
		if ($tabularaza) {
			$this->myquer('DROP TABLE IF EXISTS `'.$this->table.'`');
		}
		
		$req = 'CREATE TABLE `'.$this->table.'` (
							id INT NOT NULL AUTO_INCREMENT,
							login VARCHAR(255),
							password VARCHAR(255),
							access TINYINT,
							autonum VARCHAR(255),
							PRIMARY KEY(id)
			)';

		return $this->myquer($req);
	}
	
	// Autonum
	
	public function AutonumExists($num) {
		return ($this->getValue('autonum','autonum',$num,NOT_CARDINAL,-1) != -1);
	}
	
	public function setAutonum ($id,$num) {		
		return $this->setValue('autonum',$num,NOT_CARDINAL,'id',$id,CARDINAL);
	}
	
	public function getAutonum($id) {			
		return $this->getValue('autonum','id',$id,NOT_CARDINAL);
	}

	public function CheckAutoNum($num) {
		return $this->getValue('id','autonum',$num,NOT_CARDINAL);
	}
	
	// Id
	
	public function loginExists($login) {
		return ($this->getValue('id','login',$login,NOT_CARDINAL,-1) != -1);
	}
	
	public function getLoginId($login) {
		return $this->getValue('id','login',$login,NOT_CARDINAL);		
	}
	
	public function getIdLogin($id) {
		return $this->getValue('login','id',$id,CARDINAL);		
	}
	
	public function setLogin($id,$login) {
		return $this->setValue('login',$login,NOT_CARDINAL,'id',$id,CARDINAL);		
	}
	
	// Password

	public function setPassword($id,$pass) {
		return $this->setValue('password','ENCODE("'.$pass.'","'.$this->pass.'")',UNCONVENTIONAL,'id',$id,CARDINAL); // le NOT_CARDINAL rajouterai des " " => mauvais pass stocké
	}

	public function setPasswordByLogin($login,$pass) {
		return $this->setValue('password','ENCODE("'.$pass.'","'.$this->pass.'")',UNCONVENTIONAL,'login',$login,NOT_CARDINAL); // le NOT_CARDINAL rajouterai des " " => mauvais pass stocké
	}
	
	public function getPassword($id) {		
		return $this->getValue('DECODE(password,"'.$this->pass.'")','id',$id,CARDINAL);
	}
	
	
	// Accès
	
	public function setAccess($id,$access) {
		return $this->setValue('access',$access,CARDINAL,'id',$id,CARDINAL);
	}
	
	public function getAccess($id) {
		return $this->getValue('access','id',$id,CARDINAL);
	}
	
	// Gestion des users
	
	public function CheckLogin($login,$pass) {
		$realpass = $this->getValue('DECODE(password,"'.$this->pass.'")','login',$login,NOT_CARDINAL);
		
		return (strtolower($realpass) == strtolower($pass)) ;
	}
}

?>