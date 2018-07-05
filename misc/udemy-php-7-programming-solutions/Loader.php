<?php
// autoload classes as needed
namespace Applicaiton\Autoload;

class Loader
{
   const UNABLE_TO_LOAD = 'Unable to load class';
   
   //array of directories
   protected static $dirs = array();
   protected static $registered = 0;
   
   
   public function static function autoLoad($class)
   {
       $success = FALSE;
       $fn = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
       foreach(self::$dirs as $start) {
	      $file = $start . DIRECTORY_SEPARATOR . $fn;
	      if (self::loadFile($file)){
		     $success = TRUE;
		     break;
		  }
	   }
	   if (!success) {
	      if (!self::loadFile(__DIR__ . DIRECTORY_SEPARATOR . $fn)) {
		      throw new \Exception(self::UNABLE_TO_LOAD . ' ' . $class);
		  }
	   }  
   }
   
   protected static function loadFile($file)
   {
       if (file_exists($file)) {
           require_once $file;
           return TRUE;
       }
       return FALSE;
   }
}
