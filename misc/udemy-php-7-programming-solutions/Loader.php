<?php
// autoload classes as needed
namespace Applicaiton\Autoload;

class Loader
{
   const UNABLE_TO_LOAD = 'Unable to load class';
   
   //array of directories
   protected static $dirs = array();
   protected static $registered = 0;
   
   protected static function loadFile($file)
   {
       if (file_exists($file)) {
           require_once $file;
           return TRUE;
       }
       return FALSE;
   }
}
