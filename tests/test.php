<?php 
/*
|--------------------------------------------------------------------------
| Autoload files using composer autoload and perform quick test
|--------------------------------------------------------------------------
*/

require_once __DIR__ . '/../vendor/autoload.php';

use RandNum\RandomNumber;

echo RandomNumber::initialize(2)->executeRolls();