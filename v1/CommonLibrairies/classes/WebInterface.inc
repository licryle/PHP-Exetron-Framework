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

$GLOBALS['interface'] = null;
 
function getmicrotime() {
	list($usec, $sec) = explode(' ',microtime());
	
	return ($usec+$sec);
} 

function validSGML($string) {
	$new = '';
	
	for($i = 0; $i < strlen($string); $i++) {
		$o = ord($string{$i});
		
		$new .= (($o > 127)?'&#'.$o.';':$string{$i});
	}
	
	return $new;
}

function flushsite($str) {
	return $GLOBALS['interface']->flushsite($str);
}

class WebInterface { 
	private $maquette;
	
	private $variables = array();
	
	private $start;
	private $debug = 0;
	
	// menu locator
	private $locator;
	
	// boutton
	private $maquettebtn;
	
	// table
	private $maquettetable;
	
	private function getmicrotime() {
		list($usec, $sec) = explode(' ',microtime());
		
		return ($usec+$sec);
	} 
	
	private function validSGML($string) {
		$new = '';
		
		for($i = 0; $i < strlen($string); $i++) {
			$o = ord($string{$i});
			
			$new .= (($o > 127)?'&#'.$o.';':$string{$i});
		}
		
		return $new;
	}
	
	public function flushsite($str) { //public pour PHP5
		$inter = & $GLOBALS['interface'];
		
		$inter->variables['[EXECTIME]'] = round($inter->getmicrotime()-($inter->start),4);
		$inter->variables['[LOCATOR]'] = $inter->locator['start'].$inter->locator['string'];

		if($this->debug) $inter->variables['[BODY]'] .= ob_get_contents();
		
		$page =  str_replace(
				array_keys($inter->variables),
				array_values($inter->variables),
				$inter->maquette);
				
		return $inter->validSGML($page);
	}
	
	public function WebInterface ($file,$debug=0) {
		if (!file_exists($file)) {
			die('Un problème d\'ordre majeur s\'est produit');
		}
		
		$this->locator = array();
		$this->locator['niveau'] = 0;

		$this->start = $this->getmicrotime();
		
		
		// chargement de la maquette 
		
		$this->setPageMaquette(file_get_contents($file));
		$this->variables['[BODY]'] = ''; // corps de la page
		
		$GLOBALS['interface'] = & $this;
		
		$phpversion = phpversion();
		$phpversion = explode('.',$phpversion);

		$this->debug = $debug;
		
		ob_start('flushsite');
	}
	
	public function finclude($file,$tag) {
		if ($tag == '') return 0;
		
		if (!file_exists($file)){
			return 0;
		}
		
		ob_start();
		
		include($file);
		
		// ajout nvx tag et content
		$this->variables[$tag] = ob_get_contents();
		
		ob_end_clean();
		
		return 1;
	} 
	
	public function add_tags($tags,$contents) {
		if ( (gettype($tags) != gettype($contents)) || (is_array($tags) && (count($tags) != count($contents))) ) return 0; 
		
		if (is_array($tags)) {
			$tags = array_values($tags);
			$contents = array_values($contents); // on se débarrasse des index ainsi $tags et $contents ont memes index numériques
			
			foreach($tags as $key => $value) {
				$this->variables[$value] = $contents[$key];
			}
		}
		else
		{//echo '['.$tags.' => ['.$contents.']';
			$this->variables[$tags] = $contents;		
		}
		
		return 1;
	}
	
	
	// Menu locator
	public function LocatorStart($label,$class='',$img='') {
		$this->locator['class'] = $class;
		$this->locator['start'] = $label;
		$this->locator['backimg'] = $img;
		$this->locator['string'] = '';
	}
	
	public function LocatorAdd($label,$link='#',$class='') {
		if ($class=='')
			$class = $this->locator['class'];
		
		$s = '';
		if ($this->locator['niveau'] > 0)
			$this->locator['string'] .= ' &#62;';
		else
			$s = ' id="top"';
		
		$this->locator['string'] .= ' <a '.$s.' href="'.$link.'" class="'.$class.'">'.$label.'</a>';
		
		++$this->locator['niveau'];
	}
	
	public function LocatorBack($label,$class='') {
		if ($class=='')
			$class = $this->locator['class'];
		
		return '<div class="'.$class.'"><a href="#top" class="'.$class.'">'.$this->locator['backimg'].' '.$label.'</a></div>';
	}
	
	// Maquette
	
	public function setPageMaquette($maquette) {
		$this->maquette = $maquette;
	}
	// Maquette des boutons
	
	public function setButtonMaquette($maquette) {
		$this->maquettebtn = $maquette;
	}
	
	public function callButtonMaquette($label,$type='submit',$action='') {
		return str_replace(
				Array(
						'[TEXTBUTTON]',
						'[ACTION]',
						'[TYPE]'
				),
				Array(
						$label,
						$action,
						$type
				),
				$this->maquettebtn
		);
	}
	
	// Maquette de table
	
	public function setTableMaquette($maquette) {
		$this->maquettetable = $maquette;
	}
	
	public function callTableMaquette($title,$text,$width=-1) {
		return str_replace(
				Array(
						'[TITLE]',
						'[TEXT]',
						'[WIDTH]'
				),
				Array(
						$title,
						$text,
						(($width==-1)?'':' width="'.$width.'" ')
				)				
				,
				$this->maquettetable
		);
	}
	
	// Gestion du contenu
	
	public function setTitle($title) {
		$this->variables['[PAGE_TITLE]'] = $title;	
	}
	
	public function addText($text) {
		@$this->variables['[BODY]'] .= $text.'<br />'.@CRLF;
	}
	
	public function addRaw($text) {
		@$this->variables['[BODY]'] .= $text.@CRLF; 
	}
	
	public function addError($text,$class='erreur') {
		$this->addText('<div class="'.$class.'">'.$text.'</div>');
	}
	
	public function addTable($title,$text,$width=-1) {
		$this->addText($this->callTableMaquette($title,$text,$width));
	}
	
	public function callParagraph($text) {
		return '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$text.'<br />';
	}
	
	public function addParagraph($text) {
		$this->addText($this->callParagraph($text));
	}   
}

?>