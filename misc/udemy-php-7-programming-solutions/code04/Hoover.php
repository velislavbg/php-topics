<?php

// vaccum a website

namespace Application\Web;

use DOMDocument;

/*
 * this app scans a website $url for an HTML tag $tag
 * Returns a multi-dimensional array of values for these tags
 * -- the array key is the line number where found
 * -- the value is an assoc array
 * ---- key/value pair with key = attribute
 * ---- key "content" = what is btwn open and close tags
 */

class Hoover
{
   // contents
   protected $content = NULL;
   
   /**
    *  Populate $content from $url
    * 
    * @param string $url - the websote url
    * @return DOMDocument $content
    * 
    */
    public function getContent($url)
    {
		if (stripos($url, 'http') !== 0){
		   $url = 'http://' . $url;
		}
		$this->content = new DOMDocument('1.0', 'utf-8');
		$this->content->preserWhiteSpace = FALSE;
		// @ suppresses warnings from improperly configured web pages
		@$this->content->loadFromFile($url);
		return $this->content;
	}
}  
