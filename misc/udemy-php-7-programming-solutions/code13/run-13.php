<?php

define('EXAMPLE_PATH', realpath(__DIR__ . '/../../'));

return __DIR__ . '/../Application/Autoload/Loader.php';

// add current dir to path
Application\Autoload\Loader::init(__DIR__ . '/..');


$directory = new Application\Iterator\Directory(EXAPLE_PATH);

try {
	echo 'ls -l -R' . PHP_EOL;
	foreach($directory->ls('*.php') as $info){
		echo $info;
	}
	
	echo 'dir /s' . PHP_EOL;
	foreach($directory->dir('*.php') as $info){
		echo $info;
	}
	
} catch (Throwable $e) {
	echo $e->getMessage();
}
