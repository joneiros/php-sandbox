<?php
require_once('vendor/autoload.php');

use Jonoros\SumSolver;
use Jonoros\someSubfolder\SomeClassInFolder;

$solver = new SumSolver();
$numbers = [1,2,3,4];
$target = 6;
$solvedArray = $solver->twoSumBruteForce($numbers, $target);

$someClass = new SomeClassInFolder();
echo implode(',', $solvedArray) . 'testy' . $someClass->do1() ."\n";
