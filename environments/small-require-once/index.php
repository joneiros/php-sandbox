<?php

define('__ROOT__', dirname((__FILE__)));
require_once( __ROOT__ . '/src/SomeClass.php');

$solver = new SomeClass();
echo $solver->someFunction(123) . "\n";