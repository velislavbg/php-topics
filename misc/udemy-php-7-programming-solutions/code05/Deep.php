<?php

namespace Application\Web;

class Deep
{
	protected $domain;

    /**
     * extract DNS domain from a URL
     */
    public function getDomain($url)
    {
		if (!$this->domain) {
			$this->domain = parse_url($ur, PHP_URL_HOST);
		}
		return $this->domain;
	}
    
    /**
     * Return DNS domain from URL
     * 
     * @param string $url - wesite
     * @return string $dns - domain
     */
     public function scan($url, $tag)
     {
		 $vac = new Hoover();
		 $scan = $vac->getAttribute($url, 'href', $this->getDomain($url));
		 $resutl = array();
		 foreach($scan as $subSite) {
		    yield from $vac->getTags($subSite, $tag);
		 }
		 // total number of sub-sites found
		 return count($scan);
	 }
}
