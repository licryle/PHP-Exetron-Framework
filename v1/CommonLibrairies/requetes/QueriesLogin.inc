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

class QueriesLogin extends MYSQL_connection {
	protected $table;
	private $pass;
	protected $MaxModifChamp = Array(
							'login'=>'"',
							'mail'=>'"',
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
							mail VARCHAR(255),
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
		return $this->setValue('login',strtolower($login),NOT_CARDINAL,'id',$id,CARDINAL);		
	}
	
	// Password

	public function setPassword($id,$pass) {
		return $this->setValue('password','ENCODE("'.$pass.'","'.$this->pass.'")',UNCONVENTIONAL,'id',$id,CARDINAL); // le NOT_CARDINAL rajouterai des " " => mauvais pass stock�
	}

	public function setPasswordByLogin($login,$pass) {
		return $this->setValue('password','ENCODE("'.$pass.'","'.$this->pass.'")',UNCONVENTIONAL,'login',$login,NOT_CARDINAL); // le NOT_CARDINAL rajouterai des " " => mauvais pass stock�
	}
	
	public function getPassword($id) {		
		return $this->getValue('DECODE(password,"'.$this->pass.'")','id',$id,CARDINAL);
	}
	
	
	// Acc�s
	
	public function setAccess($id,$access) {
		return $this->setValue('access',$access,CARDINAL,'id',$id,CARDINAL);
	}
	
	public function getAccess($id) {
		return $this->getValue('access','id',$id,CARDINAL);
	}
	
	public function getByAccess($access) {
		$access = intval($access);
	
		$quer = $this->myquer('SELECT * FROM `'.$this->table.'` WHERE
						access='.$access.'
				');
				
		return $this->ResToArray($quer);	
	}
	
	// Mail 
	
	public function setMail($id,$mail) {
		return $this->setValue('mail',$mail,NOT_CARDINAL,'id',$id,CARDINAL);
	}
	
	public function getMail($id) {
		return $this->getValue('mail','id',$id,CARDINAL);
	}
	
	// Gestion des users
	
	public function CheckLogin($login,$pass) {
		$realpass = $this->getValue('DECODE(password,"'.$this->pass.'")','login',$login,NOT_CARDINAL);
		
		return (strtolower($realpass) == strtolower($pass)) ;
	}
}

?>