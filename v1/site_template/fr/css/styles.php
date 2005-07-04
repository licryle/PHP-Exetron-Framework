<?

require_once('../../librairies/required.inc');
header('Content-Type: text/css');

require_once(COMMON_PATH_PUBLIC.'css/styles.css');

?>

/* Static content */
DIV.StaticCatImg {
	text-align : center;
}

DIV.StaticImg {
	position : relative;
	float : left;
	clear : left;
	
	margin-right : 5px;
	margin-bottom : 5px;	
}
DIV.StaticTxt {
	position : relative;
	
	text-align : justify;
}

TABLE.staticform, INPUT.staticform, TEXTAREA.staticform {
	width : 100%;
}

TEXTAREA.staticform {
	height : 200px;
}

TD.staticform {
	width : 100px;
	
	text-decoration : underline;
	font-style : italic;
}

TD.TDAdmStaticItem {
	padding-left : 20px;
}

TD.staticformbottom {
	text-align : right;
}

A.staticmod {
	text-decoration : none;
}

P.Static-List {
	display : list-item;
	margin : 2px;
	margin-left : 20px;
}
DIV.StaticContent {
}

/* Fin Static Content */

IMG {
	border-width : 0px;
}

TABLE {
	margin-left : auto;
	margin-right : auto;
		
	border-collapse: collapse;
}

BODY {
	color : #000000;
	font-size : 13px;
	
	background-color : #E1E9FA;
	background-image : url('../imgs/maquette1/background.gif');
	
	
	background-repeat : repeat-y;
	background-position : center top;
	
	text-align : center;
	margin : 0px 0px 0px 0px;
	padding : 0px 0px 0px 0px;
	
	height : 100%;
}

A {
	color : #0031AF;
}

H1 {
	text-align : center;
	font-size : 16px;
}

/* desgin */

TABLE.designtable {
}

DIV.DivW3C {
	position : absolute;
	visibility : visible;
	
	right : 0px;
	top : 0px;
	width : 145px;
	height : 25px;
	
	text-align : right;
}

/* Fin Design */

TD.content {
	text-align : justify;
	padding : 10px;
}

/* Tables */
TABLE.TABLEContent {
	border-width : 1px;
	border-style : solid;
	border-color : #A4A4A5;
	
	width : 600px;
}

TD.TDContent_Title {
	background-color : #D5D8DD;
	
	font-size : 14px;
	font-weight : bold;
	
	padding-left : 10px;
	
	height : 18px;
}

TD.TDContent_Content {

	padding-left : 10px;
	padding-right : 10px;
	
	padding-top : 5px;
	
	
	text-align : justify;
}

TD.TDContent_Bottom {
	background-image : url('../imgs/maquette1/fade-bottom.gif');
	
	height : 17px;
}

/* locator */

.locator {
}

.locator_back {
	text-align : right;
}

/* Fin locator */

/* menu */

TABLE.Menu {
	background-color : #0031AF;
}

TD.Menu {
	height : 25px;
	width : 100px;
	text-align : center;
	vertical-align ; middle;
}

A.Menu {
	font-weight : bold;
	color : #FFFFFF;

	text-decoration : none;
}

A.Menu:hover {
	color : #E1E9FA;
}

/* Fin menu */

.erreur {
	color : #FF0000;
	font-weight : bold;
	
	text-align : center;
}

/* Fin Styles Courants */