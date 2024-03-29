<?php
require_once('vendor/autoload.php');

use Jonoros\SumSolver;
use Jonoros\SecondSummer;

//define('__ROOT__', dirname((__FILE__)));
//require_once( __ROOT__ . '/SumSolver.php');

//$solver = new SecondSummer();
//echo $solver->doStuff() . "\n";

$solver = new SumSolver();
echo $solver->twoSum(1,1) . "\n";
