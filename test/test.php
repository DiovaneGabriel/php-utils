<?php

use DBarbieri\Utils\Format;
use DBarbieri\Utils\Validate;

require __DIR__ . '/../vendor/autoload.php';

echo '<pre>';
var_dump(Validate::cpf('00830409009'));
die();