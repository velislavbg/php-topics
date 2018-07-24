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
}
