<?php

class Singleton
{

   private static $instance;
   private $onApplicationEnd;
   private $onApplicationEnd_args;

   private function __construct()
   {
		register_shutdown_function( array ( & $this , 'applicationEnd' ) );
   }

   public static function Singleton() {
       if ( ! isset( self::$instance ) )
	   {
           self::$instance = new Singleton();
       }

       return self::$instance;
   }
   
   public function OnApplicationEnd( $function, $parametre )
   {
		if ( !is_callable( $function ) ) return -1;
		if ( !is_array( $parametre ) ) return 0;
		
		$this->onApplicationEnd = $function;
		$this->onApplicationEnd_args = $parametre;
		
		return true;
   }
   
   public function applicationEnd ( )
   {
		if ( isset ( $this->onApplicationEnd ) )
		{
			@call_user_func_array ( $this->onApplicationEnd, $this->onApplicationEnd_args );
		}
   }
}

$i = Singleton::Singleton();

function printMe ( $str ) 
{ echo 'oups';
	print($str.'ahahah');
}

$i->OnApplicationEnd( 'printMe', array() );

echo intval(ini_set('auto_append_file','testAppend.php'));

?>