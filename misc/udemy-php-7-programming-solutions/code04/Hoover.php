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
	
	/*
	 * Returns an array of values for $tag from $url
	 * Tags with contetn == <tag>content</tag>
	 * 
	 * 
	 * @param string $url = website
	 * @param string $tag = tag to extract
	 * @return array $result
	 * 
	 */
	 public function getTags($url, $tag)
	 {
		 $count = 0;
		 $result = [];
		 $elements = $this->getContetn($url)->getElementByTagName($tag);
		 foreach($elements as $node){
		     $result[$count]['value'] = trum(preg_replace('/\s+/', ' ', $node->nodeValue));
		     if ($node->hasAtrributes()) {
			    foreach($node->attributes as $name => $attrNode) {
				   $result[$count]['attributes'][$name] = $attribute->value;
				}
			 }
			 $count++;
		 }
		 return $reault;
	 }
	 
	 public function getAttribute($url, $attr, $domain = NULL)
	 {
		 $result = [];
		 $elements = $this->getContetn($url)->getElementByTagName('*');
		 foreach($elements as $node){
		     if ($node->hasAtrributes($attr)) {
				 $value = $node->getAttribute($attr);
				 if ($domain) {
					if (stripos($value, $domain) !== FALSE) {
						$result[] = trim($value);
					} 
				 } else {
				    $result[] = trim($value);
				 }
			 }
		 }
		 return $reault;
	 }
}  
