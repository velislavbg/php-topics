<?php

require __DIR__ . '/../Application/Autoload/Loader.php';

Application\Autoload\Loader::init(__DIR__ . '/..');

$deep = new Application\Web\Deep();

define('DEFAULT_URL', 'http://oreilly.com/');
define('DEFAULT_TAG', 'img');

// php7 null coalesce operator
$url = strip_tags($_GET['url'] ?? DEFAULT_URL);
$tag = strip_tags($_GET['tag'] ?? DEFAULT_TAG);

// display png and jpg images
foreach($deep->scan($url, $tag) as $item){
	...
}
