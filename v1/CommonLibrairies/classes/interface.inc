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


class interface { 
	var $maquette;
	
	var $variables = array();
	
	var $start;
	
	// menu locator
	var $locator;
	
	// boutton
	var $maquettebtn;
	
	// table
	var $maquettetable;
	
	function interface ($file,$debug=0) {
		if (!file_exists($file)) {
			die('Un problème d\'ordre majeur s\'est produit');
		}
		
		$this->locator = array();
		$this->locator['niveau'] = 0;
		
		// création de la function de flush :
		$echofunction = '
				$this = & $GLOBALS["interface"];
				//$this->variables["[BODY]"] = $str;
				$this->variables["[EXECTIME]"] = round(getmicrotime()-($this->start),4);
				$this->variables["[LOCATOR]"] = $this->locator["start"].$this->locator["string"];

				'.(($debug)?'$this->variables["[BODY]"] .= ob_get_contents();':'').'
				
				return str_replace(
						array_keys($this->variables),
						array_values($this->variables),
						$this->maquette);
		';
		
		$flushsite = create_function('$str',$echofunction);

		$this->start = getmicrotime();
		
		
		// chargement de la maquette 
		
		$this->maquette = file_get_contents($file);
		
		ob_start($flushsite);	
	}
	
	function finclude($file,$tag) {
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
	
	function add_tags($tags,$contents) {
		if ( (gettype($tags) != gettype($contents)) || (is_array($tags) && (count($tags) != count($contents))) ) return 0; 
		
		if (is_array($tags)) {
			$tags = array_values($tags);
			$contents = array_values($contents); // on se débarrasse des index ainsi $tags et $contents ont memes index numériques
			
			foreach($tags as $key => $value) {
				$this->variables[$value] = $contents[$key];
			}
		}
		else
		{
			$this->variables[$tags] = $contents;		
		}
		
		return 1;
	}
	
	
	// Menu locator
	function Locator_Start($label,$class='',$img='') {
		$this->locator['class'] = $class;
		$this->locator['start'] = $label;
		$this->locator['backimg'] = $img;
	}
	
	function Locator_Add($label,$link='#',$class='') {
		if ($class=='')
			$class = $this->locator['class'];
		
		$s = '';
		if ($this->locator['niveau'] > 0)
			$this->locator['string'] .= ' &#62;';
		else
			$s = ' name="top"';
		
		$this->locator['string'] .= ' <a '.$s.' href="'.$link.'" class="'.$class.'">'.$label.'</a>';
		
		++$this->locator['niveau'];
	}
	
	function Locator_Back($label,$class='') {
		if ($class=='')
			$class = $this->locator['class'];
		
		return '<div class="'.$class.'"><a href="#top" class="'.$class.'">'.$this->locator['backimg'].' '.$label.'</a></div>';
	}
	
	// Maquette des boutons
	
	function setButtonMaquette($maquette) {
		$this->maquettebtn = $maquette;
	}
	
	function callButtonMaquette($label,$type="submit",$action="") {
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
	
	function setTableMaquette($maquette) {
		$this->maquettetable = $maquette;
	}
	
	function callTableMaquette($title,$text,$width=-1) {
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
	
	function setTitle($title) {
		$this->variables['[PAGE_TITLE]'] = $title;	
	}
	
	function addText($text) {
		$this->variables['[BODY]'] .= $text.'<br />'.@CRLF;
	}
	
	function addError($text,$class='erreur') {
		$this->addText('<div class="'.$class.'">'.$text.'</div>');
	}
	
	function addTable($title,$text,$width=-1) {
		$this->addText($this->callTableMaquette($title,$this->callParagraph($text),$width));
	}
	
	function callParagraph($text) {
		return '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$text.'<br />';
	}
	
	function addParagraph($text) {
		$this->addText($this->callParagraph($text));
	}   
}

?>