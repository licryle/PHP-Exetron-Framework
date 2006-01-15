<?php

class test 
{
	function __construct () 
	{
		$this->privvar = 'Hello world';
		$this->provar = 'Protected, isn\'t it ?';
		$this->otherone = 'Hello, I\'m private... hum... I think!';
	}

	private $privvar;
	protected $provar;
	private $otherone;
}

function GetProtectedOrPrivateProperty ( & $object, $Property )
{
	$arrayObj = (array) $object; // cast to array, in order to access all properties...
	
	$private = chr(0).get_class ( $object ).chr(0).$Property; //build "private index"
	$protected = chr(0).'*'.chr(0).$Property; //build "protected index"

	if ( array_key_exists($private,$arrayObj) ) // does it exist in private scope ?
	{
		return $arrayObj [ $private ];
	}
	
	if ( array_key_exists($protected,$arrayObj) ) // does it exist in protected scope ?
	{
		return $arrayObj [ $protected ];
	}
	
	return NULL;
}

$test = new test(); // let's test...

$var = & GetProtectedOrPrivateProperty( $test , 'otherone'); // get the private/protected Property by reference

echo $var.'<br />'; // print it out

$var = 'What ? Am I discovered ?'; // wanna change it ... will it work ?

echo GetProtectedOrPrivateProperty( $test , 'otherone'); // Had it changed ?

?>
And magic happens...

Hello, I'm private... hum... I think!
What ? Am I discovered ?


I created this code to bypass a strange fact...
<?php

class childTest extends test
{
	function __construct( test $parentobject )
	{
		echo $parentobject->provar; // provar is a parent's protected property so it may be accessible.
	}
}

$child = new childTest ($test );
?>
Fatal error: Cannot access protected property test::$provar in W:\www\exetron\v2\testProtectedPrivate.php on line 61

bye bye...

PHP 5.0.4