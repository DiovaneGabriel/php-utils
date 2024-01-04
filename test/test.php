<?php

use DBarbieri\Utils\Format;

require __DIR__ . '/../vendor/autoload.php';

echo '<pre>';
var_dump(Format::cnpj('14149318000143'));
die();