<?php

require __DIR__ . '/../Application/Autoload/Loader.php';

Application\Autoload\Loader::init(__DIR__ . '/..');

$vac = new Application\Web\Hoover();

define('DEFAULT_URL', 'http://oreilly.com/');
define('DEFAULT_TAG', 'a');

// php7 null coalesce operator
$url = strip_tags($_GET['url'] ?? DEFAULT_URL);
$tag = strip_tags($_GET['tag'] ?? DEFAULT_TAG);

echo 'Dump of Tags: ' . PHP_EOL;
var_dump($vac->getTags($url, $tag));
