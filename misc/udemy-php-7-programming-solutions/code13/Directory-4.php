<?php

// src/Application/Iterator/Directory.php

namespace Application\Iterator;

use Exception;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RecursiveRegexIterator;

class Directory
{

    const ERROR_UNABLE = 'ERROR: Unable to read diectory';
    const DEFAULT_PATTERN = '/^.+\.php$/i';
    
    protected $path;
    protected $rdi; //recursive directory iterator


    public function _construct($path)
    {
        try {
			$this->rdi = new RecursiveIteratorIterator(
			             new RecursiveDirectoryIterator($path),
			             RecursiveIteratorIterator::SELF_FIRST
			             );
		} catch (\Trowable $e) {
		    $message = __METHOD__ . ' : ' . self::ERROR_UNABLE .PHP_EOL;
		    $message .= strip_tags($path) . PHP_EOL;
		    echo $message;
		    exit;
		}
    }
    
    
    /**
     * simulate output of command   ls -l -R
     * -rw-rw-r-- 1 aed aed 4667 Jan 14 17:18 chao_02_config.php
     * 
     * @param string $pattern
     * @return Generator
     */
     public function ls($pattern = null)
     {
		 $outerIterator = ($pattern) ? $this->regex($this->rdi, $pattern) : $this->rdi;
		 foreach($outerIterator as $ob({
			 if ($ob->isDir()) {
			     if ($obj->getFileName() == '..') {
					 continue;
				 }
			 } else {
				 $line = $sprintf(
				      '%4s %1d %4s %10d %12s %-40s' . PHP_EOL,
				      ($obj->getType() == 'file') ? 1 : 2,
				      $obj->getOwner(),
				      $obj->getGroup(),
				      $obj->getSize(),
				      date('M d Y H:i', $obj->getATime()),
				      $obj->getFileName()
				 );
			 }
			 yield $line;
		 }
	 }
	 
	 /**
	  * mimics outout of command dir /s
	  * 
	  * file01.php file02.php ...
	  * 
	  * 
	  * 
	  * @param string $pattern
	  * @return Generator
	  */
	  public function dir($pattern= self::DEFAULT_PATTERN)
	  {
		  $outerIterator = ($pattern) ? $this->regex($this->rdi, $pattern) : $this->rdi;
		  foreach ($outerIterator as $name => $obj){
			  yield $name . PHP_EOL;
		  }
	  }
	  
	  protected function regex($iterator, $pattern)
	  {
		  $pattern = '!^' . str_replace('.', '\\.', $pattern) . '$!';
		  return new RegexIterator($iterator, $pattern);
	  }
	 
	 
}


