#!/usr/bin/env php
<?php

use Joneiros\Challenge;

require_once('vendor/autoload.php');

//See README.md for challenge details

//see tests for more cases
$input = 123;

$challenge = new Challenge();
echo($challenge->numberOfSteps($input));
